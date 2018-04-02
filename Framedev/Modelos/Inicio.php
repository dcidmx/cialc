<?php
class InicioModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	public function get()
	{
		$sql = "SELECT id, campo1, campo2, campo3 FROM table";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
    public function add($campo1, $campo2, $campo3)
    {
        $campo1 = strip_tags($campo1);
        $campo2 = strip_tags($campo2);
        $campo3 = strip_tags($campo3);

        $sql = "INSERT INTO song (campo1, campo2, campo3) VALUES (:campo1, :campo2, :campo3)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':campo1' => $campo1, ':campo2' => $campo2, ':campo3' => $campo3));
    }
    public function delete($id)
    {
        $sql = "DELETE FROM tabla WHERE id = :id";
        $query = $this->db->prepare($sql);
        $data = array(':id' => $id);
		$query->execute($data);
    }
	public function getOne($id)
	{
		$sql = "SELECT id, campo1, campo2, campo3 FROM table WHERE id = :id LIMIT 1";
		$query = $this->db->prepare($sql);
		$data = array(':id' => $id);
		$query->execute($data);
		return $query->fetch();
	}
	public function update($campo1, $campo2, $campo3, $id)
	{
		$sql = "UPDATE song SET campo1 = :campo1, campo2 = :campo2, campo3 = :campo3 WHERE id = :id";
		$query = $this->db->prepare($sql);
		$data = array(':campo1' => $campo1, ':campo2' => $campo2, ':campo3' => $campo3, ':id' => $id);
		$query->execute($data);
	}
}
