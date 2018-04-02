<?php
class Cp extends Controlador
{
    public function index()
    {
       echo "index";
    }
    function cp_import(){
      set_time_limit(0);
  		$db = Controlador::direct_connectivity();


  		self::crear_estructura($db);
  		self::cp_clean($db);
  		self::cp_order($db);
  		self::fix_structure($db);
  		self::cp_zonas($db);
  		self::cp_estados($db);
  		self::cp_tipo_asent($db);
  		self::cp_ciudades($db);
  		self::cp_municipios($db);
  		self::cp_cp($db);
  		self::rename_db($db);


  	}

  	private function rename_db($db){
  		$fix = "RENAME TABLE CPdescarga TO cp_asentamientos;";
  		$qry = $db->prepare($fix);
  		$qry->execute();
  	}
  	private function fix_structure($db){
  		$fix = "
  			ALTER TABLE `CPdescarga`
  			MODIFY COLUMN `D_mnpio`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL AFTER `d_codigo`,
  			MODIFY COLUMN `d_ciudad`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL AFTER `D_mnpio`,
  			ADD COLUMN `id`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT FIRST ,
  			ADD PRIMARY KEY (`id`);
  		";
  		$qry = $db->prepare($fix);
  		$qry->execute();
  	}

  	private function crear_estructura($db){
  		$clean = "CREATE TABLE `cp_zn` (`id_zona`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`zona`  varchar(255) NULL ,PRIMARY KEY (`id_zona`));";
  		$qry = $db->prepare($clean);
  		$qry->execute();

  		$clean = "CREATE TABLE `cp_ed` (`id_estado`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`estado`  varchar(255) NULL ,PRIMARY KEY (`id_estado`));";
  		$qry = $db->prepare($clean);
  		$qry->execute();

  		$clean = "CREATE TABLE `cp_ta` (`id_tipo_asentamiento`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`tipo_asentamiento`  varchar(255) NULL ,PRIMARY KEY (`id_tipo_asentamiento`));";
  		$qry = $db->prepare($clean);
  		$qry->execute();

  		$clean = "CREATE TABLE `cp_ci` (`id_ciudad`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`ciudad`  varchar(255) NULL ,PRIMARY KEY (`id_ciudad`));";
  		$qry = $db->prepare($clean);
  		$qry->execute();

  		$clean = "CREATE TABLE `cp_mu` (`id_municipio`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`municipio`  varchar(255) NULL ,PRIMARY KEY (`id_municipio`));";
  		$qry = $db->prepare($clean);
  		$qry->execute();

  		$clean = "CREATE TABLE `cp_cp` (`id_cp`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`cp`  varchar(255) NULL ,PRIMARY KEY (`id_cp`));";
  		$qry = $db->prepare($clean);
  		$qry->execute();
  	}
  	private function cp_order($db){
  		$clean = "ALTER TABLE CPdescarga MODIFY COLUMN d_asenta VARCHAR(255) FIRST;";
  		$qry = $db->prepare($clean);
  		$qry->execute();
  	}
  	private function cp_clean($db){
  		$clean = "
  			alter table CPdescarga
  			drop c_CP,
  			drop c_estado,
  			drop c_oficina,
  			drop d_CP,
  			drop c_tipo_asenta,
  			drop c_mnpio,
  			drop id_asenta_cpcons,
  			drop c_cve_ciudad;
  		";
  		$qry = $db->prepare($clean);
  		$qry->execute();
  	}
  	public function cp_cp(){
      set_time_limit(0);
  		$db = Controlador::direct_connectivity();
  		$primera = "
  			SELECT
  				CPdescarga.d_codigo as cp
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.d_codigo
  			ORDER BY
  				CPdescarga.d_codigo ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_cp` (
  					`cp`
  				)
  				VALUES
  					(
  						'".$row->cp."'
  					);
  			";
  			$segunda_q = $db->prepare($segunda);
  			$segunda_q->execute();
  			$lastInsertId = $db->lastInsertId();
  			$tercera = "UPDATE CPdescarga SET d_codigo = ".$lastInsertId." WHERE d_codigo = '".$row->cp."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();
  			echo "import ".$row->cp."<br>";
  		}
  	}

    public function create_cp(){
      set_time_limit(0);
  		$db = Controlador::direct_connectivity();

      $clean = "CREATE TABLE `cp_cp` (`id_cp`  int(6) UNSIGNED NOT NULL AUTO_INCREMENT ,`cp`  varchar(255) NULL ,PRIMARY KEY (`id_cp`));";
      $qry = $db->prepare($clean);
      $qry->execute();

  		$primera = "
  			SELECT
  				CPdescarga.d_codigo as cp
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.d_codigo
  			ORDER BY
  				CPdescarga.d_codigo ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_cp` (
  					`cp`
  				)
  				VALUES
  					(
  						'".$row->cp."'
  					);
  			";
        $segunda_q = $db->prepare($segunda);
        $segunda_q->execute();
  		}
  	}

    public function relacionar_cp(){
      set_time_limit(0);
  		$db = Controlador::direct_connectivity();
  		$primera = "
  			SELECT
  				id_cp as id,
          cp as cp
  			FROM
  				cp_cp
  			ORDER BY
  				id_cp ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {

        $tercera = "UPDATE CPdescarga SET d_codigo = ".$row->id." WHERE d_codigo = '".$row->cp."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();

  		}
  	}

  	private function cp_municipios($db){
  		$primera = "
  			SELECT
  				CPdescarga.D_mnpio as municipio
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.D_mnpio
  			ORDER BY
  				CPdescarga.D_mnpio ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_mu` (
  					`municipio`
  				)
  				VALUES
  					(
  						'".$row->municipio."'
  					);
  			";
  			$segunda_q = $db->prepare($segunda);
  			$segunda_q->execute();
  			$lastInsertId = $db->lastInsertId();
  			$tercera = "UPDATE CPdescarga SET D_mnpio = ".$lastInsertId." WHERE D_mnpio = '".$row->municipio."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();
  			echo "import ".$row->municipio."<br>";
  		}
  	}

  	private function cp_ciudades($db){
  		$primera = "
  			SELECT
  				CPdescarga.d_ciudad as ciudad
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.d_ciudad
  			ORDER BY
  				CPdescarga.d_ciudad ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_ci` (
  					`ciudad`
  				)
  				VALUES
  					(
  						'".$row->ciudad."'
  					);
  			";
  			$segunda_q = $db->prepare($segunda);
  			$segunda_q->execute();
  			$lastInsertId = $db->lastInsertId();
  			$tercera = "UPDATE CPdescarga SET d_ciudad = ".$lastInsertId." WHERE d_ciudad = '".$row->ciudad."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();
  			echo "import ".$row->ciudad."<br>";
  		}
  	}
  	private function cp_tipo_asent($db){
  		$primera = "
  			SELECT
  				CPdescarga.d_tipo_asenta as tipo_asentamiento
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.d_tipo_asenta
  			ORDER BY
  				CPdescarga.d_tipo_asenta ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_ta` (
  					`tipo_asentamiento`
  				)
  				VALUES
  					(
  						'".$row->tipo_asentamiento."'
  					);
  			";
  			$segunda_q = $db->prepare($segunda);
  			$segunda_q->execute();
  			$lastInsertId = $db->lastInsertId();
  			$tercera = "UPDATE CPdescarga SET d_tipo_asenta = ".$lastInsertId." WHERE d_tipo_asenta = '".$row->tipo_asentamiento."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();
  			echo "import ".$row->tipo_asentamiento."<br>";
  		}
  	}
  	private function cp_estados($db){
  		$primera = "
  			SELECT
  				CPdescarga.d_estado as estado
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.d_estado
  			ORDER BY
  				CPdescarga.d_estado ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_ed` (
  					`estado`
  				)
  				VALUES
  					(
  						'".$row->estado."'
  					);
  			";
  			$segunda_q = $db->prepare($segunda);
  			$segunda_q->execute();
  			$lastInsertId = $db->lastInsertId();
  			$tercera = "UPDATE CPdescarga SET d_estado = ".$lastInsertId." WHERE d_estado = '".$row->estado."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();
  			echo "import ".$row->estado."<br>";
  		}
  	}
  	private function cp_zonas($db){
  		$primera = "
  			SELECT
  				CPdescarga.d_zona as zona
  			FROM
  				CPdescarga
  			GROUP BY
  				CPdescarga.d_zona
  			ORDER BY
  				CPdescarga.d_zona ASC
  		";
  		$primera_q = $db->prepare($primera);
  		$primera_q->execute();
  		$primera_data = $primera_q->fetchAll();
  		foreach ($primera_data as $row) {
  			$segunda = "
  				INSERT INTO `cp_zn` (
  					`zona`
  				)
  				VALUES
  					(
  						'".$row->zona."'
  					);
  			";
  			$segunda_q = $db->prepare($segunda);
  			$segunda_q->execute();
  			$lastInsertId = $db->lastInsertId();
  			$tercera = "UPDATE CPdescarga SET d_zona = ".$lastInsertId." WHERE d_zona = '".$row->zona."'";
  			$tercera_q = $db->prepare($tercera);
  			$tercera_q->execute();
  			echo "import ".$row->zona."<br>";
  		}
  	}
}
?>
