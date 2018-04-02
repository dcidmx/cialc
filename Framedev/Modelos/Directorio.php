<?php
require_once( '../vendor/manuelaguado/mysqldatatables/MysqlDatatable.php' );
class DirectorioModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
    public function data_element($id_directorio){
             $elm="SELECT * FROM cialc_directorio as dir WHERE dir.id_directorio = $id_directorio";
             $query = $this->db->prepare($elm);
             $query->execute();
             return $query->fetchAll();
    }
    public function elements($primario){
           $primario = base64_decode($primario);
           $sql="
           SELECT
           	*
           FROM
           	cialc_directorio AS cd
           WHERE
           	cd.nivel_primario = '".$primario."'
           AND cd.cat_status = 3
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
           $dir = $query->fetchAll();
           $array = array();
           $num = 0;
           return $dir;
    }
    public function subnivel($primario){
           $primario = base64_decode($primario);
           $sql="
           SELECT
           	cd.nivel_filtro
           FROM
           	cialc_directorio AS cd
           WHERE
           	cd.nivel_primario = '".$primario."'
              AND
              cat_status = 3
           GROUP BY
           	cd.nivel_filtro
           ORDER BY
              cd.id_directorio
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
           $menu = $query->fetchAll();
           $array = array();
           $num = 0;
           if($query->rowCount()>=1){
             foreach ($menu as $row) {
                 $array[$num]['nivel_filtro'] = $row->nivel_filtro;
                 $num++;
             }
           }
           return $array;
    }
    public function menu(){
           $sql="
           SELECT
           	nivel_primario
           FROM
           	cialc_directorio
           WHERE
              cat_status = 3
           GROUP BY
           	nivel_primario
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
           $menu = $query->fetchAll();
           $array = array();
           $num = 0;
           if($query->rowCount()>=1){
             foreach ($menu as $row) {
                 $array[$num]['nivel_primario'] = $row->nivel_primario;
                 $num++;
             }
           }
           return $array;
    }
    function set_avatar($avatar,$id_directorio){
           $sql = "
                  UPDATE cialc_directorio
                  SET image = '".$avatar."'
                  WHERE
                         id_directorio = '".$id_directorio."'
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
    }
    public function editar_elemento($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }
           $sql = "UPDATE cialc_directorio SET
                            nivel_primario = '".$this->nivel_primario."',
                            nivel_filtro = '".$this->nivel_filtro."',
                            nombre = '".$this->nombre."',
                            cargo = '".$this->cargo."',
                            informacion = '".$this->informacion."',
                            correo1 = '".$this->correo1."',
                            correo2 = '".$this->correo2."',
                            correo3 = '".$this->correo3."',
                            correo4 = '".$this->correo4."',
                            tel1 = '".$this->tel1."',
                            tel2 = '".$this->tel2."',
                            tel3 = '".$this->tel3."',
                            ext1 = '".$this->ext1."',
                            ext2 = '".$this->ext2."',
                            ext3 = '".$this->ext3."',
                            cat_status = '".$this->cat_status."'
                  where
                         id_directorio 	= 	'".$this->id_directorio."'
          ";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.');
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }

           return $respuesta;
    }
    public function agregar_elemento($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }

                  $sql = "
                         INSERT INTO cialc_directorio (
                                nivel_primario,
                                nivel_filtro,
                                nombre,
                                cargo,
                                informacion,
                                correo1,
                                correo2,
                                correo3,
                                correo4,
                                tel1,
                                tel2,
                                tel3,
                                ext1,
                                ext2,
                                ext3
                         ) VALUES (
                                :nivel_primario,
                                :nivel_filtro,
                                :nombre,
                                :cargo,
                                :informacion,
                                :correo1,
                                :correo2,
                                :correo3,
                                :correo4,
                                :tel1,
                                :tel2,
                                :tel3,
                                :ext1,
                                :ext2,
                                :ext3
                         )";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute(
                         array(
                                ':nivel_primario' => $this->nivel_primario,
                                ':nivel_filtro' => $this->nivel_filtro,
                                ':nombre' => $this->nombre,
                                ':cargo' => $this->cargo,
                                ':informacion' => $this->informacion,
                                ':correo1' => $this->correo1,
                                ':correo2' => $this->correo2,
                                ':correo3' => $this->correo3,
                                ':correo4' => $this->correo4,
                                ':tel1' => $this->tel1,
                                ':tel2' => $this->tel2,
                                ':tel3' => $this->tel3,
                                ':ext1' => $this->ext1,
                                ':ext2' => $this->ext2,
                                ':ext3' => $this->ext3
                         )
                  );
                  $id_directorio = $this->db->lastInsertId();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.', 'id_directorio' =>  $id_directorio);
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }

           return $respuesta;
    }
	public function obtener_directorio($array){
		ini_set('memory_limit', '256M');
		$table = 'cialc_directorio as dir';
		$primaryKey = 'dir.id_directorio';
		$columns = array(
			array(
				'db' => 'dir.id_directorio as id',
				'dbj' => 'dir.id_directorio',
				'real' => 'dir.id_directorio',
				'alias' => 'id',
				'typ' => 'int',
				'dt' => 0
			),
			array(
				'db' => 'dir.nivel_primario AS nivel_primario',
				'dbj' => 'dir.nivel_primario',
				'real' => 'dir.nivel_primario',
				'alias' => 'nivel_primario',
				'typ' => 'txt',
				'dt' => 1
			),
			array(
				'db' => 'dir.nivel_filtro AS nivel_filtro',
				'dbj' => 'dir.nivel_filtro',
				'real' => 'dir.nivel_filtro',
				'alias' => 'nivel_filtro',
				'typ' => 'txt',
				'dt' => 2
			),
			array(
				'db' => 'dir.nombre AS nombre',
				'dbj' => 'dir.nombre',
				'real' => 'dir.nombre',
				'alias' => 'nombre',
				'typ' => 'txt',
				'dt' => 3
			),
			array(
				'db' => 'dir.cargo AS cargo',
				'dbj' => 'dir.cargo',
				'real' => 'dir.cargo',
				'alias' => 'cargo',
				'typ' => 'txt',
				'dt' => 4
			),
			array(
				'db' => 'dir.informacion AS informacion',
				'dbj' => 'dir.informacion',
				'real' => 'dir.informacion',
				'alias' => 'informacion',
				'typ' => 'txt',
				'dt' => 5
			),
			array(
				'db' => 'dir.correo1 AS correo1',
				'dbj' => 'dir.correo1',
				'real' => 'dir.correo1',
				'alias' => 'correo1',
				'typ' => 'txt',
				'dt' => 6
			),
			array(
				'db' => 'dir.tel1 AS tel1',
				'dbj' => 'dir.tel1',
				'real' => 'dir.tel1',
				'alias' => 'tel1',
				'typ' => 'txt',
				'dt' => 7
			)
		);
		$render_table = new SSP;
              $inner = "";
		$where = "
			dir.cat_status = 3
		";
		return json_encode(
			$render_table->complex( $array, $this->dbt, $table, $primaryKey, $columns, null, $where, $inner )
		);
	}

}
