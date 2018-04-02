<?php
class Cialc extends Controlador
{
    public function index()
    {
       exit();
    }

    private function smart_rename($ruta){
          $this->se_requiere_logueo(true,'Cialc|proyectos');
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
        $this->se_requiere_logueo(true,'Cialc|proyectos');
        $upload_dir = '../public/content/proyectos/images/';
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
          if(move_uploaded_file($pic['tmp_name'], $destino_final)){
            $elemento = pathinfo($destino_final);
            $extension = $elemento['extension'];
            $nombre = $elemento['filename'];
            $original = $nombre.'.'.$extension;
            $temporal =  self::duplicatePublic($original);
            $set_image = $this->loadModel('Cialc');
            $inserta_imagen = $set_image->set_avatar($original,$id);
            echo $temporal.'|'.$original;
          }
        }else{
          D::bug('Algunos errores ocurrieron al actualizar el avatar: '.strpos($_FILES['file']['type'], 'image'));
        }
      }

    public function proyectos()
    {
	     $this->se_requiere_logueo(true,'Cialc|proyectos');
       require URL_VISTA.'cialc/proyectos.php';
    }
    public function obtener_proyectos()
    {
	     $this->se_requiere_logueo(true,'Cialc|proyectos');
       $cialc = $this->loadModel('Cialc');
       print $cialc->obtener_proyectos($_POST);
    }

    public function seminarios()
    {
	     $this->se_requiere_logueo(true,'Cialc|seminarios');
       require URL_VISTA.'cialc/seminarios.php';
    }
    public function obtener_seminarios()
    {
	     $this->se_requiere_logueo(true,'Cialc|seminarios');
       $cialc = $this->loadModel('Cialc');
       print $cialc->obtener_seminarios($_POST);
    }


    public function agregar_proyecto()
    {
	     $this->se_requiere_logueo(true,'Cialc|agregar_proyecto');
       require URL_VISTA.'modales/cialc/agregar_proyecto.php';
    }
    public function agregar_proyecto_do()
    {
	     $this->se_requiere_logueo(true,'Cialc|agregar_proyecto');
       $cialc = $this->loadModel('Cialc');
       print $cialc->agregar_proyecto_do($_POST);
    }


    public function editar_proyecto($id)
    {
	     $this->se_requiere_logueo(true,'Cialc|editar_proyecto');
       $cialc = $this->loadModel('Cialc');
       $proyecto = $cialc->getProyect($id);
       require URL_VISTA.'modales/cialc/editar_proyecto.php';
    }

    public function editar_proyecto_do()
    {
      D::bug($_POST);
	     $this->se_requiere_logueo(true,'Cialc|editar_proyecto');
       $cialc = $this->loadModel('Cialc');
       D::bug($_POST);
       $cialc->editar_proyecto_do($_POST);
    }


    public function editar_seminario($id)
    {
	     $this->se_requiere_logueo(true,'Cialc|editar_seminario');
       $cialc = $this->loadModel('Cialc');
       $seminario = $cialc->getSeminario($id);
       require URL_VISTA.'modales/cialc/editar_seminario.php';
    }

    public function editar_seminario_do()
    {
	     $this->se_requiere_logueo(true,'Cialc|editar_seminario');
       $cialc = $this->loadModel('Cialc');
       print $cialc->editar_seminario_do($_POST);
    }

    public function agregar_seminario()
    {
	     $this->se_requiere_logueo(true,'Cialc|agregar_seminario');
       require URL_VISTA.'modales/cialc/agregar_seminario.php';
    }
    public function agregar_seminario_do()
    {
	     $this->se_requiere_logueo(true,'Cialc|agregar_seminario');
       $cialc = $this->loadModel('Cialc');
       print $cialc->agregar_seminario_do($_POST);
    }

}
