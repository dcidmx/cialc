<?php
class Pdf extends Controlador
{
    public function index()
    {
		require URL_TEMPLATE.'404.php';
    }
	public function modal_resguardo_telefonico($id_celular){
		$this->se_requiere_logueo(true,'Pdf|resguardo_telefonico');
		
		$usuarios = $this->loadModel('Roles');
		$roles = $usuarios->selectUsersByRoles("'7','8','9'",'');
		
		require URL_VISTA.'modales/pdf/resguardo_telefono.php';
	}
	
	public function resguardo_telefonico($id_celular){
		$this->se_requiere_logueo(true,'Pdf|resguardo_telefonico');
		
		$autoriza = $_POST['autoriza'];
		$tiempo = $_POST['tiempo'];
		$accesorios = $_POST['accesorios'];
		$opciones = $_POST['opciones'];
		$token = $this->token(8);
		
		$datospdf = $this->loadModel('Telefonia');
			$resguardo = $datospdf->dataResguardo($id_celular);
			$firma = hash( 'sha512', $resguardo['id_operador_celular'].$resguardo['nombre'].$resguardo['imei'].$resguardo['marca'].$resguardo['modelo'] );
			$domicilio = $datospdf->getDomicilio($resguardo['id_operador_celular']);
			
		require '../reportes/resguardo_telefonico.php';
		
		echo json_encode(array('resp'=>true,'token'=>$token)); 
	}
}
?>