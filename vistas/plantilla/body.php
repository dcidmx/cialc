<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
		<div class="page-wrapper">
			<?php include ('navbar.php'); ?>

			<!-- /section:basics/navbar.layout -->
			<div class="page-container" id="main-container">

				<?php include ('sidebar.php'); ?>

				<div class="page-content-wrapper">
                                  <!-- BEGIN CONTENT BODY -->
                                  <div class="page-content" id="contenedor_principal">

					<?php
						//include('breadcrumbs.php');
						include(URL_VISTA.'inicio/index.php');
					?>

					</div><!-- /.page-content -->
				</div><!-- /.page-content-wrapper -->

			</div><!-- /.page-container -->

			<?php include('footer.php'); ?>
		</div>
		<?php include('scripts_end.php'); ?>
    </body>
