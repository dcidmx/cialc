<style>
	.list-marked-bordered li a {
		padding: 0px 7px;
	}
	.newpub{
		font-size:1.2em;
		color:#7bb8f1;

	}
	.paistitle{
		font-size:1.6em;
		color:#217ED3;
		margin-top:30px;
		margin-bottom:20px;
	}
	.affix{
		top:150px;
	}
</style>
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
	  <h2>Periódicos en línea</h2>
	</div>
  </div>
</section>
<section class="section-sm-50">
	<div class="shell">
		<ol class="breadcrumb">
		  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
		  <li data-file="index" data-folder="biblioteca" class="load-content">Biblioteca</li>
		  <li class="active">Periódicos en línea</li>
		</ol>
	</div>
</section>
	<section class="section-60 section-sm-75 section-lg-90">
		<div class="shell">
		  <div class="range">
		    <div class="cell-md-8 cell-lg-9">
		      <article class="post post-single">
		        <div class="post-header">
		          <h4>Catálogo de los principales diarios en línea de América Latina</h4>
		        </div>

		        <div class="divider-fullwidth bg-gray-light offset-top-15"></div>
		        <div class="post-body"><p>
		        	<?php
		        	include_once('argentina.php');
		        	include_once('belice.php');
		        	include_once('chile.php');
		        	include_once('mexico.php');
		        	include_once('nicaragua.php');
		        	include_once('venezuela.php');

 					?>
		        </p></div>
		      </article>
		      <div class="divider-fullwidth bg-gray-lighter offset-top-40"></div>
		    </div>
		    <div class="cell-md-4 cell-lg-3 offset-top-50 offset-md-top-0">
		      <div class="inset-md-left-15 inset-md-right-10">
		        <div class="range">
		          <div class="cell-sm-6 cell-md-12">
		            <nav class="offset-top-50" id="fixed_panel">
		              <ul class="list-marked-bordered offset-top-15">
		                <li><a href="#ARGENTINA"><span>Argentina</span></a></li>
		                <li><a href="#BOLIVIA"><span>Bolivia</span></a></li>
		                <li><a href="#COLOMBIA"><span>Colombia</span></a></li>
		                <li><a href="#CUBA"><span>Cuba</span></a></li>
		                <li><a href="#ELSALVADOR"><span>El Salvador</span></a></li>
		                <li><a href="#GUATEMALA"><span>Guatemala</span></a></li>
		                <li><a href="#MEXICO"><span>México</span></a></li>
		                <li><a href="#PANAMA"><span>Panamá</span></a></li>
						<li><a href="#HAITI"><span>Haití</span></a></li>
		                <li><a href="#PERU"><span>Perú</span></a></li>
		                <li><a href="#DOMINICANA"><span>República Dominicana</span></a></li>
		                <li><a href="#VENEZUELA"><span>Venezuela</span></a></li>
		                <li><a href="#BELICE"><span>Belice</span></a></li>
		                <li><a href="#BRASIL"><span>Brasil</span></a></li>
		                <li><a href="#COSTARICA"><span>Costa Rica</span></a></li>
		                <li><a href="#CHILE"><span>Chile</span></a></li>
		                <li><a href="#ECUADOR"><span>Ecuador</span></a></li>
		                <li><a href="#HONDURAS"><span>Honduras</span></a></li>
		                <li><a href="#NICARAGUA"><span>Nicaragua</span></a></li>
		                <li><a href="#PARAGUAY"><span>Paraguay</span></a></li>
		                <li><a href="#PUERTORICO"><span>Puerto Rico</span></a></li>
		                <li><a href="#URUGUAY"><span>Uruguay</span></a></li>
			  </nav>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</section>
<script>
$('#fixed_panel').affix({
	offset: 380
})
</script>
