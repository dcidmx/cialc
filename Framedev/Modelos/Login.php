<?php
class LoginModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	public function whoisLogged(){
		$sql = '
			SELECT SQL_CALC_FOUND_ROWS
				fwl.id_usuario AS id_usuario,
				fwl.session_id AS session_id
			FROM
				fw_login AS fwl
			INNER JOIN fw_usuarios AS fwu ON fwl.id_usuario = fwu.id_usuario
			WHERE
				fwl.`open` = 1
			ORDER BY
				id_usuario ASC
		';
		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		$array = array();
		if($query->rowCount()>=1){
			$num=0;
			foreach ($result as $num => $row) {
				$array[$num]['id_usuario'] = $row->id_usuario;
				$array[$num]['session_id'] = $row->session_id;
				$num++;
			}
		}
		return $array;
	}
	public function initLogin($id_login){
		$sql = "
			SELECT
				fw_login.fecha_login
			FROM
				fw_login
			WHERE
				fw_login.id_login = ".$id_login."
		";

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				return $row->fecha_login;
			}
		}
	}
	public function getId_login($id_usuario = NULL){
		$id_usuario =($id_usuario === NULL)?$_SESSION['id_usuario']:$id_usuario;
		$sql = "
			SELECT
				fw_login.id_login
			FROM
				fw_login
			WHERE
				fw_login.id_usuario = ".$id_usuario." AND
				fw_login.open = 1
		";

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				return $row->id_login;
			}
		}
	}

	public function session_duplicada($id_usuario){
		$sql = "
			SELECT
				fw_login.id_login,
				fw_login.session_id,
				fw_login.fecha_login
			FROM
				fw_login
			WHERE
				fw_login.id_usuario = ".$id_usuario." AND
				fw_login.`open` = 1
		";

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				self::closeSession($row->id_login,$id_usuario,$row->fecha_login,$row->session_id);
			}
		}
	}
	public function logear(){

		$stat = self::getStatusUser($_POST['usuario']);
		if($stat == 131){
			$array[]=array('resp'=>"inhabilitado");
			print json_encode($array);
			exit();
		}

		$password_md5=md5($_POST['password']);
        $sql = "
		SELECT * FROM fw_usuarios
		INNER JOIN fw_usuarios_config ON fw_usuarios_config.id_usuario = fw_usuarios.id_usuario
		WHERE usuario='{$_POST['usuario']}' and password = '{$password_md5}' and cat_status = '3'";
		$query = $this->db->prepare($sql);
        $query->execute();
        $usuario = $query->fetchAll();
		if($query->rowCount()>=1){

			foreach ($usuario as $row) {
				self::session_duplicada($row->id_usuario);

				session_name(SITE_NAME);
				$_SESSION['id_usuario']=$row->id_usuario;
				$_SESSION['id_rol']=$row->id_rol;
				$_SESSION['hora_acceso']= time();
				$_SESSION['usuario']=$row->usuario;
				$_SESSION['id_ubicacion']=$row->id_ubicacion;
				$_SESSION['correo']=$row->correo;
				$_SESSION['tyc']=$row->aceptar_tyc;
				$_SESSION['pass_chge']=$row->cat_pass_chge;
				$_SESSION['token'] = Controlador::token(62);
				$array[0]=array('resp'=>"acceso_correcto");
			}
				self::MobileDetect();
				$array[1] = array('dispositivo'=>$_SESSION['dispositivo']);

				$acceso = Controlador::getConfig(1,'login_permitido');

				if($acceso['valor'] == 1){

					self::permisos($_SESSION['id_rol']);
					$array[2] = array('via'=>"correcta");
					self::storeSession($_SESSION['id_usuario']);

				}else{

					session_unset();
					unset($_SESSION);
					session_destroy();
					$array[2] = array('via'=>"disabled");

				}
		}else{
      $id_usuario = self::getIdUsuario($_POST['usuario']);
      if($id_usuario !== false){
  			self::putLoggerLogin($id_usuario);
      }
      $array[]=array('resp'=>"acceso_incorrecto");
		}
		print json_encode($array);
	}
	public function getStatusUser($usuario){
		$sql = "
			SELECT
				fw_usuarios.cat_status
			FROM
				fw_usuarios
			WHERE
				fw_usuarios.usuario = '".$usuario."'
		";

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				return $row->cat_status;
			}
		}
	}
	public function putLoggerLogin($id_usuario){
		$ahora = date("Y-m-d H:i:s");
		$logger = self::selectLoggerLogin($id_usuario);
		if($logger['id_login_log'] !== NULL){
			if($logger['intentos'] <= 4){
				$segundos = Controller::diferenciaSegundos($logger['fecha'],$ahora);
				($segundos <= 600)?self::updateLoggerLogin($logger['id_login_log']):self::insertLoggerLogin($id_usuario);
			}else{
				self::inhabilitarUsuario($id_usuario);
			}
		}else{
			self::insertLoggerLogin($id_usuario);
		}
	}
	public function inhabilitarUsuario($id_usuario){
		$ahora = date("Y-m-d H:i:s");
		$sql = "
			UPDATE `fw_usuarios`
			SET
			 `cat_status` = '131',
			 `user_mod` = '".$id_usuario."'
			WHERE
				(`id_usuario` = '".$id_usuario."');
		";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
	public function insertLoggerLogin($id_usuario){
		$ahora = date("Y-m-d H:i:s");
		$sql = "
			INSERT INTO `fw_login_log` (
				`id_usuario`,
				`ip`,
				`fecha`,
				`intentos`
			)
			VALUES
				(
					'".$id_usuario."',
					'".$_SERVER['REMOTE_ADDR']."',
					'".$ahora."',
					'1'
				);
		";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
	public function updateLoggerLogin($id_login_log){
		$ahora = date("Y-m-d H:i:s");
		$sql = "
			UPDATE `fw_login_log`
			SET
			 `ip` = '".$_SERVER['REMOTE_ADDR']."',
			 `fecha` = '".$ahora."',
			 `intentos` = intentos + 1
			WHERE
				(`id_login_log` = '".$id_login_log."');
		";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
	public function selectLoggerLogin($id_usuario){
		$sql = "
			SELECT
				fw_login_log.id_login_log,
				fw_login_log.ip,
				fw_login_log.fecha,
				fw_login_log.intentos
			FROM
				fw_login_log
			WHERE
				fw_login_log.id_usuario = '".$id_usuario."'
			ORDER BY
				fw_login_log.id_login_log DESC
			LIMIT 0,
			 1
		";
		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		$array = array();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				$array['id_login_log'] 	= $row->id_login_log;
				$array['ip'] 			= $row->ip;
				$array['fecha'] 		= $row->fecha;
				$array['intentos'] 		= $row->intentos;
			}
			return $array;
		}else{
			return array('id_login_log' => NULL);
		}
	}
	public function getIdUsuario($usuario){
		$sql = "
			SELECT
				fw_usuarios.id_usuario
			FROM
				fw_usuarios
			WHERE
				fw_usuarios.usuario = '".$usuario."'
		";

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				return $row->id_usuario;
			}
		}else{
      return false;
    }
	}
	public function storeSession($id_usuario){
		$init = date("Y-m-d H:i:s");
		$sql = "
			INSERT INTO `fw_login` (
				`id_usuario`,
				`session_id`,
				`open`,
				`fecha_login`,
				`ipv4`,
				`ipv6`,
				`user_alta`,
				`fecha_alta`
			)
			VALUES
				(
					'".$id_usuario."',
					'".session_id()."',
					'1',
					'".$init."',
					'".$_SERVER['REMOTE_ADDR']."',
					'".Controller::ipv4to6()."',
					'".$_SESSION['id_usuario']."',
					'".$init."'
				);
		";

		$query = $this->db->prepare($sql);
		$query->execute();
	}
	public function closeSession($id_login, $id_usuario, $fecha_login = NULL, $session_id = NULL){

		$fecha_login =($fecha_login === NULL)?self::initLogin($id_login):$fecha_login;
		$fin = date("Y-m-d H:i:s");
		$tiempo = Controller::diferenciaFechasD($fecha_login , $fin);
		$sql = "
			UPDATE `fw_login`
			SET
			 `open` = '0',
			 `fecha_logout` = '".$fin."',
			 `tiempo_session` = '".$tiempo."',
			 `user_mod` = '".$id_usuario."',
			 `fecha_mod` = '".$fin."'
			WHERE
				(`id_login` = '".$id_login."');
		";

		$session_id =($session_id === NULL)?self::getSession_id($id_login):$session_id;
		///var/lib/php/sessions
		if(($session_id != session_id())&&(file_exists(session_save_path().'/sess_'.$session_id))){
			unlink(session_save_path().'/sess_'.$session_id);
		}

		$query = $this->db->prepare($sql);
		$query->execute();
	}
	public function signout($id_usuario){

		$id_login = self::getId_login($id_usuario);
		$fecha_login = self::initLogin($id_login);
		$fin = date("Y-m-d H:i:s");
		$tiempo = Controller::diferenciaFechasD($fecha_login , $fin);
		D::bug($tiempo);
		$sql = "
			UPDATE `fw_login`
			SET
			 `open` = '0',
			 `fecha_logout` = '".$fin."',
			 `tiempo_session` = '".$tiempo."',
			 `user_mod` = '".$id_usuario."',
			 `fecha_mod` = '".$fin."'
			WHERE
				(`id_login` = '".$id_login."');
		";

		$session_id = self::getSession_id($id_login);

		if(file_exists(session_save_path().'/sess_'.$session_id)){
			unlink(session_save_path().'/sess_'.$session_id);
		}

		$query = $this->db->prepare($sql);
		$query->execute();
		return json_encode(array('resp' => true ));
	}
	public function getSession_id($id_login){
		$sql = "
			SELECT
				fw_login.session_id
			FROM
				fw_login
			WHERE
				fw_login.id_login = ".$id_login."
		";

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			foreach ($result as $num => $row) {
				return $row->session_id;
			}
		}
	}

	public function MobileDetect(){
		require_once '../vendor/mobiledetect/mobiledetectlib/namespaced/Detection/MobileDetect.php';
		$detect = new Mobile_Detect;
		$array = array();
		if($detect->isMobile()){
			if($detect->isTablet()){
				$_SESSION['dispositivo'] = 'tableta';
			}else{
				$_SESSION['dispositivo'] = 'celular';
			}
		}else{
			$_SESSION['dispositivo'] = 'pc';
		}
	}
	public function credenciales(){
		$data = array();
		if(isset($_SESSION['id_rol'])){

			$id_ubicacion = isset($_SESSION['id_ubicacion']) ? $_SESSION['id_ubicacion'] : '';
			$id_rol = isset($_SESSION['id_rol']) ? $_SESSION['id_rol'] : '';
			$sql = "
					SELECT
						fw_ubicacion.descripcion_ubicacion,
						fw_roles.descripcion as rol
					FROM
						fw_ubicacion,
						fw_roles
					WHERE
						fw_ubicacion.id_ubicacion = ".$id_ubicacion."
					AND
						fw_roles.id_rol = ".$id_rol."
			";
			$query = $this->db->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			if($query->rowCount()>=1){
				foreach ($result as $num => $row) {
					$data['descripcion'] = $row->descripcion_ubicacion;
					$data['rol'] = $row->rol;
				}
			}else{
					$data['descripcion'] = '';
					$data['rol'] = '';
			}
		}
		return $data;
	}

	private function permisos($rol){
		$sql = "SELECT	fw_metodos.controlador, fw_metodos.metodo	FROM fw_permisos INNER JOIN fw_metodos ON fw_permisos.id_metodo = fw_metodos.id_metodo where fw_permisos.id_rol = $rol ";
		$query = $this->db->prepare($sql);
		$query->execute();
		$permisos = $query->fetchAll();
		$accesos = '';
		if($query->rowCount()>=1){
			foreach ($permisos as $num => $row) {
				$accesos[$num] = $row->controlador .'|'. $row->metodo;
			}
			$_SESSION['permisos'] = $accesos;
		}else{
			$_SESSION['permisos'] = '';
		}
	}
	public function verificarSession(){
		if(is_file(session_save_path().'/sess_'.session_id())){
			$contenido=file_get_contents(session_save_path().'/sess_'.session_id());
			if(strpos($contenido, 'id_usuario|s')===false){
				$array[]=array('resp'=>"exitnow");
				print json_encode($array);
				exit();
			}
		}
		if(!isset($_SESSION['hora_acceso'])){
			$array[]=array('resp'=>"timeout");
		}else{
			$resta = time()-$_SESSION['hora_acceso'];
			/*1800 = 30 minutos*/
			/*3600 = 1 hr*/
			/*tiempo en segundos*/
			if(isset($_SESSION['hora_acceso']) && ($resta>1800)){
				$array[]=array('resp'=>"timeout",'tiempo'=>$resta);
			}else{
				$array = self::keepAlive();
			}
		}
		print json_encode($array);
	}
	public function keepAlive(){
		$resta = time()-$_SESSION['hora_acceso'];
		$array[]=array('resp'=>"intime",'tiempo'=>$resta);
		Controlador::updateLogin();
		return $array;
	}
	public function salir(){
		$id_login = self::getId_login();
		self::closeSession($id_login, $_SESSION['id_usuario']);
		session_unset();
		unset($_SESSION);
		if(session_destroy()){
			$array[]=array('resp'=>"correcto");
		}else{
			$array[]=array('resp'=>"incorrecto");
		}
		print json_encode($array);
	}
	public function salirDirect(){
		$id_login = self::getId_login();
		self::closeSession($id_login, $_SESSION['id_usuario']);
		session_unset();
		unset($_SESSION);
		session_destroy();
	}
	public function recuperar_datos($correo,$token){
        $sql = "SELECT id_usuario, usuario FROM fw_usuarios WHERE correo='{$correo}'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $usuario = $query->fetchAll();
		if($query->rowCount()>=1){
			self::insert_lost_password($token,$usuario[0]->id_usuario,$correo);
			$array[]=array('resp'=>"enviado",'usuario'=>$usuario[0]->usuario);
		}else{
			$array[]=array('resp'=>"no_existe");
		}
		return $array;
	}
	private function insert_lost_password($token,$id,$correo){
		$clean = "DELETE FROM fw_lost_password WHERE correo = :correo";
        $query = $this->db->prepare($clean);
        $query->execute(array(':correo' => $correo));

		$sql = "INSERT INTO fw_lost_password (	token, 	id_usuario, correo) VALUES (:token, :id_usuario, :correo)";
		$query = $this->db->prepare($sql);
		$query->execute(array(':token' => $token, ':id_usuario' => $id, ':correo' => $correo));
	}
}
