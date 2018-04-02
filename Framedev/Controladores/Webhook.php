<?php
class Webhook extends Controlador
{
    public function index(){}
	public function presence(){
		
		$app_secret = PUSHER_SECRET;
		$app_key = $_SERVER['HTTP_X_PUSHER_KEY'];
		$webhook_signature = $_SERVER ['HTTP_X_PUSHER_SIGNATURE'];
		$body = file_get_contents('php://input');
		$expected_signature = hash_hmac( 'sha256', $body, $app_secret, false );	
		
		if($webhook_signature == $expected_signature) {
			
			$payload = json_decode( $body, true );
			
			foreach($payload['events'] as &$event) {
				
				$hook = $this->loadModel('Webhook');
				
				if($event['name'] == 'member_removed'){
					$hook->member_removed($event['user_id']);
				}else if($event['name'] == 'member_added'){
					$hook->member_added($event['user_id']);
				}
				
			}
			header("Status: 200 OK");
			
		} else {
			header("Status: 401 Not authenticated");
		}
	}
	public function pubnub($event){
		$body = file_get_contents('php://input');
		$elm = json_decode( $body, true );
		if($elm['sub_key'] == PUBNUB_SUSCRIBE){
			/* uuid timestamp occupancy action sub_key channel */
			$hook = $this->loadModel('Webhook');
			switch ($event){
				
				case 'join':
					$hook->member_added($elm['uuid']);
					header("Status: 200 OK");
					break;
				case 'leave':
					$hook->member_removed($elm['uuid']);
					header("Status: 200 OK");
					break;
				case 'timeout':
					$hook->member_removed($elm['uuid']);
					header("Status: 200 OK");
					break;
				
				
				case 'state':
					header("Status: 200 OK");
					break;
				case 'active':
					header("Status: 200 OK");
					break;
				case 'inactive':
					header("Status: 200 OK");
					break;
				default:
					header("Status: 200 OK");
			}
		}else{
			header("Status: 401 Not authenticated");
		}
	}
	public function ably(){
		header("Status: 200 OK");
	}
}
?>