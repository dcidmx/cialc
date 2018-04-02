<style>
   /*https://www.w3schools.com/cssref/pr_list-style-type.asp*/
   .container ol{
   list-style-type: decimal;
   margin-left:50px;
   }
   .container ol ol{
   list-style-type: lower-alpha;
   margin-left:50px;
   }
   .container h6{
   font-size:1em;
   }
   .container strong{
   color:#000;
   }
   .thumbnail-variant-3 {
   width: 300px;
   text-align: center;
   }
   .thumbnail-variant-3 > * + * {
   margin-top: 0;
   width: 300px;
   }
   .container .range{
   margin-top:50px;
   }
   .affix{
   top:20px;
   }
</style>
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
         <h2>SOLAR</h2>
      </div>
   </div>
</section>

<link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/clipone.css">
<link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/main-responsive.min.css">
<section class="wrapper padding50">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <!-- start: FAQ -->
            <div class="tabbable tabs-left">
               <div class="row">
                  <div class="col-sm-2">
                     <nav id="fixed_panel">
                        <ul  class="nav nav-pills nav-stacked">
                           <li class="active">
                              <a href="#faq_example1" data-toggle="tab" aria-expanded="true">
                              Origen
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example2" data-toggle="tab" aria-expanded="false">
                              Estatutos
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example3" data-toggle="tab" aria-expanded="false">
                              Presidentes
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example4" data-toggle="tab" aria-expanded="false">
                              Miembros
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example5" data-toggle="tab" aria-expanded="false">
                              Congresos
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example6" data-toggle="tab" aria-expanded="false">
                              Publicaciones
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example7" data-toggle="tab" aria-expanded="false">
                              Archivo de imágenes
                              </a>
                           </li>
                           <li class="">
                              <a href="#faq_example8" data-toggle="tab" aria-expanded="false">
                              Noticias
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </div>
                  <div class="col-sm-10">
                     <div class="tab-content">
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/origen.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/estatutos.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/presidentes.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/miembros.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/congresos.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/publicaciones.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/imagenes.php'); ?>
                        <?php require(URL_VISTA.'site/nosotros/internacionales/solar/eventos.php'); ?>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end: FAQ -->
         </div>
      </div>
   </div>
</section>
<script>
   $('#fixed_panel').affix({
   	offset: 301
   })
</script>
