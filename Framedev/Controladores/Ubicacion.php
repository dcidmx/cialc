<?php
class Ubicacion extends Controlador
{
    public function index()
    {
		$this->se_requiere_logueo(true,'Ubicacion|index');
        require URL_TEMPLATE.'404.php';
    }
	public function obtener_ubicaciones(){
		$this->se_requiere_logueo(true,'Ubicacion|obtener_ubicaciones');
		$obtener_modelo = $this->loadModel('Ubicacion');
		$data_ubicaciones = $obtener_modelo->obtener_ubicaciones();
		print $data_ubicaciones;
	}
}
?>
