<?php
class WebhookModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	function member_added($user_id){
		$ahora = date("Y-m-d H:i:s");
		$sql="
			INSERT INTO cr_presence 
			(
				id_operador,
				fecha
			)VALUES(
				'".$user_id."',
				'".$ahora."'
			);
		";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
	function member_removed($user_id){
		$sql = "
			DELETE
			FROM
				cr_presence
			WHERE
				id_operador = ".$user_id."
		";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
}
?>