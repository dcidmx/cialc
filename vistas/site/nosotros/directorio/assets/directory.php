<!doctype html>
<head>
    <link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/directorio/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/directorio/assets/css/main.min.css" media="all">
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->

    <!-- main sidebar -->
    <div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">Directorio</h3>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-4-4">
                            <div class="uk-vertical-align">
                                <div class="uk-vertical-align-middle">
                                    <ul id="contact_list_filter" class="uk-subnav uk-subnav-pill uk-margin-remove">
                                        <?php
                                        foreach($filter as $submenu){
                                        ?>
                                          <li data-uk-filter="<?=base64_encode($submenu['nivel_filtro'])?>"><a href="#"><?=$submenu['nivel_filtro']?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="uk-active" data-uk-filter=""><a href="#">Todos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--<div class="uk-width-medium-1-4">
                            <label for="contact_list_search">Buscar... (min 3 letras.)</label>
                            <input class="md-input" type="text" id="contact_list_search"/>
                     </div>-->
                    </div>
                </div>
            </div>

            <h3 class="heading_b uk-text-center grid_no_results" style="display:none">No existen resultados</h3>




            <div class="uk-grid-width-medium-1-2 uk-grid-width-large-1-3 hierarchical_show" id="contact_list">

                   <?php
                   foreach($directory as $elm){
                   ?>
                       <div data-uk-filter="<?=base64_encode($elm->nivel_filtro)?>, <?=$elm->cargo?> , <?=$elm->nombre?>, <?=$elm->correo1?>">
                           <div class="md-card md-card-hover md-card-horizontal">
                               <div class="md-card-head">
                                   <div class="uk-text-center">
                                          <?php if(($elm->image == 'default')OR($elm->image == '')){
                                                 $src = URL_PUBLIC.'frontend/images/directorio/timthumb.png';
                                          }else{
                                                 $src = URL_PUBLIC.'frontend/images/directorio/'.$elm->image;
                                          } ?>

                                          <?php if($elm->data_process != ''){
                                              $a = "<a href='javascript:;' data-process='".$elm->data_process."' data-file='perfil_investigador' data-folder='investigacion' class='load-content'>";
                                              $b = "</a>";
                                          }else{
                                              $a = "";
                                              $b = "";
                                          } ?>

                                       <?=$a?><img class="md-card-head-avatar" src="<?=$src?>" alt=""/><?=$b?>
                                   </div>
                                   <h3 class="md-card-head-text uk-text-center">
                                       <?=$a?><?=$elm->nombre?><?=$b?>
                                       <span class="uk-text-truncate"><?=$elm->cargo?></span>
                                   </h3>
                               </div>
                               <div class="md-card-content">
                                   <ul class="md-list">

                                       <?php if($elm->correo1){ ?>
                                       <li>
                                           <div class="md-list-content">
                                               <span class="md-list-heading">Correo</span>
                                               <span class="uk-text-small uk-text-muted uk-text-truncate">
                                                      <a title="<?=$elm->correo1?>" class="__cf_email__" href="mailto:<?=$elm->correo1?>">
                                                             <?=$elm->correo1?>
                                                      </a>
                                               </span>

                                              <?php if($elm->correo2){ ?>

                                                  <div class="md-list-content">
                                                      <span class="uk-text-small uk-text-muted uk-text-truncate">
                                                             <a class="__cf_email__" href="mailto:<?=$elm->correo2?>">
                                                                    <?=$elm->correo2?>
                                                             </a>
                                                      </span>
                                                  </div>

                                              <?php } ?>
                                              <?php if($elm->correo3){ ?>

                                                  <div class="md-list-content">
                                                      <span class="uk-text-small uk-text-muted uk-text-truncate">
                                                             <a class="__cf_email__" href="mailto:<?=$elm->correo3?>">
                                                                    <?=$elm->correo3?>
                                                             </a>
                                                      </span>
                                                  </div>

                                              <?php } ?>
                                           </div>
                                       </li>
                                       <?php } ?>
                                       <?php if($elm->tel1){ ?>
                                       <li>
                                           <div class="md-list-content">
                                               <span class="md-list-heading">Teléfono</span>
                                               <a href="tel:<?=$elm->tel1?>"><span class="uk-text-small uk-text-muted"><?=$elm->tel1?><?php if($elm->ext1){
                                                             echo ' ext: '.$elm->ext1;
                                                      } ?></span></a>
                                           </div>
                                       </li>
                                      <?php } ?>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   <?php
                   }
                   ?>

            </div>

        </div>
    </div>



    <script src="<?=URL_PUBLIC?>frontend/directorio/assets/js/common.min.js"></script>
    <script src="<?=URL_PUBLIC?>frontend/directorio/assets/js/uikit_custom.min.js"></script>
    <script src="<?=URL_PUBLIC?>frontend/directorio/assets/js/altair_admin_common.min.js"></script>
    <script src="<?=URL_PUBLIC?>frontend/directorio/assets/js/pages/page_contact_list.min.js"></script>
</body>
<script>
$( document ).ready(function() {
  $( "#contact_list" ).mousemove(function( event ) {
    altura = parseInt($("#contact_list").css("height"));
    padre = $(window.parent.document);
    $(padre).find("#mainframedirectory").attr("height", altura + 250 + 'px');
      console.log(altura);
  });
  $(document).on('click touchstart', function () {
    altura = parseInt($("#contact_list").css("height"));
    padre = $(window.parent.document);
    $(padre).find("#mainframedirectory").attr("height", altura + 450 + 'px');
      console.log(altura);
  });
});

var LinkAjax = function () {
  return {
    init: function () {
      $(".load-content").click(function() {
        $.ajax({
          url: '../../../site/page/'+$(this).data('folder')+'/'+$(this).data('file')+'/'+$(this).data('process'),
          success: function(data) {
            window.parent.$('#contenido_dinamico').html(data);
            window.parent.$('#procesando').hide();
          }
        });
      });
    }
  };
}();
LinkAjax.init();
</script>
</html>
