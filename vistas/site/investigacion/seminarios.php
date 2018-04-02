<div style="background-image: url('frontend/images/america-latina.png'); background-repeat: no-repeat; background-position: right top; background-opacity: 0.1;">
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
	  <h2>Seminarios</h2>
	</div>
  </div>
</section>
<section class="wrapper" style="min-height: 400px; background-position: 0px -1238.25px;" data-stellar-background-ratio="0.8" data-stellar-vertical-offset="-750">
     <div class="container">
                       <?php
                       $j=0;
                       for($i=0;$i < count($seminarios);$i++){
                              if($j==0){
                                     echo '<div class="row animate-group">';
                              }
                                 ?>
                              <div class="col-sm-4">
                                  <div class="icon-box animate" data-animation-options="{&quot;animation&quot;:&quot;flipInY&quot;, &quot;duration&quot;:&quot;600&quot;}" style="opacity: 1; animation-fill-mode: both; animation-duration: 1.2s; animation-delay: 0s; animation-name: flipInY;">
                                      <i class="icon-box-icon fa fa-pencil"></i>
                                      <h3 class="icon-box-title"><?=$seminarios[$i]->investigador?></h3>
                                      <div class="icon-box-content">
                                          <p>
                                              <?=$seminarios[$i]->seminario?>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                               <?php
                            $j++;
                            if($j==3){
                                   echo '</div>';
                                   $j = 0;
                            }
                     }
                     ?>
         </div>
     </div>
 </section>
</div>
 <br><br>
