<div id="form-output-global" class="snackbars"></div>

<!--PhotoSwipe Gallery-->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>

<script>var url_app = '<?=URL_APP?>';</script>

<!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<script src="<?=URL_PUBLIC?>frontend/js/core.js"></script>
<!--<script src="https://s3-us-west-2.amazonaws.com/elasticbeanstalk-us-west-2-594228528658/core_minified.js"></script>-->
<script src="<?=URL_PUBLIC?>frontend/js/script.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/cialc.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/transit.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/isotope.pkgd.min.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/imagesloaded.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/masonry.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/fit-columns.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/swiper.min.js"></script>

<script src="<?=URL_PUBLIC?>frontend/js/photoswipe.min.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/photoswipe-ui-default.min.js"></script>
<script src="<?=URL_PUBLIC?>frontend/js/ps_gallery.js"></script>

<?php
if(@$_SESSION['tokenxx']){
?>
<script src="<?=URL_PUBLIC?>assets/global/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.js" type="text/javascript"></script>
<script src="<?=URL_PUBLIC?>assets/js/inicio.js"></script>
<?php
}
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114828657-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-114828657-1');
</script>

    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
    var backhis = ["inicio/index/inicio"];
    var forkhis = [];
		var LinkD = function () {
			return {
				init: function () {
					$(".chargemenu").click(function() {
            var thislink = $(this).data('folder')+'/'+$(this).data('file')+'/'+$(this).data('process');
						$.ajax({
							url: url_app +  'site/page/'+$(this).data('folder')+'/'+$(this).data('file')+'/'+$(this).data('process'),
							beforeSend: function( data ) {
								$('#procesando').show();
								$('#contenido_dinamico').empty();
								$(".rd-navbar-nav").find(".rd-navbar-submenu").removeClass("opened").removeClass("focus");
								$(".rd-navbar-inner").find(".rd-navbar-nav-wrap").removeClass("active");
								$(".rd-navbar-panel").find(".rd-navbar-toggle").removeClass("active");
							},
							success: function(data) {
								$('#contenido_dinamico').html(data);
								$('#procesando').hide();
								$('html,body').animate({
								    scrollTop: $("body").offset().top
								}, 1000);

                backhis.push(thislink);
                (backhis.length <= 1)?$("#backhistory").css( "display", "none" ):$("#backhistory").css( "display", "" );
                (forkhis.length < 1)?$("#forwardhistory").css( "display", "none" ):$("#forwardhistory").css( "display", "" );

							}
						});
					});

          $("#backhistory").click(function() {
            var thislink = backhis[backhis.length - 2];
            var movelink = backhis.length - 1;
            $.ajax({
              url: url_app +  'site/page/' + thislink,
              beforeSend: function( data ) {
                $('#procesando').show();
                $('#contenido_dinamico').empty();
              },
              success: function(data) {

                $('#contenido_dinamico').html(data);
                $('#procesando').hide();

                forkhis.push(backhis[movelink]);
                backhis.splice(movelink, 1);
                (backhis.length <= 1)?$("#backhistory").css( "display", "none" ):$("#backhistory").css( "display", "" );
                (forkhis.length < 1)?$("#forwardhistory").css( "display", "none" ):$("#forwardhistory").css( "display", "" );

              }
            });
          });

          $("#forwardhistory").click(function() {
            var thislink = forkhis[forkhis.length - 1];
            $.ajax({
              url: url_app +  'site/page/' + thislink,
              beforeSend: function( data ) {
                $('#procesando').show();
                $('#contenido_dinamico').empty();
              },
              success: function(data) {

                $('#contenido_dinamico').html(data);
                $('#procesando').hide();

                backhis.push(thislink);
                forkhis.splice(forkhis.length - 1, 1);
                (backhis.length <= 1)?$("#backhistory").css( "display", "none" ):$("#backhistory").css( "display", "" );
                (forkhis.length < 1)?$("#forwardhistory").css( "display", "none" ):$("#forwardhistory").css( "display", "" );

              }
            });
          });

				}
			};
		}();
		var LinkAjax = function () {
			return {
				init: function () {
					$(".load-content").click(function() {
            var thislink = $(this).data('folder')+'/'+$(this).data('file')+'/'+$(this).data('process');
						$.ajax({
							url: url_app +  'site/page/'+$(this).data('folder')+'/'+$(this).data('file')+'/'+$(this).data('process'),
							beforeSend: function( data ) {
								$('#procesando').show();
								$('#contenido_dinamico').empty();
							},
							success: function(data) {
								$('#contenido_dinamico').html(data);
								$('#procesando').hide();

                backhis.push(thislink);
                (backhis.length <= 1)?$("#backhistory").css( "display", "none" ):$("#backhistory").css( "display", "" );
                (forkhis.length < 1)?$("#forwardhistory").css( "display", "none" ):$("#forwardhistory").css( "display", "" );

							}
						});
					});
				}
			};
		}();

		var StartNow = function () {
			var loadContetIndex = function (load) {
				$.ajax({
					url: url_app +  load,
					beforeSend: function( data ) {
						$('#procesando').show();
						$('#contenido_dinamico').empty();
					},
					success: function(data) {
						$('#contenido_dinamico').html(data);
						$('#procesando').hide();
					}
				});
			};
			return {
				init: function (load) {
					loadContetIndex(load);
				}
			};
		}();
		jQuery(document).ready(function() {
			GeneralScripts.init();
			LinkD.init();
			<?php if($load){ ?>
				StartNow.init('<?=$load?>');
			<?php } ?>
                     $().UItoTop({
                            easingType: 'easeOutQuart',
                            containerClass: 'ui-to-top fa fa-angle-up'
                     });
		});
    </script>
