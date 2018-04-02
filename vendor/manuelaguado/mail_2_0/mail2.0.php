<?php
require_once("Mail.php");
require_once("Mail/mime.php");
class Email{

	private $host = MAIL_HOST;
	private $username = MAIL_USERNAME;
	private $password = MAIL_PASSWORD;
	private $from = MAIL_FROM;

	private function body($array,$plantilla){
		foreach ($array as $key => $value) {
			$this->$key = strip_tags($value);
		}
		ob_start();
		include_once '../resources/plantillas_email/email-'.$plantilla.'.php';
		return ob_get_clean();
	}
	public function sendMail($datamail){
		$destinatarios = implode(',',$datamail['destinatarios']);
		$subject = $datamail['subject'];
		$body = self::body($datamail['body'],$datamail['plantilla']);

		$mimeparams=array();
		$mimeparams['text_encoding']="8bit";
		$mimeparams['text_charset']="UTF-8";
		$mimeparams['html_charset']="UTF-8";
		$mimeparams['head_charset']="UTF-8";SITE_NAME
		$headers = array('From' => SITE_NAME, 'To' => $destinatarios,
					'Subject' => $subject, 'Content-Type' => 'text/html; charset=UTF-8', 'Content-Transfer-Encoding' => "8bit");

		$mime = new Mail_mime;
		$mime->setHTMLBody($body);
		$body = $mime->get($mimeparams);
		$headers = $mime->headers($headers);

		$smtp = Mail::factory('smtp', array ('host' => $this->host,
		                                    'auth' => true,
		                                    'username' => $this->username,
		                                    'password' => $this->password));


	    $destinatarios_lista = explode(",", $destinatarios);
	    if (count($destinatarios_lista) >= 10){
	    	$contador=0;
	    	$destinatario_temporal="";
	    	for ($i = 0; $i <= count($destinatarios_lista); $i++) {
	    		$destinatarios_temporal .= $destinatarios_lista[$i] .",";
	    		if ($contador == 9){
	    			$mail = $smtp->send($destinatarios_temporal, $headers, $body);
	    			$contador=0;
	    			$destinatarios_temporal ="";
	    		}elseif ( ($i+1) ==count($destinatarios_lista) and $destinatarios_temporal <> "") {
	    			$mail = $smtp->send($destinatarios_temporal, $headers, $body);
	    		}
	    		$contador++;
	    	}
	    }else{
	    	$mail = $smtp->send($destinatarios, $headers, $body);
	    	if( PEAR::isError($mail) ){
	    		return  $mail->getMessage();
	    	} else {
	    		return true;
	    	}
	    }
	}
}
?>
