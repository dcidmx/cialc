<?php
class ControllersModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	function obtenerControllers($array){
		ini_set('memory_limit', '256M');				
		$table = 'fw_metodos';
		$primaryKey = 'id_metodo';
		$columns = array(
			array( 
				'db' => 'id_metodo',
				'dbj' => 'id_metodo',
				'real' => 'id_metodo',
				'typ' => 'int',
				'dt' => 0
			),
			array( 
				'db' => 'controlador AS controlador',
				'dbj' => 'controlador',	
				'alias' => 'controlador',
				'real' => 'controlador',
				'typ' => 'txt',
				'dt' => 1
			),
			array( 
				'db' => 'metodo AS metodo',
				'dbj' => 'metodo',				
				'real' => 'metodo',
				'alias' => 'metodo',
				'typ' => 'txt',
				'dt' => 2
			),
			array( 
				'db' => 'nombre AS nombre',
				'dbj' => 'nombre',
				'real' => 'nombre',
				'alias' => 'nombre',
				'typ' => 'txt',
				'dt' => 3				
			),
			array( 
				'db' => 'descripcion AS descripcion',
				'dbj' => 'descripcion',
				'real' => 'descripcion',
				'alias' => 'descripcion',
				'typ' => 'txt',
				'dt' => 4				
			)
		);
		require_once( '../vendor/manuelaguado/mysqldatatables/MysqlDatatable.php' );
		$render_table = new SSP;
		$inner = '';
		$where = '';
		return json_encode(
			$render_table->complex( $array, $this->dbt, $table, $primaryKey, $columns, null, $where, $inner )
		);
	}
	public function data_controller($id){
		$sql="SELECT * FROM fw_metodos WHERE id_metodo = ".$id."";
		$query = $this->db->prepare($sql);
		$query->execute();
		$metodo = $query->fetchAll();
		
		if($query->rowCount()>=1){
			foreach ($metodo as $row) {
				$array[]=array(
					$row->id_metodo,
					$row->controlador,
					$row->metodo,
					$row->nombre,
					$row->descripcion
				);
			}
		}
		return $array;
	}
	public function editar_metodo($arreglo){
		foreach ($arreglo as $key => $value) {
			$this->$key = strip_tags($value);
		}
		
		$sql = "UPDATE fw_metodos SET 
			controlador 	=	'".$this->controlador."',
			metodo 			=	'".$this->metodo."',
			nombre 			=	'".$this->nombre."',
			descripcion 	=	'".$this->descripcion."',
			user_mod		=   '".$_SESSION['id_usuario']."'
			where
			id_metodo = '".$this->id_metodo."'
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
	public function agregar_metodo($arreglo){

		foreach ($arreglo as $key => $value) {
			$this->$key = strip_tags($value);
		}
			
		$sql = "
			INSERT INTO fw_metodos (
				controlador, 
				metodo, 
				nombre, 
				descripcion,
				user_alta,
				fecha_alta
			) VALUES (
				:controlador, 
				:metodo, 
				:nombre, 
				:descripcion,
				:user_alta,
				:fecha_alta
			)";
		$query = $this->db->prepare($sql);
		$query_resp = $query->execute(
			array(
				':controlador' => $this->controlador, 
				':metodo' => $this->metodo, 
				':nombre' => $this->nombre, 
				':descripcion' => $this->descripcion,
				':user_alta' => $_SESSION['id_usuario'],
				':fecha_alta' => date("Y-m-d H:i:s")
			)
		);
		if($query_resp){
			$respuesta = array('resp' => true , 'mensaje' => 'Registro guardado correctamente.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al insertar registro.' );
		}
		return $respuesta;
	}
	public function eliminar_metodo($id_metodo){
        
		$sql0 = "DELETE FROM fw_permisos WHERE id_metodo = :id_metodo";
        $query0 = $this->db->prepare($sql0);
        $query0->execute(array(':id_metodo' => $id_metodo));
		
		$sql1 = "DELETE FROM fw_metodos WHERE id_metodo = :id_metodo";
        $query1 = $this->db->prepare($sql1);
        $query_resp1 = $query1->execute(array(':id_metodo' => $id_metodo));
		
		if($query_resp1){
			$respuesta = array('resp' => true , 'mensaje' => 'Registro eliminado correctamente.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Error al eliminar registro.' );
		}
		return $respuesta;
	}
}
