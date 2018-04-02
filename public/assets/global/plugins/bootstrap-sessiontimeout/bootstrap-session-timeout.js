/*
 * bootstrap-session-timeout
 * www.orangehilldev.com
 *
 * Copyright (c) 2014 Vedran Opacic
 * Licensed under the MIT license.
 */

(function($) {
    /*jshint multistr: true */
    'use strict';
    $.sessionTimeout = function(options) {
        var defaults = {
            title: 'Su sesión está por expirar',
			duplicatetitle: 'Sesión duplicada',
			messagedup: 'Se inició una nueva sesión desde otra ubicación',
            message: 'Su sesión se cerrará de manera automática, ¿Desea continuar con su actual sesión activa?.',
            logoutButton: 'Salir',
            keepAliveButton: 'Continuar',
            keepAliveUrl: 'login/keepAlive',
            ajaxType: 'POST',
            ajaxData: '',
            redirUrl: 'login/lockSession',
            logoutUrl: 'login/salir',
			loginHome: 'login',
			sesionVerify:'login/verifica_session',
            warnAfter: 900000, // 15 minutes
            redirAfter: 1200000, // 20 minutes
            keepAliveInterval: 10000,
            keepAlive: false,
            ignoreUserActivity: true,
            onStart: false,
            onWarn: false,
            onRedir: false,
            countdownMessage: 'Se cerrará su sesión en {timer} segundos.',
            countdownBar: true,
            countdownSmart: false
        };
        var opt = defaults,
            timer,
            countdown = {};

        // Extend user-set options over defaults
        if (options) {
            opt = $.extend(defaults, options);
        }

        // Some error handling if options are miss-configured
        if (opt.warnAfter >= opt.redirAfter) {
            console.error('Bootstrap-session-timeout plugin is miss-configured. Option "redirAfter" must be equal or greater than "warnAfter".');
            return false;
        }

        // Unless user set his own callback function, prepare bootstrap modal elements and events
        if (typeof opt.onWarn !== 'function') {
            // If opt.countdownMessage is defined add a coundown timer message to the modal dialog
            var countdownMessage = opt.countdownMessage ?
                '<p>' + opt.countdownMessage.replace(/{timer}/g, '<span class="countdown-holder"></span>') + '</p>' : '';
            var coundownBarHtml = opt.countdownBar ?
                '<div class="progress"> \
                  <div class="progress-bar progress-bar-striped countdown-bar active" role="progressbar" style="text-indent: -99999px !important; min-width: 15px; width: 100%;"> \
                    <span class="countdown-holder"></span> \
                  </div> \
                </div>' : '';

            // Create timeout warning dialog
            $('body').append('<div class="modal fade" id="session-timeout-dialog"> \
              <div class="modal-dialog"> \
                <div class="modal-content"> \
                  <div class="modal-header"> \
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> \
                    <h4 class="modal-title">' + opt.title + '</h4> \
                  </div> \
                  <div class="modal-body"> \
                    <p>' + opt.message + '</p> \
                    ' + countdownMessage + ' \
                    ' + coundownBarHtml + ' \
                  </div> \
                  <div class="modal-footer"> \
                    <button id="session-timeout-dialog-logout" type="button" class="btn btn-default">' + opt.logoutButton + '</button> \
                    <button style="margin-top: 0px!important;" onclick="keepAliveDirect();" id="session-timeout-dialog-keepalive" type="button" class="btn btn-primary" data-dismiss="modal">' + opt.keepAliveButton + '</button> \
                  </div> \
                </div> \
              </div> \
             </div>');


			// Create exitnow warning dialog
			$('body').append('<div class="modal fade" id="session-exitnow-dialog" data-keyboard="false" data-backdrop="static"> \
              <div class="modal-dialog"> \
                <div class="modal-content"> \
                  <div class="modal-header"> \
                    <button type="button" class="close" id="redirect_exit" aria-hidden="true">&times;</button> \
                    <h4 class="modal-title">' + opt.duplicatetitle + '</h4> \
                  </div> \
                  <div class="modal-body"> \
                    <p>' + opt.messagedup + '</p> \
                  </div> \
                  <div class="modal-footer"> \
                    <button id="session-exitnow-dialog-logout" type="button" class="btn btn-default">' + opt.logoutButton + '</button> \
                  </div> \
                </div> \
              </div> \
             </div>');

			 $('#session-exitnow-dialog-logout').on('click', function() {
				 window.location = opt.loginHome;
			 });
			 $('#redirect_exit').on('click', function() {
				 window.location = opt.loginHome;
			 });





            // "Logout" button click
            $('#session-timeout-dialog-logout').on('click', function() {
				$.ajax({
					url: opt.logoutUrl,
					type: 'POST',
					dataType: "json",
					success: function(respuesta){
						if(respuesta[0].resp='correcto'){
							window.location = opt.loginHome;
						}else{
							alerta('Alerta!','session-timeout file Fremedev 001');
						}
					},
					error: function(){alerta('Alerta!','Error de conectividad de red SESSIONTIMEOUT-01');}
				});
            });
            // "Stay Connected" button click
            $('#session-timeout-dialog').on('hide.bs.modal', function() {
                // Restart session timer
                startSessionTimer();
            });
        }
        // Reset timer on any of these events
        if (!opt.ignoreUserActivity) {
            var mousePosition = [-1, -1];
            $(document).on('keyup mouseup mousemove touchend touchmove', function(e) {
                if (e.type === 'mousemove') {
                    // Solves mousemove even when mouse not moving issue on Chrome:
                    // https://code.google.com/p/chromium/issues/detail?id=241476
                    if (e.clientX === mousePosition[0] && e.clientY === mousePosition[1]) {
                        return;
                    }
                    mousePosition[0] = e.clientX;
                    mousePosition[1] = e.clientY;
                }
                startSessionTimer();

                // If they moved the mouse not only reset the counter
                // but remove the modal too!
                if ($('#session-timeout-dialog').length > 0 &&
                    $('#session-timeout-dialog').data('bs.modal') &&
                    $('#session-timeout-dialog').data('bs.modal').isShown) {

						// http://stackoverflow.com/questions/11519660/twitter-bootstrap-modal-backdrop-doesnt-disappear
						$('#session-timeout-dialog').modal('hide');
						$('body').removeClass('modal-open');
						$('div.modal-backdrop').remove();

					}
            });
        }

        // Keeps the server side connection live, by pingin url set in keepAliveUrl option.
        // KeepAlivePinged is a helper var to ensure the functionality of the keepAliveInterval option
        var keepAlivePinged = false;

        function keepAlive() {
            if (!keepAlivePinged) {
                // Ping keepalive URL using (if provided) data and type from options
                $.ajax({
                    type: opt.ajaxType,
                    url: opt.keepAliveUrl,
                    data: opt.ajaxData
                });
                keepAlivePinged = true;
                setTimeout(function() {
                    keepAlivePinged = false;
                }, opt.keepAliveInterval);
            }
        }

        function startSessionTimer() {
            // Clear session timer
            clearTimeout(timer);
            if (opt.countdownMessage || opt.countdownBar) {
                startCountdownTimer('session', true);
            }

            if (typeof opt.onStart === 'function') {
                opt.onStart(opt);
            }

            // If keepAlive option is set to "true", ping the "keepAliveUrl" url
            if (opt.keepAlive) {
                keepAlive();
            }

            // Set session timer
            timer = setTimeout(function() {
				// Check for onWarn callback function and if there is none, launch dialog
				if (typeof opt.onWarn !== 'function') {

					$.ajax({
						url: opt.sesionVerify,
						type: 'POST',
						dataType: "json",
						success: function(respuesta){
							if(respuesta[0].resp=='timeout'){
								$('#session-timeout-dialog').modal('show');
							}else if (respuesta[0].resp=='exitnow'){
								$('#session-exitnow-dialog').modal('show');
							}else{
								startSessionTimer();
							}
						},
					error: function(){console.log('error de conectividad');}
					});

				} else {
					opt.onWarn(opt);
				}
				// Start dialog timer
                startDialogTimer();
            }, opt.warnAfter);
        }

        function startDialogTimer() {
			// Clear session timer
            clearTimeout(timer);
            if (!$('#session-timeout-dialog').hasClass('in') && (opt.countdownMessage || opt.countdownBar)) {
                // If warning dialog is not already open and either opt.countdownMessage
                // or opt.countdownBar are set start countdown
                startCountdownTimer('dialog', true);
            }
            // Set dialog timer
            timer = setTimeout(function() {
                // Check for onRedir callback function and if there is none, launch redirect
                if (typeof opt.onRedir !== 'function') {
                    window.location = opt.redirUrl;
                } else {
                    opt.onRedir(opt);
                }
            }, (opt.redirAfter - opt.warnAfter));
        }

        function startCountdownTimer(type, reset) {
            // Clear countdown timer
            clearTimeout(countdown.timer);

            if (type === 'dialog' && reset) {
                // If triggered by startDialogTimer start warning countdown
                countdown.timeLeft = Math.floor((opt.redirAfter - opt.warnAfter) / 1000);
            } else if (type === 'session' && reset) {
                // If triggered by startSessionTimer start full countdown
                // (this is needed if user doesn't close the warning dialog)
                countdown.timeLeft = Math.floor(opt.redirAfter / 1000);
            }
            // If opt.countdownBar is true, calculate remaining time percentage
            if (opt.countdownBar && type === 'dialog') {
                countdown.percentLeft = Math.floor(countdown.timeLeft / ((opt.redirAfter - opt.warnAfter) / 1000) * 100);
            } else if (opt.countdownBar && type === 'session') {
                countdown.percentLeft = Math.floor(countdown.timeLeft / (opt.redirAfter / 1000) * 100);
            }
            // Set countdown message time value
            var countdownEl = $('.countdown-holder');
            var secondsLeft = countdown.timeLeft >= 0 ? countdown.timeLeft : 0;
            if (opt.countdownSmart) {
                var minLeft = Math.floor(secondsLeft / 60);
                var secRemain = secondsLeft % 60;
                var countTxt = minLeft > 0 ? minLeft + 'm' : '';
                if (countTxt.length > 0) {
                    countTxt += ' ';
                }
                countTxt += secRemain + 's';
                countdownEl.text(countTxt);
            } else {
                countdownEl.text(secondsLeft + "s");
            }

            // Set countdown message time value
            if (opt.countdownBar) {
                $('.countdown-bar').css('width', countdown.percentLeft + '%');
            }

            // Countdown by one second
            countdown.timeLeft = countdown.timeLeft - 1;
            countdown.timer = setTimeout(function() {
                // Call self after one second
                startCountdownTimer(type);
            }, 1000);
        }

        // Start session timer
        startSessionTimer();

    };
})(jQuery);
