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
	@media (max-width: 1259px) {
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
</style>
    <section style="background-image: url(<?=URL_PUBLIC?>frontend/images/headers/cuadernos.png);" class="section-30 section-sm-40 section-md-66 section-lg-bottom-90 bg-gray-dark page-title-wrap">
      <div class="shell">
        <div class="page-title">
          <h2></h2>
    </section>
	<section class="section-sm-50">
		<div class="shell">
			<ol class="breadcrumb">
			  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
			  <li data-file="index" data-folder="cuadernos" class="load-content">Cuadernos Americanos</li>
			  <li class="active">Suscripciones</li>
			</ol>
		</div>
	</section>
    <section class="section-60 section-sm-top-90 section-sm-bottom-100">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<h4>Suscripciones</h4>
						<br>
						<iframe src="http://docs.google.com/gview?url=<?=URL_PUBLIC?>frontend/images/cuadernos/suscripcion_anual.pdf&amp;embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
				</div>
			</div>
		</div>
    </section>
