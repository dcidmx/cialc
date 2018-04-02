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
		h6{
			color:#9f9f9f !important;
			margin-bottom: 20px;
		}
</style>
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
	  <h2>Directorio <?=ucfirst (mb_strtolower(base64_decode($process)))?></h2>
	</div>
  </div>
</section>
<section class="section-sm-50">
	<div class="shell">
		<iframe src="<?=URL_APP?>site/dirisotope/directory/<?=$process?>" frameborder="0" scrolling="no" width="100%" height="3000px" id="mainframedirectory" />
	</div>
</section>
