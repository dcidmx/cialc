<?php
class Directorio extends Controlador
{
    public function index()
    {
	     $this->se_requiere_logueo(true,'Directorio|index');
       require URL_VISTA.'directorio/directorio.php';
    }
    public function obtener_directorio(){
           $this->se_requiere_logueo(true,'Directorio|index');
           $obtener_modelo = $this->loadModel('Directorio');
           print $obtener_modelo->obtener_directorio($_POST);
    }
    public function modal_add_dir(){
           $this->se_requiere_logueo(true,'Directorio|agregar_directorio');
           require URL_VISTA.'modales/directorio/agregar_directorio.php';
    }
    public function agregar_elemento(){
           $this->se_requiere_logueo(true,'Directorio|agregar_directorio');
           $usuario_model = $this->loadModel('Directorio');
           $agregar_elemento = $usuario_model->agregar_elemento($_POST);
           print json_encode($agregar_elemento);
    }
    public function editar_directorio($id_directorio){
           $this->se_requiere_logueo(true,'Directorio|index');
           $directory_data = $this->loadModel('Directorio');
           $elm = $directory_data->data_element($id_directorio);
           require URL_VISTA.'modales/directorio/editar_directorio.php';
    }
    public function editar_elemento(){
           $this->se_requiere_logueo(true,'Directorio|agregar_directorio');
           $usuario_model = $this->loadModel('Directorio');
           $editar_elemento = $usuario_model->editar_elemento($_POST);
           print json_encode($editar_elemento);
    }

    public function upload_dropzone($id_directorio){
        $this->se_requiere_logueo(true,'Directorio|agregar_directorio');
        $upload_dir = '../public/frontend/images/directorio/';
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
            $set_image = $this->loadModel('Directorio');
            $inserta_imagen = $set_image->set_avatar($original,$id_directorio);
            echo $temporal.'|'.$original;
          }
        }else{
          D::bug('Algunos errores ocurrieron al actualizar el avatar: '.strpos($_FILES['file']['type'], 'image'));
        }
      }
      
    private function smart_rename($ruta){
           $this->se_requiere_logueo(true,'Directorio|agregar_directorio');
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
}
?>
