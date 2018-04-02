<?php
require_once( '../vendor/manuelaguado/mysqldatatables/MysqlDatatable.php' ); 
class CatalogoModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	public function agregar_elemento($arreglo){

		foreach ($arreglo as $key => $value) {
			$this->$key = strip_tags($value);
		}
		if($this->id_padre != ''){$id_padre = "'".$this->id_padre."',"; $idprt = 'id_padre,';}else{$id_padre = ''; $idprt = '';}
		$date = date("Y-m-d H:i:s");
		$sql = "
			INSERT INTO cm_catalogo (
				$idprt 
				catalogo, 
				etiqueta, 
				activo,
				orden,
				valor,
				user_alta,
				fecha_alta
			) VALUES (
				".$id_padre."
				'".$this->catalogo."', 
				'".$this->etiqueta."', 
				'".$this->activo."',
				'".$this->orden."',
				'".$this->valor."',
				".$_SESSION['id_usuario'].",
				'".$date."'
			)";
		$query = $this->db->prepare($sql);
		$query_resp = $query->execute();
		if($query_resp){
			$respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
		}
		return $respuesta;
	}	
	public function eliminar_elemento($id_cat){
        $sql = "DELETE FROM cm_catalogo WHERE id_cat = :id_cat";
        $query = $this->db->prepare($sql);
        $query_resp = $query->execute(array(':id_cat' => $id_cat));
		if($query_resp){
			$respuesta = array('resp' => true , 'mensaje' => 'Registro eliminado correctamente.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al eliminar registro.' );
		}
		return $respuesta;
	}	
	public function data_catalogo($id){
		$sql="SELECT * FROM cm_catalogo WHERE id_cat = ".$id."";
		$query = $this->db->prepare($sql);
		$query->execute();
		$metodo = $query->fetchAll();
		
		if($query->rowCount()>=1){
			foreach ($metodo as $row) {
				$array=array(
					$row->id_cat,
					$row->id_padre,
					$row->catalogo,
					$row->etiqueta,
					$row->activo,
					$row->orden,
					$row->valor
				);
			}
		}
		return $array;
		
	}
	public function editar_catalogo($arreglo){
		foreach ($arreglo as $key => $value) {
			$this->$key = strip_tags($value);
		}
		if($this->id_padre != ''){$id_padre = "id_padre=	'".$this->id_padre."',";}else{$id_padre = "id_padre=	NULL,";}
		$sql = "UPDATE cm_catalogo SET 
			$id_padre
			catalogo=	'".$this->catalogo."',
			etiqueta=	'".$this->etiqueta."',
			activo 	=	'".$this->activo."',
			orden 	=	'".$this->orden."',
			valor 	=	'".$this->valor."',
			user_mod=   '".$_SESSION['id_usuario']."'
			where
			id_cat 	= '".$this->id_cat."'
		";
		$query = $this->db->prepare($sql);
		$query_resp = $query->execute();	

		if($query_resp){
			$respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
		}
		return $respuesta;		
	}	
	function listaCatalogo($array){
		ini_set('memory_limit', '256M');				
		$table = 'cm_catalogo';
		$primaryKey = 'id_cat';
		$columns = array(
			array( 
				'db' => 'id_cat',
				'dbj' => 'id_cat',
				'real' => 'id_cat',
				'typ' => 'int',
				'dt' => 0
			),
			array( 
				'db' => 'id_padre',
				'dbj' => 'id_padre',	
				'real' => 'id_padre',
				'typ' => 'int',
				'dt' => 1
			),
			array( 
				'db' => 'catalogo AS catalogo',
				'dbj' => 'catalogo',				
				'real' => 'catalogo',
				'alias' => 'catalogo',
				'typ' => 'txt',
				'dt' => 2
			),
			array( 
				'db' => 'etiqueta AS etiqueta',
				'dbj' => 'etiqueta',
				'real' => 'etiqueta',
				'alias' => 'etiqueta',
				'typ' => 'txt',
				'dt' => 3				
			),
			array( 
				'db' => 'activo',
				'dbj' => 'activo',
				'real' => 'activo',
				'typ' => 'int',
				'dt' => 4				
			),
			array( 
				'db' => 'orden',
				'dbj' => 'orden',
				'real' => 'orden',
				'typ' => 'int',
				'dt' => 5				
			),
			array( 
				'db' => 'valor',
				'dbj' => 'valor',
				'real' => 'valor',
				'typ' => 'int',
				'dt' => 6				
			)
		);
		$render_table = new SSP;
		$inner = '';
		$where = '';
		return json_encode(
			$render_table->complex( $array, $this->dbt, $table, $primaryKey, $columns, null, $where, $inner )
		);
	}
}
