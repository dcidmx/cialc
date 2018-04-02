<?php
class Aplicacion
{
    private $url_controladores = null;
    private $url_metodo = null;
    private $parametros = array();
	public function __construct()
	{
		$this->mapearUrl();
		if (file_exists(URL_CONTROLADOR . ucwords($this->url_controladores) . '.php')) {

			require URL_CONTROLADOR . ucwords($this->url_controladores) . '.php';
			$this->url_controladores = new $this->url_controladores();

			if (method_exists($this->url_controladores, $this->url_metodo)) {

				if (!empty($this->parametros)) {
					call_user_func_array(array($this->url_controladores, $this->url_metodo), $this->parametros);
				} else {
					$this->url_controladores->{$this->url_metodo}();
				}

			} else {
				if(!$this->url_metodo){
					$this->url_controladores->index();
				}else{
					require URL_TEMPLATE.'404_full.php';
				}
			}

		} else {

			if(!$this->url_controladores){
				require URL_CONTROLADOR.'Site.php';
				$home = new Site();
				$home->index();
			}else{
				require URL_TEMPLATE.'404_full.php';
			}

		}
	}
    private function mapearUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->url_controladores= (isset($url[0]) ? $url[0] : null);
            $this->url_metodo 		= (isset($url[1]) ? $url[1] : null);
            unset($url[0], $url[1]);
			$this->parametros = array_values($url);
        }
    }
}
?>
