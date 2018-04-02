<?php
require_once( '../vendor/manuelaguado/mysqldatatables/MysqlDatatable.php' );
class BanneractividadesModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
    function get_banners(){
      $elm="SELECT * FROM cialc_banner_act as ban WHERE ban.status = 3  ORDER BY orden ASC";
      $query = $this->db->prepare($elm);
      $query->execute();
      return $query->fetchAll();
    }
    function set_avatar2($image,$id,$dimension){
           $sql = "
                  UPDATE cialc_banner_act
                  SET
                    poster_full = '".$image."',
                    poster_width = '".$dimension[0]."',
                    poster_height = '".$dimension[1]."'
                  WHERE
                  id = '".$id."'
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
    }
    function set_avatar($image,$id,$dimension){
           $sql = "
                  UPDATE cialc_banner_act
                  SET
                    url_full = '".$image."',
                    width = '".$dimension[0]."',
                    height = '".$dimension[1]."',
                    bits = '".$dimension['bits']."',
                    mime = '".$dimension['mime']."'
                  WHERE
                  id = '".$id."'
           ";
           $query = $this->db->prepare($sql);
           $query->execute();
    }
    public function data_element($id){
             $elm="SELECT * FROM cialc_banner_act as ban WHERE ban.id = $id";
             $query = $this->db->prepare($elm);
             $query->execute();
             return $query->fetchAll();
    }

    public function editbanner_do($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }
           $sql = "UPDATE cialc_banner_act SET
                            name = '".$this->name."',
                            descripcion = '".$this->descripcion."',
                            alternativo = '".$this->alternativo."',
                            orden = '".$this->orden."',
                            status = '".$this->status."',
                            updated_at = '".date("Y-m-d H:i:s")."'
                      where
                            id 	= 	'".$this->id."'
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

    public function agregar_banner_do($arreglo){

           foreach ($arreglo as $key => $value) {
                  $this->$key = strip_tags($value);
           }

                  $sql = "
                         INSERT INTO cialc_banner_act (
                                name,
                                descripcion,
                                alternativo,
                                orden,
                                status,
                                created_at
                         ) VALUES (
                                :name,
                                :descripcion,
                                :alternativo,
                                :orden,
                                :status,
                                :created_at
                         )";
                  $query = $this->db->prepare($sql);
                  $query_resp = $query->execute(
                         array(
                               ':name' => $this->name,
                               ':descripcion' => $this->descripcion,
                               ':alternativo' => $this->alternativo,
                               ':orden' => $this->orden,
                               ':status' => $this->status,
                               ':created_at' => date("Y-m-d H:i:s")
                         )
                  );
                  $id = $this->db->lastInsertId();
                  if($query_resp){
                         $respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.', 'id_directorio' =>  $id);
                  }else{
                         $respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
                  }

           return json_encode($respuesta);
    }

    public function obtener_banners($array){
  		ini_set('memory_limit', '256M');
  		$table = 'cialc_banner_act as banner';
  		$primaryKey = 'banner.id';
  		$columns = array(
  			array(
  				'db' => 'banner.id as id',
  				'dbj' => 'banner.id',
  				'real' => 'banner.id',
  				'alias' => 'id',
  				'typ' => 'int',
  				'dt' => 0
  			),
  			array(
  				'db' => 'banner.name AS name',
  				'dbj' => 'banner.name',
  				'real' => 'banner.name',
  				'alias' => 'name',
  				'typ' => 'txt',
  				'dt' => 1
  			),
  			array(
  				'db' => 'banner.descripcion AS descripcion',
  				'dbj' => 'banner.descripcion',
  				'real' => 'banner.descripcion',
  				'alias' => 'descripcion',
  				'typ' => 'txt',
  				'dt' => 2
  			),
  			array(
  				'db' => 'banner.alternativo AS alternativo',
  				'dbj' => 'banner.alternativo',
  				'real' => 'banner.alternativo',
  				'alias' => 'alternativo',
  				'typ' => 'txt',
  				'dt' => 3
  			),
  			array(
  				'db' => 'banner.url_full AS url_full',
  				'dbj' => 'banner.url_full',
  				'real' => 'banner.url_full',
  				'alias' => 'url_full',
  				'typ' => 'txt',
  				'dt' => 4
  			),
        array(
          'db' => 'banner.width AS width',
          'dbj' => 'banner.width',
          'real' => 'banner.width',
          'alias' => 'width',
          'typ' => 'txt',
          'dt' => 5
        ),
        array(
          'db' => 'banner.height AS height',
          'dbj' => 'banner.height',
          'real' => 'banner.height',
          'alias' => 'height',
          'typ' => 'txt',
          'dt' => 6
        ),
        array(
          'db' => 'banner.status AS status',
          'dbj' => 'banner.status',
          'real' => 'banner.status',
          'alias' => 'status',
          'typ' => 'txt',
          'dt' => 7
        ),
        array(
          'db' => 'banner.created_at AS created_at',
          'dbj' => 'banner.created_at',
          'real' => 'banner.created_at',
          'alias' => 'created_at',
          'typ' => 'int',
          'dt' => 8
        ),
        array(
          'db' => 'banner.updated_at AS updated_at',
          'dbj' => 'banner.updated_at',
          'real' => 'banner.updated_at',
          'alias' => 'updated_at',
          'typ' => 'int',
          'dt' => 9
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
