<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
	  <h2>Novedades</h2>
	</div>
  </div>
</section>
<section class="section-sm-50">
	<div class="shell">
		<ol class="breadcrumb">
		  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
		  <li class="active">Novedades</li>
		</ol>
	</div>
</section>

<section class="section-sm-50">
    <div class="shell">
        <table>
            <tr>
                <td>
                  <?php
                  foreach($elementos as $num => $elemento){
                  ?>
                      <div class="row offset-top-15">

                          <div class="col-sm-4">
                              <img alt="<?=$elemento->alternativo?>" src="plugs/timthumb.php?src=<?=URL_PUBLIC?>content/banners/novedades/<?=$elemento->url_full?>&w=256">
                          </div>
                          <div class="col-sm-8">
                            <p>
                              <?=$elemento->name?><br>
                              <?=$elemento->descripcion?><br>
                              <?php
                              if($elemento->url_link != ''){
                              ?>
                              Enlace: <a href="<?=$elemento->url_link?>" target="_blank">Libros UNAM</a><br>
                              <?php
                              }
                              ?>
                            </p>
                          </div>

                      </div>

                  <?php
                  }
                  ?>

                </td>
            </tr>
        </table>
    </div>
</section>

<br><br>

<br>
<br>
<br>
<br>
