<?php
class Seo extends Controlador
{
       public function index(){
              $load='site/page/extra/404';
              require SITE.'plantilla/index.php';
       }
       public function load($folder,$file,$process=null){
              $newfldr = str_replace('|', '/', $folder);

              if (file_exists(DIR_FILES.'/vistas/site/'.$newfldr.'/'.$file.'.php')){

                     if(@$process == 'undefined'){$process = 0;}
                     $load='site/page/'.$folder.'/'.$file.'/'.$process;
                     require SITE.'plantilla/index.php';

              }else{

                     $load='site/page/extra/404';
                     require SITE.'plantilla/index.php';

              }
       }
}
?>
