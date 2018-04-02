<?php
class Login extends Controlador
{
    public function index()
    {	
		$this->se_requiere_logueo(false);
		require_once '../vendor/mobiledetect/mobiledetectlib/namespaced/Detection/MobileDetect.php';
		$detect = new Mobile_Detect;
		if($detect->isMobile()){
			if($detect->isTablet()){
				include (URL_VISTA.'login/index.php');
			}else{
				/*Celular*/
				include (URL_VISTA.'material/login.php');
			}
		}else{
			include (URL_VISTA.'login/index.php');
		}
    }
	
	
	public function modal_all_sign_out(){
		$this->se_requiere_logueo(true,'Login|force_all_sign_out');
		require URL_VISTA.'modales/login/sign-all-out.php';
	}
	public function sign_all_out(){
		$this->se_requiere_logueo(true,'Login|force_sign_out');
		
		$login = $this->loadModel('Login');
		$whosLogin = $login->whoisLogged();
		
		$mobile = $this->loadModel('Mobile');
		
		foreach ($whosLogin as $logged){
			$token = 'LGN:'.$this->token(62);
			$id_operador_unidad = $mobile->getIdOperadorUnidad($logged['id_usuario']);
			$mobile->setCveStore($_SESSION['id_usuario'],$token,154,$id_operador_unidad,false);
			$login->signout($logged['id_usuario']);
		}
	}
	public function switch_login_op($estado){
		$this->se_requiere_logueo(true,'Login|switch_login_op');
		
		$state = ($estado == 'true')?'1':'0';
		
		$data['id_site']	= '1';
		$data['descripcion']= 'login_permitido';
		$data['valor']		= $state;
		$data['tmp_val']	= '0';
		$data['data']		= '0';
		
		Controlador::setConfig($data);
		print json_encode(array('resp' => true));
	}
	
	public function modal_sign_out($id_usuario){
		$this->se_requiere_logueo(true,'Login|force_sign_out');
		require URL_VISTA.'modales/login/sign-out.php';
	}
	public function sign_out($id_usuario){
		$this->se_requiere_logueo(true,'Login|force_sign_out');
		$model = $this->loadModel('Login');
		print $model->signout($id_usuario);
	}
	public function logear()
    {
		$this->se_requiere_logueo(false);
		$obtener_modelo = $this->loadModel('Login');
		$loguear = $obtener_modelo->logear();
        return $loguear;
    }
	public function verifica_session()
    {
		/*se_requiere_logueo no se llama por que este reconstruye la sesion cuando es verdadero, y cuando es falso redirige al estar la sesion iniciada*/
		$obtener_modelo = $this->loadModel('Login');
		$verificar = $obtener_modelo->verificarSession();
        return $verificar;
    }
	public function keepAlive()
    {
		//$this->se_requiere_logueo(true,'Login|salir');
		$obtener_modelo = $this->loadModel('Login');
		print json_encode($obtener_modelo->keepAlive());
    }
	public function keepAliveReset()
    {
		$this->se_requiere_logueo(true,'Login|salir');
		$obtener_modelo = $this->loadModel('Login');
		print json_encode($obtener_modelo->keepAlive());
    }
	public function salir()
    {
		$this->se_requiere_logueo(true,'Login|salir');
		$obtener_modelo = $this->loadModel('Login');
		$salir = $obtener_modelo->salir();
        return $salir;
    }
	public function salirAlternativo()
    {
		$obtener_modelo = $this->loadModel('Login');
		$salir = $obtener_modelo->salir();
        return $salir;
    }
	public function lockSession()
    {
		$this->se_requiere_logueo(true,'Login|salir');

		$usuario_data = $this->loadModel('Usuarios');
		$model = $this->loadModel('Login');
		
		$usuario = $usuario_data->datos_usuario($_SESSION['id_usuario']);
		$perfil  = $usuario_data->perfil_usuario($_SESSION['id_usuario']);
		if($perfil['avatar']){$avatar = self::duplicatePublic($perfil['avatar']);}
		

		$credenciales_top = $model->credenciales();
		$usuario_menu_top = $usuario_data->datos_usuario($_SESSION['id_usuario']);
		$correo = $_SESSION['correo'];
		$username = $_SESSION['usuario'];
		$usuario_name = $usuario_menu_top['nombres'];			
		$model->salirDirect();
		include (URL_VISTA.'login/lock.php');
		
    }	
	public function recuperar_datos()
    {
		$this->se_requiere_logueo(false);
		$obtener_modelo = $this->loadModel('Login');
		$token = $this->token(62);
		D::bug($_POST['correo']);
		$recuperar = $obtener_modelo->recuperar_datos($_POST['correo'],$token);
		
		$datamail['subject'] = 'Recuperación de cuenta';
		$datamail['plantilla'] = 'lostpassword';
		$datamail['destinatarios'] = array(
										$_POST['correo']
									);
		$datamail['body'] = array(
								'token' => $token,
								'usuario' => $recuperar[0]['usuario']
							);
							
		$this->sendMail($datamail);	
		
        print json_encode($recuperar);
    }
}
?>
