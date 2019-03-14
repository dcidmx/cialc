<section class="offset-top-15">
       <!-- Slider x 4 -->
       <div class="container">
              <div class="row">
                     <div class="col-md-6">
                            <!-- Swiper -->
                            <div class="pleca"><div class="pleca_va">NOTICIAS DEL CIALC</div></div>
                            <div class="events_container">
                                   <div class="swiper-wrapper masio1" style="height:300px; vertical-align:top;" itemscope itemtype="http://schema.org/ImageGallery">
                                     <?php
                                     foreach($banners_noti as $num => $banner){
                                     ?>

                                         <figure class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
<!--
                                           <div class="muro-noticias" data-swiper-parallax="-300">
                                             <p>Cialc<a href="#">Cialc</a></p>
                                           </div>
                                           <img width="100%" src="plugs/timthumb.php?src=content/banners/noticias/<?=$banner->url_full?>&w=585&h=290" itemprop="thumbnail" alt="<?=$banner->alternativo?>" />
-->
<!---->
                                              <a href="<?=URL_PUBLIC?>content/banners/noticias/<?=$banner->url_full?>" itemprop="contentUrl" data-size="<?=$banner->width?>x<?=$banner->height?>">
                                                <img width="100%" src="plugs/timthumb.php?src=content/banners/noticias/<?=$banner->url_full?>&w=585&h=290" itemprop="thumbnail" alt="<?=$banner->alternativo?>" />
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
                            <div class="pleca"><div class="pleca_va">LIBROS CIALC</div></div>
                            <div class="events2_container">
                                   <div class="swiper-wrapper" style="height:300px; vertical-align:top;" itemscope itemtype="http://schema.org/ImageGallery">
                                     <?php
                                     foreach($banners_nov as $num => $banner){
                                     ?>
                                       <figure class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                              <?php
                                              if($banner->url_link != ''){
                                              ?>
                                                <a href="<?=$banner->url_link?>" target="_blank">
                                                <img src="plugs/timthumb.php?src=content/banners/novedades/<?=$banner->url_full?>&w=278&h=295" itemprop="thumbnail" alt="<?=$banner->alternativo?>" />
                                                </a>
                                              <?php
                                              }else{
                                                ?>
                                                <img src="plugs/timthumb.php?src=content/banners/novedades/<?=$banner->url_full?>&w=278&h=295" itemprop="thumbnail" alt="<?=$banner->alternativo?>" />
                                                <?php
                                              }
                                              ?>
                                       </figure>
                                     <?php
                                     }
                                     ?>
                                   </div>
                                   <!-- Add Pagination -->
                                   <div class="swiper-pagination" style="position:absolute; top:350px !important;"></div>
                            </div>
                     </div>
                    <!--PERIODICOS SLIDER-->
                     <div class="col-md-3">
                            <div class="row">
                                   <!-- Swiper -->
                                   <div class="col-md-10">
                                          <div class="newpaper_container">
                                                 <div class="swiper-wrapper masio3" style="height:300px; vertical-align:top;" itemscope itemtype="http://schema.org/ImageGallery">

                                                   <?php
                                                   foreach($banners_news as $num => $banner){
                                                   ?>
                                                     <figure class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                            <a href="<?=URL_PUBLIC?>content/banners/periodicos/<?=$banner->url_full?>" itemprop="contentUrl" data-size="<?=$banner->width?>x<?=$banner->height?>">
                                                            <img src="<?=URL_PUBLIC?>content/banners/periodicos/<?=$banner->url_full?>" itemprop="thumbnail" alt="<?=$banner->alternativo?>" />
                                                            </a>
                                                     </figure>
                                                   <?php
                                                   }
                                                   ?>

                                                 </div>
                                          </div>
                                   </div>
                                   <div class="col-md-2"></div>
                            </div>
                            <div class="row" style="text-align:center;">
                                   <div class="col-md-12">
                                     <a target="_blank" href="http://kiosko.net/iba/">
                                            <img class="redondeado" src="<?=URL_PUBLIC?>frontend/images/kiosko64.png" data-placement="bottom" title="Periódicos relevantes de América Latina" alt="" width="32"/>
                                     </a>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</section>
