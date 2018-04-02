<?php
class Sidebar extends Controlador
{
    public function index()
    {
		$this->se_requiere_logueo(true,'Sidebar|index');
        require URL_TEMPLATE.'404.php';
    }
	public function obtenerExtensiones()
	{
		
		$this->se_requiere_logueo(true,'Sidebar|obtenerExtensiones');
		$extensiones = new RecursiveIteratorIterator($obj_Directory = new RecursiveDirectoryIterator(URL_EXTENSIONS),RecursiveIteratorIterator::SELF_FIRST);
		$extensiones->setMaxDepth(0);
		$menu_construct = array();
		$count = 0;
		//$autorizado = $this->loadModel('Sidebar');
		foreach ($extensiones as $extension) 
		{
			$elemento = pathinfo($extension);
			$basename = $elemento['basename'];
			if(($basename != '.')&&($basename != '..'))
			{
				if(!is_file($extension)){
					$controladores = new RecursiveIteratorIterator(
						$obj_Directory = 
							new 
								RecursiveDirectoryIterator(URL_EXTENSIONS . $basename . '/' . 'controlador/' ),
								RecursiveIteratorIterator::SELF_FIRST
					);
					$controladores->setMaxDepth(0);
					$inc = 0;
					foreach ($controladores as $controlador) 
					{
						$sube = false;
						$elemento = pathinfo($controlador);
						$basename2 = $elemento['basename'];
						if(($basename2 != '.')&&($basename2 != '..'))
						{
							
							include_once (URL_CONTROLADOR . 'extensions.php');
							include_once (URL_EXTENSIONS . $basename . '/' . 'controlador/' . $basename2);
							
								$controller = explode('.',$basename2);
								$controller = ucfirst($controller[0]);
								
								$inst_cont = $controller;
								$inst_cont = new $inst_cont;
								$menues = $inst_cont->menu;
								$metodos_clase = array_diff(get_class_methods($inst_cont), get_class_methods(get_parent_class($inst_cont)));
								
								if(($inc==0)&&(self::accesoExtension($basename))){
									$menu_construct[$count]['extension'] = [$basename,$menues[0][1],$menues[0][2]];
								}
								$par = $basename.'|'.$controller;
								
								if(self::accesoControlador($par)){
									$menu_construct[$count][$inc]['controlador'] = [$controller,$menues[1][1],$menues[1][2]];
								}
								
								foreach ($metodos_clase as $nombre_metodo) {
									foreach($menues as $menu){
										$tercio = $par.'|'.$nombre_metodo;
										if((in_array($nombre_metodo,$menu))&&(self::accesoMetodo($tercio))){
											$menu_construct[$count][$inc]['metodo'][] = [$nombre_metodo,$menu[1],$menu[2]];
										}
									}
								}
						$inc++;
						}
					}
				}
			$count++;
			}
		}
		return $menu_construct;
		//print("<pre>".print_r($menu_construct,true)."</pre>");
	}
	public function mostrarArray(){
		$array = $this->obtenerExtensiones();
		print("<pre>".print_r($array,true)."</pre>");
	}
	function accesoExtension($extension){
		foreach($_SESSION['permisos_acl'] as $tercio){
			$elemento = explode('|',$tercio);
			$extensiones[] = $elemento[0];
		}
		return in_array($extension,$extensiones) ? true : false ;
	}
	function accesoControlador($par){
		foreach($_SESSION['permisos_acl'] as $tercio){
			$elemento = explode('|',$tercio);
			$pares[] = $elemento[0].'|'.$elemento[1];
		}
		return in_array($par,$pares) ? true : false ;
	}
	function accesoMetodo($tercio){
		return in_array($tercio,$_SESSION['permisos_acl']) ? true : false ;
	}	
}