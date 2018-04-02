<?php
class Bannernovedades extends Controlador
{
    public function index()
    {
	     $this->se_requiere_logueo(true,'Bannernovedades|index');
       require URL_VISTA.'banners/novedades.php';
    }

    public function obtener_banners()
    {
	     $this->se_requiere_logueo(true,'Bannernovedades|index');
       $modelo = $this->loadModel('Bannernovedades');
       print $modelo->obtener_banners($_POST);
    }

    public function agregar_banner()
    {
	     $this->se_requiere_logueo(true,'Bannernovedades|agregar_banner');
       require URL_VISTA.'modales/banners/a_novedades.php';
    }

    public function editbanner($id)
    {
	     $this->se_requiere_logueo(true,'Bannernovedades|editbanner');
       $model = $this->loadModel('Bannernovedades');
       $elm = $model->data_element($id);
       require URL_VISTA.'modales/banners/e_novedades.php';
    }

    public function agregar_banner_do()
    {
	     $this->se_requiere_logueo(true,'Bannernovedades|agregar_banner');
       $modelo = $this->loadModel('Bannernovedades');
       print $modelo->agregar_banner_do($_POST);
    }

    public function editbanner_do()
    {
	     $this->se_requiere_logueo(true,'Bannernovedades|agregar_banner');
       $modelo = $this->loadModel('Bannernovedades');
       print $modelo->editbanner_do($_POST);
    }

    private function smart_rename($ruta){
          $this->se_requiere_logueo(true,'Bannernovedades|agregar_banner');
           if($ruta){
                  $elemento = pathinfo($ruta);
                  $hash = $this->token(3);
                  $new_file = $elemento['dirname'].'/'.$elemento['filename'].'_'.$hash.'.'.$elemento['extension'];
                  if (file_exists($new_file)){
                         $new_file = self::smart_rename($new_file);
                  }else{
                         return $new_file;
                  }
           }
    }
    public function upload_dropzone($id){
        $this->se_requiere_logueo(true,'Bannernoticias|agregar_banner');
        $upload_dir = '../public/content/banners/novedades/';
        if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
          D::bug('Error! Error en el metodo HTTP!'.$_SERVER['REQUEST_METHOD']);
        }
        if(((strpos($_FILES['file']['type'], 'image') !== false) ||
            (strpos($_FILES['file']['type'], 'application/pdf') !== false)) && $_FILES['file']['error'] == 0 ){
          $pic = $_FILES['file'];
          $extension_or = pathinfo($pic['name']);
          $destino_final = $upload_dir.$this->token(6).'.'.$extension_or['extension'];
          if (file_exists($destino_final)){
            $destino_final = self::smart_rename($destino_final);
          }
          $dimension = getimagesize($pic['tmp_name']);
          if(move_uploaded_file($pic['tmp_name'], $destino_final)){
            $elemento = pathinfo($destino_final);
            $extension = $elemento['extension'];
            $nombre = $elemento['filename'];
            $original = $nombre.'.'.$extension;
            $temporal =  self::duplicatePublic($original);
            $set_image = $this->loadModel('Bannernovedades');
            $inserta_imagen = $set_image->set_avatar($original,$id,$dimension);
            echo $temporal.'|'.$original;
          }
        }else{
          D::bug('Algunos errores ocurrieron al actualizar el avatar: '.strpos($_FILES['file']['type'], 'image'));
        }
      }
}
