<div class="rd-navbar-group">
	<div class="rd-navbar-panel">
		<button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>


		<!--Link banner-->
		<a href="javascript:;" data-file="index" data-folder="inicio" data-process="inicio" class="chargemenu">

			<img class="logocialc" src="<?=URL_PUBLIC?>frontend/images/hadercompact.png" alt="logo"/>
			<img class="logocialcm" src="<?=URL_PUBLIC?>frontend/images/logocialcm.png" alt="logo"/>

		</a>


	</div>
</div>
<div  class="menu-main-cialc">
	<div class="rd-navbar-nav-wrap">
		<div class="rd-navbar-nav-inner">
			<ul class="rd-navbar-nav">
				<li><a id="backhistoryx" style="color:#366ebd; display:none;"><</a></li>
				<li><a id="forwardhistoryx" style="color:#366ebd; display:none;">></a></li>
				<li><a href="javascript:;" data-file="index" data-folder="inicio" data-process="inicio" class="chargemenu">Inicio</a></li>


				<li><a href="javascript:;">Nosotros</a>
					<ul class="rd-navbar-megamenu">
						<li>
							<h5 class="rd-megamenu-header">EL CIALC</h5>
							<ul class="rd-navbar-list">
								<li><a href="javascript:;" data-file="quienes" data-folder="nosotros|cialcunam" class="chargemenu">¿Quiénes somos?</a></li>
								<li>
									<br><br><h5 class="rd-megamenu-header">Ubicación</h5>
									<ul class="rd-navbar-list">
										<li><a href="javascript:;" data-process="true" data-file="mapa" data-folder="nosotros|ubicacion" class="chargemenu">Dirección postal</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>

							<h5 class="rd-megamenu-header">
								Directorio
							</h5>
							<ul class="rd-navbar-list">
								<?php
								foreach($menu_nivel_1 as $level){
								?>
								<li>
									<a href="javascript:;" data-process="<?php echo base64_encode($level['nivel_primario']); ?>" data-file="directory" data-folder="nosotros|directorio" class="chargemenu">
										<?=ucfirst (mb_strtolower($level['nivel_primario']))?>
									</a>
								</li>
								<?php
								}
								?>
							</ul>
						</li>
						<li>
							<h5 class="rd-megamenu-header">Organización institucional</h5>
							<ul class="rd-navbar-list">
								<li><a href="javascript:;" data-file="plan" data-folder="nosotros|direccion" class="chargemenu">Plan de desarrollo CIALC-UNAM</a></li>
								<li><a href="javascript:;" data-file="reglamento" data-folder="nosotros|cialcunam|reglamentos" class="chargemenu">Reglamento interno</a></li>
								<li><a href="javascript:;" data-file="informes" data-folder="nosotros|direccion" class="chargemenu">Informes anuales</a></li>
								<li><a href="javascript:;" data-file="colegiados" data-folder="nosotros|cialcunam" class="chargemenu">Cuerpos colegiados</a></li>
								<li><a href="javascript:;" data-file="normatividad" data-folder="nosotros|cialcunam" class="chargemenu">Normatividad</a></li>

							</ul>
						</li>
						<li>
							<h5 class="rd-megamenu-header">Asociaciones internacionales</h5>
							<ul class="rd-navbar-list">
								<li><a href="javascript:;" data-file="fiealc" data-folder="nosotros|internacionales" class="chargemenu">FIEALC</a></li>
								<li><a href="javascript:;" data-file="solar" data-folder="nosotros|internacionales" class="chargemenu">SOLAR</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Investigación</a>
					<ul class="rd-navbar-dropdown rd-navbar-open-right">
						<li><a href="javascript:;" data-process="true" data-file="areas" data-folder="investigacion" class="chargemenu">Investigadores y áreas</a></li>
						<li><a href="javascript:;" data-process="true" data-file="proyectos" data-folder="investigacion" class="chargemenu">Proyectos</a></li>
						<li><a href="javascript:;" data-process="true" data-file="seminarios" data-folder="investigacion" class="chargemenu">Seminarios</a></li>
						<li><a href="javascript:;" data-file="marti" data-folder="investigacion" class="chargemenu">Cátedra “José Martí”</a></li><!--TODO: Investigación Cátedra "José Martí"-->
						<li><a href="javascript:;" data-file="bosch" data-folder="investigacion" class="chargemenu">Cátedra “Juan Bosch”</a></li><!--TODO: Investigación Cátedra "Juan Bosch"-->
						<li><a href="javascript:;" data-file="estancias" data-folder="investigacion" class="chargemenu">Estancias posdoctorales</a></li><!--TODO: Investigación Estancias posdoctorales-->
					</ul>
				</li>
				<li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Docencia</a>
					<ul class="rd-navbar-dropdown rd-navbar-open-right">
						<li><a href="javascript:;" data-file="actividad" data-folder="docencia" class="chargemenu">Actividad docente</a></li><!--TODO: Docencia  Actividad docente-->
						<li><a href="http://latinoamericanos.posgrado.unam.mx/" target="_blank">Posgrado en Estudios Latinoamericanos</a></li><!--TODO: Docencia Posgrado en Estudios Latinoamericanos-->

						<li><a href="javascript:;" data-file="servicio_social" data-folder="docencia" class="chargemenu">Servicio Social</a></li><!--TODO: Docencia Servicio Social-->
					</ul>
				</li>
				<li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Publicaciones</a>
					<ul class="rd-navbar-dropdown rd-navbar-open-right">
						<li><a href="javascript:;" data-process="true" data-file="novedades" data-folder="publicaciones" class="chargemenu">Novedades</a></li><!--TODO: Publicaciones Novedades-->
						<li><a href="javascript:;" data-file="fondo" data-folder="publicaciones" class="chargemenu">Fondo editorial</a></li><!--TODO: Publicaciones Fondo editorial-->
						<li><a href="javascript:;" data-file="index" data-folder="cuadernos" class="chargemenu">"Cuadernos Americanos"</a></li><!--TODO: Publicaciones "Cuadernos Americanos"-->
						<li><a href="http://www.revistadeestlat.unam.mx/index.php/latino"  target="_blank">"Latinoamerica"</a></li><!--TODO: Publicaciones "Latinoamerica"-->
						<li><a href="javascript:;" data-file="nuestraamerica" data-folder="publicaciones" class="chargemenu">"Nuestra América"</a></li><!--TODO: Publicaciones "Nuestra América"-->
						<li><a href="http://www.revistas.unam.mx/index.php/archipielago" target="_blank">"Archipiélago"</a></li><!--TODO: Publicaciones "Archipiélago"-->
					</ul>
				</li>
				<li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="#">Difusión</a>
					<ul class="rd-navbar-dropdown rd-navbar-open-right">
						<li><a href="javascript:;" data-file="eventos" data-folder="difusion" class="chargemenu">Eventos académicos</a></li><!--TODO: Difusión  Eventos académicos-->
						<li><a href="javascript:;" data-file="convocatorias" data-folder="difusion" class="chargemenu">Convocatorias</a></li><!--TODO: Difusión  Convocatorias-->
						<li><a href="javascript:;" data-file="cursos" data-folder="difusion" class="chargemenu">Cursos</a></li><!--TODO: Difusión Cursos -->
						<li><a href="javascript:;" data-file="concursos" data-folder="difusion" class="chargemenu">Concurso de tesis sobre América Latina</a></li><!--TODO: Difusión Concurso de tesis sobre América Latina -->
						<li><a href="javascript:;" data-file="fiealc" data-folder="nosotros|internacionales" class="chargemenu">FIEALC</a></li><!--TODO: Difusión FIALC/SOLAR -->
						<li><a href="javascript:;" data-file="solar" data-folder="nosotros|internacionales" class="chargemenu">SOLAR</a></li><!--TODO: Difusión FIALC/SOLAR -->

					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
