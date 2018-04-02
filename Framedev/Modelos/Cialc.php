<?php
require_once( '../vendor/manuelaguado/mysqldatatables/MysqlDatatable.php' );
class CialcModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
    function set_avatar($image,$id,$dimension){
           $sql = "
                  UPDATE cialc_proyectos
                  SET
                    image = '".$image."',
                    width = '".$dimension[0]."',
                    height = '".$dimension[1]."',
                    bits = '".$dimension['bits']."',
                    mime = '".$dimension['mime']."'
                  WHERE
                  id_proyecto = '".$id."'
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
    }
    public function proyectos(){
             $elm="SELECT * FROM cialc_proyectos as pyct WHERE pyct.cat_status = 3 order by orden asc";
             $query = $this->db->prepare($elm);
             $query->execute();
             return $query->fetchAll();
    }
    public function seminarios(){
             $elm="SELECT * FROM cialc_seminarios as pyct WHERE pyct.cat_status = 3";
             $query = $this->db->prepare($elm);
             $query->execute();
             return $query->fetchAll();
    }
    public function getSeminario($id){
             $elm="SELECT * FROM cialc_seminarios as sem WHERE sem.id_seminario = $id";
             $query = $this->db->prepare($elm);
             $query->execute();
             return $query->fetchAll();
    }
    public function editar_seminario_do($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }
           $sql = "UPDATE cialc_seminarios SET
                            investigador = '".$this->investigador."',
                            seminario = '".$this->seminario."',
                            cat_status = '".$this->cat_status."'
                  where
                         id_seminario 	= 	'".$this->id_seminario."'
          ";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.');
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }
           return json_encode($respuesta);
    }
    public function getProyect($id){
             $elm="SELECT * FROM cialc_proyectos as pyct WHERE pyct.id_proyecto = $id";
             $query = $this->db->prepare($elm);
             $query->execute();
             return $query->fetchAll();
    }
    public function editar_proyecto_do($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }
           $sql = "UPDATE cialc_proyectos SET
                            investigador = '".$this->investigador."',
                            proyecto = '".$this->proyecto."',
                            descripcion = '".$this->descripcion."',
                            lineas = '".$this->lineas."',
                            area = '".$this->area."',
                            cat_status = '".$this->cat_status."',
                            orden = '".$this->orden."'
                  where
                         id_proyecto 	= 	'".$this->id_proyecto."'
          ";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.');
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }

           print json_encode($respuesta);
    }
    public function agregar_seminario_do($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }

                  $sql = "
                         INSERT INTO cialc_seminarios (
                                investigador,
                                seminario,
                                cat_status
                         ) VALUES (
                               :investigador,
                               :seminario,
                               :cat_status
                         )";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute(
                         array(
                                ':investigador' => $this->investigador,
                                ':seminario' => $this->seminario,
                                ':cat_status' => $this->cat_status
                         )
                  );
                  $id_seminario = $this->db->lastInsertId();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.', 'id_seminario' =>  $id_seminario);
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }

           return json_encode($respuesta);
    }
    public function agregar_proyecto_do($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }

                  $sql = "
                         INSERT INTO cialc_proyectos (
                                investigador,
                                proyecto,
                                descripcion,
                                lineas,
                                area,
                                cat_status,
                                orden
                         ) VALUES (
                               :investigador,
                               :proyecto,
                               :descripcion,
                               :lineas,
                               :area,
                               :cat_status,
                               :orden
                         )";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute(
                         array(
                                ':investigador' => $this->investigador,
                                ':proyecto' => $this->proyecto,
                                ':descripcion' => $this->descripcion,
                                ':lineas' => $this->lineas,
                                ':area' => $this->area,
                                ':cat_status' => $this->cat_status,
                                ':orden' => $this->orden
                         )
                  );
                  $id_proyecto = $this->db->lastInsertId();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.', 'id_proyecto' =>  $id_proyecto);
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }

           return json_encode($respuesta);
    }
  	public function obtener_proyectos($array){
  		ini_set('memory_limit', '256M');
  		$table = 'cialc_proyectos as projects';
  		$primaryKey = 'projects.id_proyecto';
  		$columns = array(
  			array(
  				'db' => 'projects.id_proyecto as id',
  				'dbj' => 'projects.id_proyecto',
  				'real' => 'projects.id_proyecto',
  				'alias' => 'id',
  				'typ' => 'int',
  				'dt' => 0
  			),
  			array(
  				'db' => 'projects.investigador AS investigador',
  				'dbj' => 'projects.investigador',
  				'real' => 'projects.investigador',
  				'alias' => 'investigador',
  				'typ' => 'txt',
  				'dt' => 1
  			),
  			array(
  				'db' => 'projects.proyecto AS proyecto',
  				'dbj' => 'projects.proyecto',
  				'real' => 'projects.proyecto',
  				'alias' => 'proyecto',
  				'typ' => 'txt',
  				'dt' => 2
  			),
  			array(
  				'db' => 'projects.cat_status AS cat_status',
  				'dbj' => 'projects.cat_status',
  				'real' => 'projects.cat_status',
  				'alias' => 'cat_status',
  				'typ' => 'txt',
  				'dt' => 3
  			),
  			array(
  				'db' => 'projects.orden AS orden',
  				'dbj' => 'projects.orden',
  				'real' => 'projects.orden',
  				'alias' => 'orden',
  				'typ' => 'txt',
  				'dt' => 4
  			)
  		);
  		$render_table = new SSP;
      $inner = "";
  		$where = "";
  		return json_encode(
  			$render_table->complex( $array, $this->dbt, $table, $primaryKey, $columns, null, $where, $inner )
  		);
  	}

    public function obtener_seminarios($array){
  		ini_set('memory_limit', '256M');
  		$table = 'cialc_seminarios as seminarios';
  		$primaryKey = 'projects.id_seminario';
  		$columns = array(
  			array(
  				'db' => 'seminarios.id_seminario as id',
  				'dbj' => 'seminarios.id_seminario',
  				'real' => 'seminarios.id_seminario',
  				'alias' => 'id',
  				'typ' => 'int',
  				'dt' => 0
  			),
  			array(
  				'db' => 'seminarios.investigador AS investigador',
  				'dbj' => 'seminarios.investigador',
  				'real' => 'seminarios.investigador',
  				'alias' => 'investigador',
  				'typ' => 'txt',
  				'dt' => 1
  			),
  			array(
  				'db' => 'seminarios.seminario AS seminario',
  				'dbj' => 'seminarios.seminario',
  				'real' => 'seminarios.seminario',
  				'alias' => 'seminario',
  				'typ' => 'txt',
  				'dt' => 2
  			),
  			array(
  				'db' => 'seminarios.cat_status AS cat_status',
  				'dbj' => 'seminarios.cat_status',
  				'real' => 'seminarios.cat_status',
  				'alias' => 'cat_status',
  				'typ' => 'txt',
  				'dt' => 3
  			)
  		);
  		$render_table = new SSP;
      $inner = "";
  		$where = "";
  		return json_encode(
  			$render_table->complex( $array, $this->dbt, $table, $primaryKey, $columns, null, $where, $inner )
  		);
  	}

}
