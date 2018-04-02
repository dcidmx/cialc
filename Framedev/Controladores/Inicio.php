<?php
class Inicio extends Controlador
{
    public function index()
    {
		$this->se_requiere_logueo(true,'Inicio|index');
		$avatar_usr_circ = '';
		$usuario_name = '';
		$credenciales_top = array();
		$credenciales_top['rol'] = '';
		
		if(isset($_SESSION['id_rol'])){
			$id_rol = $_SESSION['id_rol'];
			$id_usuario = $_SESSION['id_usuario'];
			
			// if($id_rol==2){
				// header('Location: '.URL_APP.'mobile');
			// }
		
			$model = $this->loadModel('Login');
			$credenciales_top = $model->credenciales();
			
			$usuario_data = $this->loadModel('Usuarios');
				$usuario_menu_top = $usuario_data->datos_usuario($id_usuario);
				$perfil_menu_top  = $usuario_data->perfil_usuario($id_usuario);
				
			$avatar_usr_circ = (empty ($perfil_menu_top['avatar'])) ? 'ace/avatars/avatar2.png' : 'tmp/'.self::duplicatePublic($perfil_menu_top['avatar']);
			$usuario_name = $usuario_menu_top['nombres'];
		}
		require URL_TEMPLATE.'start.php';
    }
}
?>