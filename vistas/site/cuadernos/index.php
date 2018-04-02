<style>
	ol{
		list-style-type: disk;
		margin-left:50px;
	}
	big{

		color:teal;
		font-size: 1.7em;
	}
	b{
		color:teal;
	}
	.page-title-wrap {
		background: #fff;
	}

	@media (max-width: 499px) {
		.page-title-wrap {
			background-size: 400%;
		}
		.imgfloat {
		    margin: 0 0 20px 20px;
		    padding: 0px;
		}
	}
	@media (min-width: 500px) and (max-width: 749px) {
		.page-title-wrap {
			background-size: 260%;
		}
		.imgfloat {
		    margin: 0 0 20px 20px;
		    padding: 0px;
		}		
	}
	@media (min-width: 750px) and (max-width: 999px) {
		.page-title-wrap {
			background-size: 200%;
		}
	}
	@media (min-width: 1000px) and (max-width: 1259px) {
		.page-title-wrap {
			background-size: 190%;
			background-position: 0px 8%;
		}
	}


	@media (min-width: 1260px) and (max-width: 1800px) {
		.page-title-wrap {
			background-size: 155%;
			background-position: 0px 8%;
		}
	}
	@media (min-width: 1801px) and (max-width: 2100px) {
		.page-title-wrap {
			background-size: 130%;
			background-position: 0px 8%;
		}
	}
	@media (min-width: 2101px) {
		.page-title-wrap {
			background-size: 110%;
			background-position: 0px 8%;
		}
	}
	h6{
		font-size:1em;
		font-weight: bold;
	}
	h6:hover{
		color:#217ED3
	}
</style>
<section style="background-image: url(<?=URL_PUBLIC?>frontend/images/headers/cuadernos.png);background-repeat: no-repeat;" class="section-30 section-sm-40 section-md-66 section-lg-bottom-90 bg-gray-dark page-title-wrap">
  <div class="shell">
	<div class="page-title">
	  <h2></h2>
	</div>
  </div>
</section>
<section class="section-sm-50">
	<div class="shell">
		<ol class="breadcrumb">
		  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
		  <li class="active">Cuadernos Americanos</li>
		</ol>
	</div>
</section>
<section class="wrapper padding50">
    <!-- start: ABOUT US CONTAINER -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="imgfloat" src="<?=URL_PUBLIC?>frontend/images/cuadernos/Portada-133.jpg" style="width:200px;">
                <h6 style="text-align: right;" data-file="acerca" data-folder="cuadernos" class="load-content">Acerca de los cuadernos Americanos</h6>
                <h6 style="text-align: right;" data-file="consejo" data-folder="cuadernos" class="load-content">Consejo editorial</h6>
                <h6 style="text-align: right;" data-file="normas" data-folder="cuadernos" class="load-content">Normas para los autores</h6>
                <h6 style="text-align: right;" data-file="suscripciones" data-folder="cuadernos" class="load-content">Suscripciones</h6>
                <h6 style="text-align: right;" data-file="solicitud" data-folder="cuadernos" class="load-content">Solicitud de números</h6>

            </div>
            <div class="col-sm-6">
                <ul class="icon-list animate-group">
                    <li>
                        <div class="timeline animate" data-animation-options="{"animation":"scaleToBottom", "duration":"300"}" style="opacity: 1; transform: scaleY(1);"></div>
                        <i data-file="index" data-folder="cuadernos|epoca1" class="load-content clip-book circle-icon circle-teal animate" data-animation-options="{"animation":"flipInY", "duration":"600"}" style="opacity: 1; animation-fill-mode: both; animation-duration: 1.2s; animation-delay: 0s; animation-name: flipInY;"></i>
                        <div class="icon-list-content">
                            <h4 data-file="index" data-folder="cuadernos|epoca1" class="load-content">PRIMERA ÉPOCA</h4>
                            <p data-file="index" data-folder="cuadernos|epoca1" class="load-content">
                                PRIMERA ÉPOCA
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline animate" data-animation-options="{"animation":"scaleToBottom", "duration":"300", "delay": "300"}" style="opacity: 1; transform: scaleY(1);"></div>
                        <i data-file="index" data-folder="cuadernos|epoca2"  class="load-content clip-book circle-icon circle-green animate" data-animation-options="{"animation":"flipInY", "duration":"600"}" style="opacity: 1; animation-fill-mode: both; animation-duration: 1.2s; animation-delay: 0s; animation-name: flipInY;"></i>
                        <div class="icon-list-content">
							<h4 data-file="index" data-folder="cuadernos|epoca2"  class="load-content">NUEVA ÉPOCA (1987-2008)</h4>
                            <p data-file="index" data-folder="cuadernos|epoca2"  class="load-content">
                               NUEVA ÉPOCA (1987-2008)
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline animate" data-animation-options="{"animation":"scaleToBottom", "duration":"300", "delay": "300"}" style="opacity: 1; transform: scaleY(1);"></div>
                        <i data-file="index" data-folder="cuadernos|epoca3" class="load-content clip-book circle-icon circle-bricky animate" data-animation-options="{"animation":"flipInY", "duration":"600"}" style="opacity: 1; animation-fill-mode: both; animation-duration: 1.2s; animation-delay: 0s; animation-name: flipInY;"></i>
                        <div class="icon-list-content">
                            <h4 data-file="index" data-folder="cuadernos|epoca3" class="load-content">NUEVA ÉPOCA</h4>
                            <p data-file="index" data-folder="cuadernos|epoca3" class="load-content">
                                NUEVA ÉPOCA
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: ABOUT US CONTAINER -->
</section>
