<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<script>var url_app = '<?=URL_APP?>';</script>
<script>
	var id_usuario = '<?=$_SESSION['id_usuario']?>';
	var domain = '<?=DOMAIN?>';
	var csrf_token = '<?=$token_cache?>';
</script>
<script type="text/javascript" src="<?=FW7?>libs/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?=FW7?>libs/framework7/dist/js/framework7.min.js"></script>
<script type="text/javascript" src="<?=FW7?>libs/swipebox/src/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="<?=FW7?>libs/jquery-validation/dist/jquery.validate.min.js"></script>


<script type="text/javascript" src="<?=FW7?>assets/js/app.js?v=<?=$token_cache?>"></script>