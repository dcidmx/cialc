<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
          <h2>Búsqueda</h2>
        </div>
      </div>
    </section>
	<section class="section-sm-50">
		<div class="shell">
			<ol class="breadcrumb">
			  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
			  <li class="active">Búsqueda</li>
			</ol>
		</div>
	</section>
    <section class="section-60 section-sm-90 section-lg-bottom-120">
      <div class="shell">
        <div class="range range-md-center">
          <div class="cell-md-10">
            <form method="POST" id="secsearchform" data-search-live-count="15" class="rd-search rd-search-minimal">
              <div class="form-group">
                <label for="rd-search-form-input-1" class="form-label"><span class="text-mobile">buscar...</span><span class="text-default">Escriba su búsqueda y oprima enter</span></label>
                <input id="rd-search-form-input-1" type="text" name="search" autocomplete="off" class="form-control">
              </div>
              <a href="javascript:;" class="btn-icon-only btn-icon-only-primary secondarysearch"><span class="icon icon-sm material-icons-keyboard_return"></span></a>
            </form>
          </div>
          <div class="cell-sm-11 offset-top-40 offset-sm-top-60">
			<div id="dinamic_search_loader"><div id="search_hide"><img src="<?=URL_PUBLIC?>frontend/images/balls.svg"></div></div>
            <div class="rd-search-results" id="busqueda_dinamica_ajax">

              <?php include_once('list_results.php'); ?>

            </div>
          </div>
        </div>
      </div>
    </section>
