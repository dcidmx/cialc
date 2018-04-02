<?php
class SSP {
	static function data_output ( $columns, $data, $db )
	{
		$out = array();
		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			$row = array();

			for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
				$column = $columns[$j];
				$name_column = ( isset($column['alias']) )? $column['alias'] : $column['db'] ;
				if ( isset( $column['formatter'] ) ) {
					$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $name_column ], $data[$i] );
				}else{
					$row[ $column['dt'] ] = $data[$i][$name_column];
				}
			}
			$out[] = $row;
		}
		return $out;
	}
	static function limit ( $request, $columns )
	{
		$limit = '';

		if ( isset($request['start']) && $request['length'] != -1 ) {
			$limit = "LIMIT ".intval($request['start']).", ".intval($request['length']);
		}

		return $limit;
	}
	static function order ( $request, $columns )
	{
		$order = '';
		if ( isset($request['order']) && count($request['order']) ) {
			$orderBy = array();
			$dtColumns = self::pluck( $columns, 'dt' );
			for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
				$columnIdx = intval($request['order'][$i]['column']);
				$requestColumn = $request['columns'][$columnIdx];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				if ( $requestColumn['orderable'] == 'true' ) {
					$dir = $request['order'][$i]['dir'] === 'asc' ?
						'ASC' :
						'DESC';
					if(isset($column['alias']) ){
						$orderBy[] = ''.$column['alias'].' '.$dir;
					}else{
						$orderBy[] = ''.$column['db'].' '.$dir;
					}

				}
			}
			$order = 'ORDER BY '.implode(', ', $orderBy);
		}
		return $order;
	}
	static function filter ( $request, $columns, &$bindings )
	{
		$globalSearch = array();
		$columnSearch = array();
		$dtColumns = self::pluck( $columns, 'dt' );
		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];
			for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];
				$alias = isset($column['alias']) ? $column['alias'] : '';
				if ( $requestColumn['searchable'] == 'true' ) {
					$binding = self::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					if($alias){
						$globalSearch[] = "".$column['real']." LIKE ".$binding;
					}else{
						$globalSearch[] = "".$column['db']." LIKE ".$binding;
					}
				}
			}
		}
		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
			$requestColumn = $request['columns'][$i];
			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
			$column = $columns[ $columnIdx ];

			$str = $requestColumn['search']['value'];

			if ( $requestColumn['searchable'] == 'true' &&
			 $str != '' ) {
				$binding = self::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
				if($column['alias']){
					$columnSearch[] = "`".$column['alias']."` LIKE ".$binding;
				}else{
					$columnSearch[] = "`".$column['db']."` LIKE ".$binding;
				}


			}
		}
		$where = '';
		if ( count( $globalSearch ) ) {
			$where = '('.implode(' OR ', $globalSearch).')';
		}
		if ( count( $columnSearch ) ) {
			$where = $where === '' ?
				implode(' AND ', $columnSearch) :
				$where .' AND '. implode(' AND ', $columnSearch);
		}
		if ( $where !== '' ) {
			$where = 'WHERE '.$where;
		}
		return $where;
	}
	static function simple ( $request, $db, $table, $primaryKey, $columns, $inner )
	{
		$bindings = array();
		$limit = self::limit( $request, $columns );
		$order = self::order( $request, $columns );
		$where = self::filter( $request, $columns, $bindings );
		$data = self::sql_exec( $db, $bindings,
			"SELECT SQL_CALC_FOUND_ROWS  ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $inner
			 $where
			 $order
			 $limit"
		);
		$resFilterLength = self::sql_exec( $db,
			" SELECT FOUND_ROWS()"
		);
		$recordsFiltered = $resFilterLength[0][0];
		$resTotalLength = self::sql_exec( $db,
			" SELECT COUNT('{$primaryKey}')
			 FROM   $table
			 $inner"
		);
		$recordsTotal = $resTotalLength[0][0];
		//var_dump($data);exit();
		return array(
			"draw"            => intval( $request['draw'] ),
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => self::data_output( $columns, $data )
		);
	}
	public function complex ( $request, $db, $table, $primaryKey, $columns, $whereResult=null, $whereAll=null , $inner, $having=null, $orden=null)
	{
		$bindings = array();
		$localWhereResult = array();
		$localWhereAll = array();
		$whereAllSql = '';
		$limit = self::limit( $request, $columns );
		if(!$orden){
			$order = self::order( $request, $columns );
		}else{
			$order = $orden;
		}
		$where = self::filter( $request, $columns, $bindings );
		$whereResult = self::_flatten( $whereResult );
		$whereAll = self::_flatten( $whereAll );
		if ( $whereResult ) {
			$where = $where ?
				$where .' AND '.$whereResult :
				'WHERE '.$whereResult;
		}
		if ( $whereAll ) {
			$where = $where ?
				$where .' AND '.$whereAll :
				'WHERE '.$whereAll;
			$whereAllSql = 'WHERE '.$whereAll;
		}
		$data = self::sql_exec( $db, $bindings,
			"SELECT SQL_CALC_FOUND_ROWS ".implode(", ", self::pluck($columns, 'db'))."
			 FROM $table
			 $inner
			 $where
			 $having
			 $order
			 $limit"
		);
		$resFilterLength = self::sql_exec( $db,
			"SELECT FOUND_ROWS()"
		);
		$recordsFiltered = $resFilterLength[0][0];
		$resTotalLength = self::sql_exec( $db, $bindings,
			"SELECT COUNT('{$primaryKey}')
			 FROM   $table
			 $inner".
			$whereAllSql
		);
		$recordsTotal = @$resTotalLength[0][0];
		//var_dump($data);exit();
		return array(
			"draw"            => intval( $request['draw'] ),
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => $this->data_output( $columns, $data, $db )
		);
	}
	static function sql_exec ( $db, $bindings, $sql=null )
	{
		//echo($sql);
		//D::bug($sql);
		if ( $sql === null ) {
			$sql = $bindings;
		}
		$stmt = $db->prepare( $sql );
		if ( is_array( $bindings ) ) {
			for ( $i=0, $ien=count($bindings) ; $i<$ien ; $i++ ) {
				$binding = $bindings[$i];
				$stmt->bindValue( $binding['key'], $binding['val'], $binding['type'] );
			}
		}
		try {
			$stmt->execute();
		}
		catch (PDOException $e) {
			self::fatal( "An SQL error occurred: ".$e->getMessage() );
		}
		return $stmt->fetchAll();
	}
	static function fatal ( $msg )
	{
		echo json_encode( array(
			"error" => $msg
		) );

		exit(0);
	}
	static function bind ( &$a, $val, $type )
	{
		$key = ':binding_'.count( $a );

		$a[] = array(
			'key' => $key,
			'val' => $val,
			'type' => $type
		);

		return $key;
	}
	static function pluck ( $a, $prop )
	{
		$out = array();

		for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
			$out[] = $a[$i][$prop];
		}

		return $out;
	}
	static function _flatten ( $a, $join = ' AND ' )
	{
		if ( ! $a ) {
			return '';
		}
		else if ( $a && is_array($a) ) {
			return implode( $join, $a );
		}
		return $a;
	}
}

?>
