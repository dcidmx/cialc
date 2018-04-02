<section class="offset-top-15" style="margin-bottom:0px;">
       <div class="container">
              <div class="row">
                     <div class="col-md-12">
                            <div class="swiper-container0">
                                   <div class="swiper-wrapper" style="height:420px; vertical-align:top;">
                                     <?php
                                     foreach($banners_main as $num => $banner){
                                     ?>
                                         <div class="swiper-slide"><img alt="<?=$banner->alternativo?>" src="plugs/timthumb.php?src=content/banners/principal/<?=$banner->url_full?>&w=1200&h=420"></div>
                                     <?php
                                     }
                                     ?>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</section>
<br>
