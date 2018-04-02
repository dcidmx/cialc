<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<body>

<div class="statusbar-overlay"></div>
<div class="panel-overlay"></div>

<?php
/*Panel's*/
include_once('left_panel.php');
include_once('right_panel.php');

/*Views*/
include_once('main.php');

include_once('footer.php');
?>


</body>