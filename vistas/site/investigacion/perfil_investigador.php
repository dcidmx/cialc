<style>
			ol{
					list-style-type: disk;
					margin-left:25px;
			}
			big{
					color:teal;
					font-size: 1.7em;
			}
			b{
					color:teal;
			}
			.page-title-wrap {
					background-size: 120%;
					background-position: -100px 50%;
			}
			.thumbnail-profile .thumbnail-caption {
					padding: 20px 20px 20px 0px;
					background: #ededed;
			}
</style>
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
      <h2><?=$investigador['nombre'] ?></h2>
    </div>
  </div>
</section>

<?php
//modelo Usuarios metodo researchD
 ?>
 <link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/clipone.css">
 <link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/main-responsive.min.css">
 <section class="wrapper padding50">
     <div class="container">
         <div class="row">
             <div class="col-md-4 col-md-push-8">
                  <div class="thumbnail thumbnail-profile">
                   <div class="thumbnail-image"><img src="<?=URL_PUBLIC?>plugs/timthumb.php?src=tmp/<?=$destino?>&w=300" alt="" width="570" height="570">
                   </div>
                   <div class="thumbnail-caption">
                     <div class="thumbnail-caption-inner">

											 <ol>
													<li>
														<i class="icon icon-xxs icon-gray-base material-icons-phone"></i>
														<a href="tel:<?=$investigador['telefono']?>" class="link-gray-base-v2"><?=$investigador['telefono']?></a>
													</li>
													<li>
														<i class="icon icon-xxs icon-gray-base fa-envelope-o"></i>
														<a href="mailto:<?=$investigador['correo']?>" class="link-gray-base-v2"><?=$investigador['correo']?></a>
													</li>
											</ol>

                     </div>
                   </div>
                 </div>
             </div>
             <div class="col-md-8 col-md-pull-4">
                 <div class="tabbable tabs-left">
                     <ul id="myTab3" class="nav nav-tabs tab-teal">
                         <li class="active">
                             <a href="#faq_example1" data-toggle="tab" aria-expanded="true">
                                 <i class="fa fa-book"></i> Información
                             </a>
                         </li>
                         <li class="">
                             <a href="#faq_example2" data-toggle="tab" aria-expanded="false">
                                 <i class="fa fa-book"></i> Trayectoria y distinciones
                             </a>
                         </li>
                         <li class="">
                             <a href="#faq_example4" data-toggle="tab" aria-expanded="false">
                                 <i class="fa fa-book"></i> Investigaciones en curso
                             </a>
                         </li>
                         <li class="">
                             <a href="#faq_example6" data-toggle="tab" aria-expanded="false">
                                 <i class="fa fa-book"></i> Publicaciones
                             </a>
                         </li>
			    <li class="">
                             <a href="#faq_example5" data-toggle="tab" aria-expanded="false">
                                 <i class="fa fa-book"></i> Docencia
                             </a>
                         </li>
                         <li class="">
                             <a href="#faq_example7" data-toggle="tab" aria-expanded="false">
                                 <i class="fa fa-book"></i> Información adicional
                             </a>
                         </li>
                     </ul>
                     <div class="tab-content">
                       <div class="tab-pane active" id="faq_example1">
                           <div>
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h4 class="panel-title">
                                               <i class="icon-arrow"></i>
                                               Información
                                       </h4>
                                   </div>
                                   <div>
                                       <div class="panel-body">
                                         <?=$investigador['personales']?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="faq_example2">
                           <div>
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h4 class="panel-title">
                                               <i class="icon-arrow"></i>
                                               Trayectoria y distinciones
                                       </h4>
                                   </div>
                                   <div>
                                       <div class="panel-body">
                                         <?=$investigador['trayectoria']?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="faq_example4">
                           <div>
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h4 class="panel-title">
                                               <i class="icon-arrow"></i>
                                               Investigaciones en curso
                                       </h4>
                                   </div>
                                   <div>
                                       <div class="panel-body">
                                         <?=$investigador['investigaciones']?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
			  <div class="tab-pane" id="faq_example6">
                           <div>
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h4 class="panel-title">
                                               <i class="icon-arrow"></i>
                                               Publicaciones
                                       </h4>
                                   </div>
                                   <div>
                                       <div class="panel-body">
                                         <?=$investigador['publicaciones']?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="faq_example5">
                           <div>
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h4 class="panel-title">
                                               <i class="icon-arrow"></i>
                                               Docencia
                                       </h4>
                                   </div>
                                   <div>
                                       <div class="panel-body">
						    <!--Cursos cambio de nombre a docencia, en la base de datos se quedó en cursos-->
                                         <?=$investigador['cursos']?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="tab-pane" id="faq_example7">
                           <div>
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h4 class="panel-title">
                                               <i class="icon-arrow"></i>
                                               Información adicional
                                       </h4>
                                   </div>
                                   <div>
                                       <div class="panel-body">
                                         <?=$investigador['otros']?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                     </div>
                 </div>
                 <!-- end: FAQ -->
             </div>
         </div>
     </div>
 </section>
