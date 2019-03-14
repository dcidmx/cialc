<section class="offset-top-5" style="margin-bottom:25px;">
       <div class="container">
              <div class="row">
                     <div class="col-md-9">
                            <div class="pleca"><div class="pleca_va">ACTIVIDADES Y CONVOCATORIAS</div></div>


                            <div class="swiper-container">
                                   <div class="swiper-wrapper masio2" style="height:300px; vertical-align:top;" itemscope itemtype="http://schema.org/ImageGallery">
                                     <?php
                                       foreach($banners_act as $num => $banner){
                                     ?>
                                         <figure class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                <a href="<?=URL_PUBLIC?>content/banners/actividades/<?=$banner->poster_full?>" itemprop="contentUrl" data-size="<?=$banner->poster_width?>x<?=$banner->poster_height?>">
                                                <img width="100%" src="plugs/timthumb.php?src=content/banners/actividades/<?=$banner->url_full?>&w=893&h=298" itemprop="thumbnail" alt="<?=$banner->alternativo?>" />
                                                </a>
                                         </figure>
                                     <?php
                                     }
                                     ?>
                                   </div>
                                   <!-- Add Pagination -->
                                   <div class="swiper-pagination" style="position:relative; top:0px !important;"></div>
                            </div>

                     </div>
                     <div class="col-md-3">
                            <!-- Swiper -->
                            <div class="offset-top-0 offset-sm-top-0">
                                   <a data-caption-animate="fadeInUp" data-caption-delay="250" href="http://cialc.bibliotecas.unam.mx/" target="_blank"class="btn btn-xl fadeInUp animated bkgd-biblioteca">&nbsp;</a>
                                   <a data-caption-animate="fadeInUp" data-caption-delay="250" href="http://www.revistadeestlat.unam.mx/index.php/latino" target="_blank" class="btn btn-xl  fadeInUp animated bkgd-revista">&nbsp;</a>
                                   <a data-caption-animate="fadeInUp" data-caption-delay="250" href="javascript:;" data-file="index" data-folder="cuadernos" class="load-content btn btn-xl  fadeInUp animated bkgd-cuadernos">&nbsp;</a>
                                   <a data-caption-animate="fadeInUp" data-caption-delay="250" href="javascript:;" data-file="index" data-folder="proyectos" class="load-content btn btn-xl  fadeInUp animated bkgd-digital">&nbsp;</a>
                            </div>
                     </div>
              </div>
       </div>
</section>
