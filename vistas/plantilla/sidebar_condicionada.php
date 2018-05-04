<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
	<li class="heading">
		<h3 class="uppercase"><?=SITE_NAME?></h3>
	</li>
	<?php
	if(
		($this->tiene_permiso('Usuarios|adminresearch')) OR
		($this->tiene_permiso('Directorio|index')) OR
		($this->tiene_permiso('Cialc|proyectos')) OR
		($this->tiene_permiso('Cialc|seminarios'))
	)
	{
	?>

		<li class="nav-item  ">
			<a href="javascript:;" class="nav-link nav-toggle">
				<i class="fa fa-cogs"></i>
				<span class="title">Actividades</span>
				<span class="arrow"></span>
			</a>
			<ul class="sub-menu">

				<?php
				if($this->tiene_permiso('Usuarios|adminresearch')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>usuarios/adminresearch');" class="nav-link ">
							<i class="fa fa-graduation-cap"></i>
							<span class="title">Investigadores</span>
						</a>
					</li>
				<?php
				}
				?>


				<?php
				if($this->tiene_permiso('Directorio|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>directorio');" class="nav-link ">
							<i class="fa fa-graduation-cap"></i>
							<span class="title">Directorio</span>
						</a>
					</li>
				<?php
				}
				?>


				<?php
				if($this->tiene_permiso('Cialc|proyectos')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>cialc/proyectos');" class="nav-link ">
							<i class="fa fa-slideshare"></i>
							<span class="title">Proyectos</span>
						</a>
					</li>
				<?php
				}
				?>

				<?php
				if($this->tiene_permiso('Cialc|seminarios')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>cialc/seminarios');" class="nav-link ">
							<i class="fa fa-slideshare"></i>
							<span class="title">Seminarios</span>
						</a>
					</li>
				<?php
				}
				?>


			</ul>
		</li>

	<?php
	}
	?>

  <?php
	if(
		($this->tiene_permiso('Bannermain|index')) OR
		($this->tiene_permiso('Banneractividades|index')) OR
		($this->tiene_permiso('Bannernoticias|index')) OR
		($this->tiene_permiso('Bannernovedades|index')) OR
		($this->tiene_permiso('Bannerperiodicos|index'))
	)
	{
	?>

		<li class="nav-item  ">
			<a href="javascript:;" class="nav-link nav-toggle">
				<i class="fa fa-th-large"></i>
				<span class="title">Banners</span>
				<span class="arrow"></span>
			</a>
			<ul class="sub-menu">

				<?php
				if($this->tiene_permiso('Bannermain|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>bannermain');" class="nav-link ">
							<i class="fa fa-home"></i>
							<span class="title">Principal</span>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if($this->tiene_permiso('Banneractividades|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>banneractividades');" class="nav-link ">
							<i class="fa fa-star-o"></i>
							<span class="title">Actividades</span>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if($this->tiene_permiso('Bannernoticias|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>bannernoticias');" class="nav-link ">
							<i class="fa fa-television"></i>
							<span class="title">Noticias</span>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if($this->tiene_permiso('Bannernovedades|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>bannernovedades');" class="nav-link ">
							<i class="fa fa-sun-o"></i>
							<span class="title">Novedades</span>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if($this->tiene_permiso('Bannerperiodicos|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>bannerperiodicos');" class="nav-link ">
							<i class="fa fa-newspaper-o"></i>
							<span class="title">Periodicos</span>
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		</li>

	<?php
	}
	?>


	<?php
	if(
		($this->tiene_permiso('Usuarios|index')) OR
		($this->tiene_permiso('Controllers|index')) OR
		($this->tiene_permiso('Usuarios|logueados')) OR
		($this->tiene_permiso('Catalogo|index')) OR
		($this->tiene_permiso('Usuarios|perfil'))
	)
	{
	?>
		<li class="nav-item  ">
			<a href="javascript:;" class="nav-link nav-toggle">
				<i class="fa fa-cogs"></i>
				<span class="title">Configuración</span>
				<span class="arrow"></span>
			</a>
			<ul class="sub-menu">

				<?php
				if($this->tiene_permiso('Usuarios|perfil')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>usuarios/perfil');" class="nav-link ">
							<i class="icon-user"></i>
							<span class="title">Mi perfil</span>
						</a>
					</li>
				<?php
				}
				?>

				<?php
				if($this->tiene_permiso('Usuarios|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>usuarios');" class="nav-link ">
							<i class="fa fa-users"></i>
							<span class="title">Control de usuarios</span>
						</a>
					</li>
				<?php
				}
				?>

				<?php
				if($this->tiene_permiso('Controllers|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>controllers');" class="nav-link ">
							<i class="fa fa-gamepad"></i>
							<span class="title">Controladores</span>
						</a>
					</li>
				<?php
				}
				?>

				<?php
				if($this->tiene_permiso('Usuarios|logueados')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>usuarios/logueados');" class="nav-link ">
							<i class="fa fa-sign-in"></i>
							<span class="title">Control de logins</span>
						</a>
					</li>
				<?php
				}
				?>

				<?php
				if($this->tiene_permiso('Catalogo|index')){
				?>
					<li class="nav-item  ">
						<a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>catalogo');" class="nav-link ">
							<i class="fa fa-list"></i>
							<span class="title">Catálogo</span>
						</a>
					</li>
				<?php
				}
				?>

			</ul>
		</li>
	<?php
	}
	?>
