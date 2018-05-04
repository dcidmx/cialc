<style>
h3{font-size:1.3em;font-style:normal;font-weight:400;line-height:1.10909}.block-image-plate .block-inner:after{content:'';position:absolute;top:0;right:0;bottom:0;left:0;z-index:0;background:#fff;border:1px solid #FFF}.bg-gray-base{color:#000}.bg-gray-base h3{color:#000}.counterx{top:-5px;font:900 2.5em "Playfair Display","Times New Roman",Times,Serif;color:#217ED3;line-height:1}
</style>
<section class="page-title-wrap" style="background:#929292">
  <div class="shell">
    <div class="page-title">
      <h2>Proyectos de investigación</h2>
    </div>
  </div>
</section>
<section class="section-sm-90" style="max-width: 1200px;margin-left: auto;margin-right: auto;position: relative;">
<ul class="list-blocks">
<?php
for($i = 0; $i < count($proyectos); $i++){
?>
  <li class="block-image-plate bg-gray-base bg-image">
    <div class="block-inner" style="padding-top: 20px !important;">
      <div class="block-left">
        <div class="counterx"><?=$i+1?></div>
      </div>
      <div class="block-header" style="max-width: 100%; text-align:justify;">
        <h3 style="font-weight: 600 !important;">
          <?=$proyectos[$i]->proyecto?>
        </h3><hr>
      </div>
      <div class="block-body">
        <div class="block-text" style="text-align:justify;">

          <?php if($proyectos[$i]->image){ ?>
          <img style="position:relative; float:left; margin: 5px; padding: 10px;border: 1px solid #cdcdcd;" src="plugs/timthumb.php?src=content/proyectos/images/<?=$proyectos[$i]->image?>&w=280">
          <?php } ?>

          <?=$proyectos[$i]->descripcion?><br><br></div>
      </div>
      <div style="positios:relative; float:right; font-size:1em;"><?=$proyectos[$i]->investigador?></div>
      <hr>
      <div style="position:relative; float:left; padding-left:100px; font-size:.9em; color:#000; ">
        <p>
          Línea de investigación:&nbsp;<?=$proyectos[$i]->lineas?><br>
          Área de investigación:&nbsp;<?=$proyectos[$i]->area?>
        </p>
      </div>
      <hr>
    </div>
  </li>
<?php
}
?>
</ul>
</section>
