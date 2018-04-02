<?php
class UbicacionModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	function queryUbicaciones(){
		$sql_usr="SELECT * FROM fw_ubicacion";
		$query = $this->db->prepare($sql_usr);
		$query->execute();
		$ubicaciones =  $query->fetchAll();
		if($query->rowCount()>=1){
			return $ubicaciones;
		}else{
			return false;
		}
	}
	function obtener_ubicaciones(){
		$ubicaciones = $this->queryUbicaciones();
		foreach ($ubicaciones as $row) {
			$array[]=array($row->id_ubicacion,$row->descripcion_ubicacion);
		}
		return $array;
	}
	function select_ubicaciones($id_ubicacion){
		$ubicaciones = $this->queryUbicaciones();
		$cont = 0;
		$array = array();
		if($ubicaciones){
			foreach ($ubicaciones as $row) {
				$array[$cont]['value']=$row->id_ubicacion;
				$array[$cont]['valor']=strtoupper($row->descripcion_ubicacion);
				$cont++;			
			}
		}
		return Controller::setOption($array,$id_ubicacion);
	}
}
?>
