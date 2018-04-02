<style>
@media (max-width: 750px){
       .rd-navbar-wrap{
           height: 10px !important;
       }
       .rd-navbar-group {
           padding: 0px !important;
           margin-bottom: 0px;
       }
}
@media (max-width: 350px){
       .rd-navbar-wrap{
           height: 10px !important;
       }
       .rd-navbar-group {
           padding: 0px !important;
           margin-bottom: 0px;
       }
}
</style>
  <header class="page-head">
    <div class="rd-navbar-wrap">
      <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="53px" data-lg-stick-up-offset="53px" data-md-stick="false" data-lg-stick-up="false" class="rd-navbar rd-navbar-corporate-light">
        <div class="rd-navbar-inner">
          <div class="rd-navbar-aside-wrap">
            <div class="rd-navbar-aside">
              <div data-rd-navbar-toggle=".rd-navbar-aside" class="rd-navbar-aside-toggle"><span></span></div>
              <div class="rd-navbar-aside-content">
                <ul class="rd-navbar-aside-group list-units">
				  <?php
				  if(!isset($_SESSION['id_usuario'])){
				  ?>
				  <li>
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary fa-lock"></span></div>
                      <div class="unit-body">
						<a href="<?=URL_APP?>login" class="link-secondary"><span class="__cf_email__" data-cfemail="81e8efe7eec1e5e4eceeede8efeaafeef3e6">Ingresar</span></a></div>
                    </div>
                  </li>
				  <?php
				  }else{
				  ?>
				  <li>
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary fa-lock"></span></div>
                      <div class="unit-body">
						<a href="<?=URL_APP?>login" class="link-secondary"><span class="__cf_email__" data-cfemail="81e8efe7eec1e5e4eceeede8efeaafeef3e6">Backend</span></a></div>
                    </div>
                  </li>
				  <li>
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary fa-key"></span></div>
                      <div class="unit-body">
						<a onclick="salir();" href="javascript:void(0)" class="link-secondary"><span class="__cf_email__" data-cfemail="81e8efe7eec1e5e4eceeede8efeaafeef3e6">Logout</span></a></div>
                    </div>
                  </li>
				  <?php
				  }
				  ?>
				  <li>
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary fa-pencil-square-o"></span></div>
                      <div class="unit-body">
						<a target="_blank" href="<?=URL_APP?>codex/index.php" class="link-secondary"><span class="__cf_email__" data-cfemail="81e8efe7eec1e5e4eceeede8efeaafeef3e6">CMS</span></a></div>
                    </div>
                  </li>
                </ul>
                <div class="rd-navbar-aside-group">
                  <ul class="list-inline list-inline-reset">
                    <li><a target="_blank" href="https://www.facebook.com/cialc.unam/" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-facebook"></a></li>
                    <li><a target="_blank" href="https://twitter.com/cialcunam" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-twitter"></a></li>
                    <li><a target="_blank" href="https://plus.google.com/112736863072216689574" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-google-plus"></a></li>
                  </ul>
                </div>
              </div>
       </div>
       <!---
            <div class="rd-navbar-search">
              <a href="javascript:;" data-file="search-results" data-folder="extra" class="rd-navbar-search-toggle chargemenu"></a>
       </div>-->
          </div>
			<?php include_once('menu.php'); ?>
        </div>
      </nav>
    </div>
  </header>
