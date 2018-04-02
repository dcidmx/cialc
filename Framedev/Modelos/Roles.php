<?php
class RolesModel
{
    function __construct($db,$dbt) {
        try {
            $this->db = $db;
			$this->dbt = $dbt;
        } catch (PDOException $e) {
            exit('No se ha podido establecer la conexión a la base de datos.');
        }
    }
	function selectRolesByTipo($cat_tiporol,$id_rol,$select = NULL){
		$accesos = self::selectRolesByAccess($id_rol);
		$qry = "SELECT * FROM fw_roles where (cat_tiporol IN ($cat_tiporol)) AND (id_rol IN ($accesos))";
		$query = $this->db->prepare($qry);
		$query->execute();
		$array = array();
		if($query->rowCount()>=1){
			$data = $query->fetchAll();
			$cont = 0;
			foreach ($data as $row) {
				$array[$cont]['value']=$row->id_rol;
				$array[$cont]['valor']=$row->descripcion;
				$cont++;			
			}
		}
		return Controller::setOption($array,$select);		
	}
	function selectRolesByAccess($id_rol){
		$array = array();
		$qry = "
			SELECT
				rolacc.access,
				rol.descripcion
			FROM
				fw_roles_alta AS rolacc
			INNER JOIN fw_roles AS rol ON rolacc.access = rol.id_rol
			WHERE
				rolacc.id_rol = ".$id_rol."
			ORDER BY
				rolacc.access ASC
		";
		$query = $this->db->prepare($qry);
		$query->execute();
		$return = '';
		if($query->rowCount()>=1){
			$data = $query->fetchAll();
			foreach ($data as $row) {
				$return .= "'".$row->access."',";
			}
		}
		$return = rtrim($return, ",");
		return $return;
	}
	
	function selectUsersByRoles($ids_roles,$id_usuario){
		$array = array();
		$qry = "
			SELECT
				id_usuario,
				CONCAT(nombres,' ',apellido_paterno,' ',apellido_materno) as nombre
			FROM
				fw_usuarios
			INNER JOIN fw_roles ON fw_roles.id_rol = fw_usuarios.id_rol
			WHERE
				fw_usuarios.id_rol IN ($ids_roles)		
		";
		$query = $this->db->prepare($qry);
		$query->execute();
		if($query->rowCount()>=1){
			$data = $query->fetchAll();
			$cont = 0;
			foreach ($data as $row) {
				$array[$cont]['value']=$row->nombre;
				$array[$cont]['valor']=$row->nombre;
				$cont++;			
			}
		}
		return Controller::setOption($array,$id_usuario);		
	}
	function clonar_permisos($id_rol,$transfer){
		$qry = "
			SELECT
				fw_permisos.id_permiso,
				fw_permisos.id_metodo,
				fw_permisos.id_rol
			FROM
				fw_permisos
			INNER JOIN fw_roles ON fw_permisos.id_rol = fw_roles.id_rol
			WHERE
				fw_roles.id_rol = ".$id_rol."
		";
		$query = $this->db->prepare($qry);
		$query->execute();
		$result = $query->fetchAll();
		if($query->rowCount()>=1){
			$dlt_qry = "DELETE from fw_permisos WHERE id_rol = ".$transfer."";
			$del_query = $this->db->prepare($dlt_qry);
			$del_query->execute();			
			foreach ($result as $row) {
				$sql = "
					INSERT INTO fw_permisos (
						id_metodo,
						id_rol,
						user_alta,
						fecha_alta
					) VALUES (
						:id_metodo,
						:id_rol,
						:user_alta,
						:fecha_alta
					)";
				$query = $this->db->prepare($sql);
				$query->execute(
					array(
						':id_metodo' => $row->id_metodo,
						':id_rol' => $transfer,
						':user_alta' => $_SESSION['id_usuario'],
						':fecha_alta' => date("Y-m-d H:i:s")
					)
				);
				
				$qry2 = "
					SELECT
						fw_roles.descripcion
					FROM
						fw_roles
					WHERE
						fw_roles.id_rol = ".$transfer."			
				";
				$query2 = $this->db->prepare($qry2);
				$query2->execute();
				$result2 = $query2->fetchAll();
				if($query2->rowCount()>=1){
					foreach ($result2 as $new) {
						$new_permission = $new->descripcion;
					}
				}
				
				$ubic_qry = "
					SELECT
						fw_metodos.metodo,
						fw_metodos.controlador,
						fw_roles.descripcion
					FROM
						fw_permisos
					INNER JOIN fw_roles ON fw_permisos.id_rol = fw_roles.id_rol
					INNER JOIN fw_metodos ON fw_permisos.id_metodo = fw_metodos.id_metodo
					WHERE
						fw_permisos.id_permiso = ".$row->id_permiso."			
				";
				$query = $this->db->prepare($ubic_qry);
				$query->execute();
				$roles = $query->fetchAll();
				if($query->rowCount()>=1){
					foreach ($roles as $perm) {
						echo 'Se clono el permiso '.$perm->controlador.'|'.$perm->metodo.' del '.$perm->descripcion.' al '.$new_permission.'<br>';
					}
				}
			}
		}	
	}
	function queryRoles(){
		$sql_usr="
			SELECT
				fw_roles.id_rol,
				cm_catalogo.etiqueta,
				fw_roles.descripcion
			FROM
				cm_catalogo
			INNER JOIN fw_roles ON fw_roles.cat_tiporol = cm_catalogo.id_cat		
		";
		$query = $this->db->prepare($sql_usr);
		$query->execute();
		$roles =  $query->fetchAll();
		if($query->rowCount()>=1){
			return $roles;
		}
	}
	function obtenerRoles(){
		$roles = $this->queryRoles();
		foreach ($roles as $row) {
			$array[]=array($row->id_rol,$row->descripcion);
		}
		return $array;
	}
	function selectRoles($id){
		$array = array();
		$ubic_qry = "SELECT * FROM fw_roles;";
		$query = $this->db->prepare($ubic_qry);
		$query->execute();
		if($query->rowCount()>=1){
			$areas = $query->fetchAll();
			$cont = 0;
			foreach ($areas as $row) {
				$array[$cont]['value']=$row->id_rol;
				$array[$cont]['valor']=strtoupper($row->descripcion);
				$cont++;			
			}
		}		
		return Controller::setOption($array,$id);
	}

	public function agregar_rol($arreglo){

		foreach ($arreglo as $key => $value) {
			$this->$key = strip_tags($value);
		}
			
			$sql = "
				INSERT INTO fw_roles (
					descripcion,
					cat_tiporol,
					user_alta,
					fecha_alta
				) VALUES (
					:descripcion,
					:cat_tiporol,
					:user_alta,
					:fecha_alta
				)";
			$query = $this->db->prepare($sql);
			$query_resp = $query->execute(
				array(
					':descripcion' => $this->descripcion,
					':cat_tiporol' => $this->cat_tiporol,
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
	public function get_rol($rol){
		$rol = intval($rol);
		$reg = "SELECT descripcion FROM fw_roles where id_rol = '".$rol."'";
		$query = $this->db->prepare($reg);
		$query->execute();
		$descripcion = $query->fetchAll();
		$array = array();
		if($query->rowCount()>=1){
			foreach ($descripcion as $row) {
					return $row->descripcion;
			}
		}	
	}
	function getMetodos(){
		$sql="SELECT * FROM fw_metodos order by controlador asc";
		$query = $this->db->prepare($sql);
		$query->execute();
		$metodos =  $query->fetchAll();
		if($query->rowCount()>=1){
			return $metodos;
		}
	}
	function getPermisos($rol,$metodo){
		$rol = intval($rol);
		$metodo = intval($metodo);
		$sql="SELECT count(*) as permiso FROM fw_permisos where id_rol = '".$rol."' and id_metodo = ".$metodo."";
		$query = $this->db->prepare($sql);
		$query->execute();
		$permiso =  $query->fetchAll();
		return $permiso[0]->permiso;
	}
	function setear_permiso($role,$metodo,$estado){
		if($estado == 'true'){
			$sql = "
				INSERT INTO fw_permisos (
					id_metodo,
					id_rol,
					user_alta,
					fecha_alta
				) VALUES (
					:id_metodo,
					:id_rol,
					:user_alta,
					:fecha_alta
				)";
			$query = $this->db->prepare($sql);
			$query_resp = $query->execute(
				array(
					':id_metodo' => $metodo,
					':id_rol' => $role,
					':user_alta' => $_SESSION['id_usuario'],
					':fecha_alta' => date("Y-m-d H:i:s")
				)
			);
		}else if ($estado == 'false'){
			$clean = "DELETE FROM fw_permisos WHERE id_metodo = :id_metodo and id_rol = :id_rol";
			$query = $this->db->prepare($clean);
			$query_resp = $query->execute(array(':id_metodo' => $metodo, ':id_rol' => $role));
			return $query_resp;
		}
		if($query_resp){
			$respuesta = array('resp' => true , 'mensaje' => 'Se actualizo el permiso de manera satisfactoria.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Ocurrio un error mienras se ejectutaba la query.' );
		}
		return $respuesta;
	}
	function setear_acceso($id_rol,$access,$estado){
		if($estado == 'true'){
			$sql = "
				INSERT INTO fw_roles_alta (
					id_rol,
					access,
					user_alta,
					fecha_alta
				) VALUES (
					:id_rol,
					:access,
					:user_alta,
					:fecha_alta
				)";
			$query = $this->db->prepare($sql);
			$query_resp = $query->execute(
				array(
					':id_rol' => $id_rol,
					':access' => $access,
					':user_alta' => $_SESSION['id_usuario'],
					':fecha_alta' => date("Y-m-d H:i:s")
				)
			);
		}else if ($estado == 'false'){
			$clean = "DELETE FROM fw_roles_alta WHERE id_rol = :id_rol and access = :access";
			$query = $this->db->prepare($clean);
			$query_resp = $query->execute(array(':id_rol' => $id_rol, ':access' => $access));
			return $query_resp;
		}
		if($query_resp){
			$respuesta = array('resp' => true , 'mensaje' => 'Se actualizo el permiso de manera satisfactoria.' );
		}else{
			$respuesta = array('resp' => false , 'mensaje' => 'Error en el sistema.' , 'error' => 'Ocurrio un error mienras se ejectutaba la query.' );
		}
		return $respuesta;
	}
	function getAccesos($id_rol,$acceso){
		$id_rol = intval($id_rol);
		$acceso = intval($acceso);
		$sql="SELECT count(*) as acceso FROM fw_roles_alta where id_rol = '".$id_rol."' and access = ".$acceso."";
		$query = $this->db->prepare($sql);
		$query->execute();
		$acceso =  $query->fetchAll();
		return $acceso[0]->acceso;
	}
	function getPermiso($role,$metodo){
		$sql="SELECT count(*) FROM fw_permisos where id_metodo = $metodo and ";
		$query = $this->db->prepare($sql);
		$query->execute();
		$metodos =  $query->fetchAll();
		if($query->rowCount()>=1){
			return $metodos;
		}
	}
	function check_roles(){
		$sql="
			SELECT
				rol.id_rol,
				rol.descripcion,
				cat.etiqueta
			FROM
				fw_roles AS rol
			INNER JOIN cm_catalogo AS cat ON rol.cat_tiporol = cat.id_cat		
		";
		$query = $this->db->prepare($sql);
		$query->execute();
		$roles =  $query->fetchAll();
		if($query->rowCount()>=1){
			$cont = 0;
			foreach ($roles as $row) {
				$array[$cont]['value']=$row->id_rol;
				$array[$cont]['valor']=strtoupper($row->descripcion);
				$array[$cont]['etiqueta']=strtoupper($row->etiqueta);
				$cont++;			
			}
			return $array;
		}
	}
	function select_roles(){
		$array = self::check_roles();
		return $this->setOption_U($array);
	}
	
	function setOption_U($arreglo){
	$opciones = "<option value='' disabled selected>Seleccione</option>";
		for($i=0;$i<count($arreglo);$i++){
			$opciones .= "<option value='".$arreglo[$i]['value']."'>".ucwords($arreglo[$i]['valor'])."</option>";
		}
	return $opciones;
	}	
}
