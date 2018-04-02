<style>
	big{

	color:teal;
	font-size: 1.7em;
	}
	b{
	color:teal;
	}
	ul, ol {
	list-style: none;
	padding: 0;
	margin: 0;
	}
	li {
	display: list-item;
	text-align: -webkit-match-parent;
	text-indent: 3px;
	font-size:.8em;
	}
	.well > ol > li:hover {
	color: #217ED3;
	box-shadow: 0px 0px 30px #1c3d6c;
	padding: 0;
	-moz-transition: all .3s;
	-webkit-transition: all .3s;
	-o-transition: all .3s;
	}
</style>
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
	  <h2>Áreas</h2>
	</div>
  </div>
</section>
<section class="section-sm-50">
	<div class="shell">
		<ol class="breadcrumb">
		  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
		  <li class="active">Áreas</li>
		</ol>
	</div>
</section>
<link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/clipone.css">
<link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/main-responsive.min.css">
<section class="wrapper padding50">
    <div class="container">
	 <div class="row">
              <div class="col-md-3">
			<h6>Filosofía e historia de las ideas en América Latina y el Caribe:</h3>
		</div>
		<div class="col-md-3">
			<h6>Literatura y ensayo latinoamericanos y del Caribe:</h3>
		</div>
		<div class="col-md-3">
			<h6>Historia de América Latina y el Caribe:</h3>
		</div>
		<div class="col-md-3">
			<h6>Política, economía y sociedad en América Latina y el Caribe:</h3>
		</div>
	</div>
	<div class="row"><div class="col-md-12">&nbsp;</div></div>

        <div class="row">
              <div class="col-md-3">

			<div class="well well-lg">
				<ol>
				<?php
				foreach($filosofia as $num => $elm){
					echo '<li data-process="'.$elm['id_usuario'].'" data-file="perfil_investigador" data-folder="investigacion" class="load-content">'.$elm['nombre'].'</li>';
				}
				 ?>
				</ol>
			</div>
			<div class="row" style="padding-top:20px">
				<div class="col-md-12">
	   			    <h6>Son parte de la historia del CIALC:</h3><br>
	   		       </div>
				<div class="col-md-12">

	   			    <div class="well well-lg">
	   				    <ol>
	   					    <li data-file="leopoldo_zea" data-folder="nosotros|requiem" class="load-content">Leopoldo Zea  (1912-2004)</li>
	   					    <li data-file="elsa_frost" data-folder="nosotros|requiem" class="load-content">Elsa C. Frost del Valle (1928-2005)</li>
	   					    <li data-file="joaquin_sanchez" data-folder="nosotros|requiem" class="load-content">J. Sánchez Macgrégor (1925-2008)</li>
	   					    <li data-file="anne_bar_din" data-folder="nosotros|requiem" class="load-content">Anne Bar-Din Blugeot (1944-2010)</li>
	   					    <li data-file="salvador_mendez" data-folder="nosotros|requiem" class="load-content">Salvador Mendez Reyes (1961-2014)</li>
	   				    </ol>
	   			    </div>

			       </div>
			</div>
	       </div>
		<div class="col-md-3">

			<div class="well well-lg">
				<ol>
				<?php
				foreach($literatura as $num => $elm){
					echo '<li data-process="'.$elm['id_usuario'].'" data-file="perfil_investigador" data-folder="investigacion" class="load-content">'.$elm['nombre'].'</li>';
				}
				 ?>
				</ol>
			</div>
			<div class="row" style="padding-top:40px">
				<div class="col-md-12">
				    <h6>Becarios postdoctorales:</h3><br>
				</div>
				<div class="col-md-12">
<?php
$tooltip1 = "Saberes comunitarios, defensa de los territorios y organización social en la Guatemala de la posguerra. Mujeres que retejen la vida.";
$tooltip2 = "Heraldos de la nación: revistas, viajeros y redes intelectuales entre México y Uruguay (1920-1940).";
$tooltip3 = "La poesía política en el contexto de las dictaduras argentina y chilena de los años setenta y ochenta";
?>
				    <div class="well well-lg">
					    <ol>
						    <li class="bec_post" data-placement="right" title="<?=$tooltip1?>">Mariana López de la Vega</li>
						    <li class="bec_post" data-placement="right" title="<?=$tooltip2?>"> Ángela Mariana Moraes Medina</li>
						    <li class="bec_post" data-placement="right" title="<?=$tooltip3?>">Eva Barrera Castañeda</li>
					    </ol>
				    </div>
						<script>
						$( function() {
						  $(".bec_post").tooltip();
						} );
						</script>
						<style>
						.tooltip {
							width: 400px;
						}
						</style>
				</div>
			</div>
		</div>
		<div class="col-md-3">

			<div class="well well-lg">
				<ol>
				<?php
				foreach($historia as $num => $elm){
					echo '<li data-process="'.$elm['id_usuario'].'" data-file="perfil_investigador" data-folder="investigacion" class="load-content">'.$elm['nombre'].'</li>';
				}
				 ?>
				</ol>
			</div>
			<div class="row">
				<div class="col-md-12">
				    <h6>Investigadores visitantes:</h3><br>
				</div>
				<div class="col-md-12">

				    <div class="well well-lg">
					    <ol>
						    <li>Dra. Katherine Isabel Herazo González</li>
						    <li data-process="54" data-file="perfil_investigador" data-folder="investigacion" class="load-content">Dr. Juan Humberto Urquiza García</li>
					    </ol>
				    </div>

				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="well well-lg">
				<ol>
				<?php
				foreach($politica as $num => $elm){
					if($elm['id_usuario'] != 54){
							echo '<li data-process="'.$elm['id_usuario'].'" data-file="perfil_investigador" data-folder="investigacion" class="load-content">'.$elm['nombre'].'</li>';
					}
				}
				 ?>
				</ol>
			</div>
		</div>


            </div>
	    </div>
        </div>
    </div>
</section>
