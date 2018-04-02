var SessionTimeout = function () {

    var handlesessionTimeout = function () {
        $.sessionTimeout({
            warnAfter: 10000,
            redirAfter: 30000
        });
    }
    return {
        init: function () {
            handlesessionTimeout();
        }
    };

}();

jQuery(document).ready(function() {
   SessionTimeout.init();
});


function keepAliveDirect(){
	$.ajax({url: 'login/keepAliveReset'});
}
