<?php
if(DEVELOPMENT){
	require_once('../vendor/php-console/php-console/src/PhpConsole/__autoload.php');
	$debug = PhpConsole\Handler::getInstance();
	$debug->start();
}
class D
{
	static function bug($var){
		require_once('../vendor/php-console/php-console/src/PhpConsole/__autoload.php');
		PhpConsole\Connector::getInstance()->getDebugDispatcher()->dispatchDebug($var,'PHP>>');
	}
}
class Controller extends D{
	static function setOption($arreglo,$id){
		$opciones = "<option value=''>Seleccione...</option>";
		for($i=0;$i<count($arreglo);$i++){
			if($id==""){
					$opciones .=  "<option value='".$arreglo[$i]['value']."'>".$arreglo[$i]['valor']."</option>";
			}else{
				if($id==$arreglo[$i]['value']){
					$opciones .=  "<option value='".$arreglo[$i]['value']."' selected>".$arreglo[$i]['valor']."</option>";
				}else{
					$opciones .=  "<option value='".$arreglo[$i]['value']."'>".$arreglo[$i]['valor']."</option>";
				}
			}
		}
		return $opciones;
	}
	public function sendMail($datamail){
		include_once("../vendor/manuelaguado/mail_2_0/mail2.0.php");
		$correo = new Email();
		$correo->envia_correo($datamail);
	}
	static function tiene_permiso($levels=0){
		if(isset($_SESSION['token'])){
			if(!in_array($levels,$_SESSION['permisos'])){
				$permiso = false;
			}else{
				$permiso = true;
			}
			return $permiso;
		}else{
			$permiso = false;
		}
    }
	static function token($long=25){
		$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		mt_srand((double)microtime()*1000000);
		$i=0;
		$pass = '';
		while ($i != $long) {
			$rand=mt_rand() % strlen($chars);
			$tmp=$chars[$rand];
			$pass=$pass . $tmp;
			$chars=str_replace($tmp, "", $chars);
			$i++;
		}
		return strrev($pass);
	}
	public function descargar_archivo($archivo) {
		if (file_exists($archivo)) {
			$filename = basename($archivo);
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . $filename);
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($archivo));
			ob_clean();
			flush();
			readfile($archivo);
		}
	}
	static function diferenciaFechas($init,$end){
		$datetime1 = new DateTime($init);
		$datetime2 = new DateTime($end);
		$dteDiff = $datetime1->diff($datetime2);
		return $dteDiff->format("%H:%I:%S");
	}
	static function diferenciaFechasD($init,$end){
		$datetime1 = new DateTime($init);
		$datetime2 = new DateTime($end);
		$dteDiff = $datetime1->diff($datetime2);
		return $dteDiff->format("0000-%M-%D %H:%I:%S");
	}
	static function diferenciaSegundos($init,$end){
		$segundos = strtotime($end) - strtotime($init);
		return $segundos;
	}
	static function ipv4to6($ip = NULL) {
		$ip =($ip === NULL)?$_SERVER['REMOTE_ADDR']:$ip;
		$ipAddressBlocks = explode('.', $ip);
		if (count($ipAddressBlocks) == 0) {
			return;
		}
		$ipv6       = '';
		$ipv6Pieces = 0;
		foreach ($ipAddressBlocks as $ipAddressBlock) {
			if ($ipv6Pieces%4 == 0 && $ipv6Pieces > 0) {
				$ipv6 .= '::';
			}
			$ipv6Piece = dechex($ipAddressBlock);
			$ipv6 .= (is_numeric($ipv6Piece) && $ipv6Piece < 10 ? '0'.$ipv6Piece : $ipv6Piece);
			$ipv6Pieces = strlen(str_replace('::', '', $ipv6));
		}
		return $ipv6.'::/48';
	}
}
class Controlador extends Controller
{

    public $db = null;
	public $dbt = null;
    function __construct()
    {
        $this->openDatabaseConnection();
    }
    private function openDatabaseConnection()
    {
		$options1 = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
        $options2 = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
        $this->db = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options2);
		$this->dbt = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options1);

    }
	static function direct_connectivity()
    {
        $options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING);
        return new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }
	public function mysqlConnectivity(){
		$dbtype = "MySQL";
		$res=mysql_connect(DB_HOST, DB_USER, DB_PASS);
		mysql_select_db("test");
		return $res;
	}
    public function loadModel($nombre_del_modelo)
    {
        require URL_MODELO . $nombre_del_modelo . '.php';
		$modelo = $nombre_del_modelo . "Model" ;
        return new $modelo($this->db, $this->dbt);
    }
	public function selectCatalog($tipo,$id_cat){
		$array = array();
		$qry = "SELECT * FROM cm_catalogo where catalogo = '".$tipo."' and activo = 1 order by orden ASC;";
		$query = $this->db->prepare($qry);
		$query->execute();
		if($query->rowCount()>=1){
			$areas = $query->fetchAll();
			$cont = 0;
			foreach ($areas as $row) {
				$array[$cont]['value']=$row->id_cat;
				$array[$cont]['valor']=$row->etiqueta;
				$cont++;
			}
		}
		return Controller::setOption($array,$id_cat);
	}
	static function updateLogin(){
		$db = self::direct_connectivity();
		$update = date("Y-m-d H:i:s");
		$qry = "
			UPDATE `fw_login`
			SET
			 `ultima_verificacion` = '".$update."'
			WHERE
				`id_usuario` = '".$_SESSION['id_usuario']."' AND
				`open` = '1'
		";
		$query = $db->prepare($qry);
		$query->execute();
	}
	static function getConfig($id_site,$config){
		$db = self::direct_connectivity();
		$qry = "
			SELECT
				fw_config.valor as valor,
				fw_config.tmp_val as temporal,
				fw_config.`data` as datos
			FROM
				fw_config
			WHERE
				fw_config.id_site = $id_site
			AND fw_config.descripcion = '".$config."'
		";
		$query = $db->prepare($qry);
		$query->execute();
		$array = array();
		if($query->rowCount()>=1){
			$data = $query->fetchAll();
			foreach ($data as $row) {
				$array['valor']=$row->valor;
				$array['temporal']=$row->temporal;
				$array['datos']=$row->datos;
			}
		}
		return $array;
	}
	static function setConfig($data){
		$db = self::direct_connectivity();
		$exist = self::existConfig($data);
		if(!$exist){
			$qry = "
				INSERT INTO `fw_config` (
					`id_site`,
					`descripcion`,
					`valor`,
					`tmp_val`,
					`data`,
					`user_alta`,
					`fecha_alta`
				)
				VALUES
					(
						'".$data['id_site']."',
						'".$data['descripcion']."',
						'".$data['valor']."',
						'".$data['tmp_val']."',
						'".$data['data']."',
						'".$_SESSION['id_usuario']."',
						NOW()
					);
			";
		}else{
			$qry = "
				UPDATE `fw_config`
				SET
				 `valor` = '".$data['valor']."',
				 `tmp_val` = '".$data['tmp_val']."',
				 `data` = '".$data['data']."',
				 `user_mod` = '".$_SESSION['id_usuario']."',
				 `fecha_mod` = NOW()
				WHERE
					`id_site` = '".$data['id_site']."' AND
					`descripcion` = '".$data['descripcion']."'
			";
		}
		$query = $db->prepare($qry);
		$query->execute();
	}
	static function existConfig($data){
		$db = self::direct_connectivity();
		$qry = "
			SELECT
				fw_config.id_config
			FROM
				fw_config
			WHERE
				fw_config.id_site = ".$data['id_site']."
			AND fw_config.descripcion = '".$data['descripcion']."'
		";
		$query = $db->prepare($qry);
		$query->execute();
		if($query->rowCount()>=1){
			$return = true;
		}else{
			$return = false;
		}
		return $return;
	}//$_SESSION['pass_chge']
    protected function se_requiere_logueo($requerido,$levels=0){
		if($requerido == true){
			if(!isset($_SESSION['token'])){
				Header("Location: ".URL_APP."login");
				exit();
			}else{
				if(($_SESSION['tyc'] == 'SI')&&($_SESSION['pass_chge'] == 133)){

					$_SESSION['hora_acceso']=time();
					self::updateLogin();
					if(!in_array($levels,$_SESSION['permisos'])){
						require URL_TEMPLATE.'403.php';
						exit();
					}

				}else{
					if($_SESSION['tyc'] != 'SI'){
						require URL_TEMPLATE.'tyc.php';
						exit();
					}else if($_SESSION['pass_chge'] != 133){
						require URL_TEMPLATE.'pass_chge.php';
						exit();
					}
				}
			}
		}elseif($requerido == false){
			if(isset($_SESSION['token'])){
				Header("Location: ".URL_APP."inicio");
			}
		}
    }
	protected function duplicatePublic($imagen){
		$token = $this->token();
		$destino = $token.$imagen;

		$tmp = '../public/tmp/';
		$files = scandir($tmp);
		foreach($files as $file){
			if ((is_file($tmp.$file))&&($file != '.gitkeep')) {
				unlink($tmp.$file);
			}
		}

		$cache = '../public/plugs/cache/';
		$filesc = scandir($cache);
		foreach($filesc as $filec){
			if ((is_file($cache.$filec))&&($filec != '.gitkeep')) {
				unlink($cache.$filec);
			}
		}
		copy('../uploads/perfiles/'.$imagen, $tmp.$destino);
		return $destino;
	}
}
?>
