<?php
class Mobile extends Controlador
{
    public function index()
    {
		$this->se_requiere_logueo(true,'Mobile|index');
		$token_cache = $this->token(5);
		require URL_TEMPLATE_FW7.'index.php';
    }

}
?>