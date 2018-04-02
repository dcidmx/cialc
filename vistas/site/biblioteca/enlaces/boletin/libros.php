<style>
	ol{
		list-style-type: disk;
		margin-left:50px;
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
</style>
<section class="page-title-wrap">
  <div class="shell">
    <div class="page-title">
      <h2>Selección de libros</h2>
    </div>
  </div>
</section>
<section class="section-sm-50">
	<div class="shell">
		<ol class="breadcrumb">
		  <li data-file="index" data-folder="inicio" class="load-content"><i class="fa fa-home" aria-hidden="true"></i></li>
		  <li data-file="index" data-folder="biblioteca" class="load-content">Biblioteca</li>
		  <li data-file="boletin" data-folder="biblioteca|enlaces" class="load-content">Boletín de nuevas adquisiciones</li>
		  <li class="active">Selección de libros</li>
		</ol>
	</div>
</section>
<link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/clipone.css">
<link rel="stylesheet" href="<?=URL_PUBLIC?>frontend/css/main-responsive.min.css">
<section class="wrapper padding50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable tabs-left">
                    <ul id="myTab3" class="nav nav-tabs tab-teal">
                        <li class="active">
                            <a href="#libros1" data-toggle="tab" aria-expanded="true">
                                <i class="fa fa-book"></i>(B) Filosofía y Religión
                            </a>
                        </li>
                        <li class="">
                            <a href="#libros2" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book"></i>(D) Historia (excepto América)
                            </a>
                        </li>
                        <li class="">
                            <a href="#libros3" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book"></i>(E-F) Historia de América
                            </a>
                        </li>
                        <li class="">
                            <a href="#libros4" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book"></i>(G) Geografía y Antropología
                            </a>
                        </li>
                        <li class="">
                            <a href="#libros5" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book"></i>(H) Ciencias Sociales
                            </a>
                        </li>
                        <li class="">
                            <a href="#libros6" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book"></i>(J) Ciencias Políticas
                            </a>
                        </li>
                        <li class="">
                            <a href="#libros7" data-toggle="tab" aria-expanded="false">
                                <i class="fa fa-book"></i>(P) Lengua y Literatura
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="libros1">
                            <div id="accordion" class="panel-group accordion accordion-custom accordion-teal">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_1_1" data-pdf="HORIZONTE" data-container="f1_1" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                                <i class="icon-arrow"></i>
                                                El horizonte y la memoria: ensayos sobre filosofía, estética y literatura.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_1_1" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/HORIZONTE.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>El horizonte y la memoria: ensayos sobre filosofía, estética y literatura / Odalis G. Pérez. -- Santo Domingo, República Dominicana: Editora Centenario, 2010. 258 p.</p>
                                              <h5>Contenido</h5>
                                                <p>BD41 / P39</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
											  <div id="f1_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_1_2" data-pdf="LATIN" data-container="f1_2" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                                <i class="icon-arrow"></i>
                                                Latin American thought: problems and perspectives: three case studies.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_1_2" aria-expanded="false">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/LATIN.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Latin American thought: problems and perspectives: three case studies / Karol Derwich, Magdalena Modrzejewska. -- Kraków: Ksiegarnia Akademicka, 2015. 136 p.</p>
                                              <h5>Contenido</h5>
                                                <p>B1001 / D47</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f1_2"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="libros2">
                            <div id="accordion2" class="panel-group accordion accordion-custom accordion-teal">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_2_1" data-pdf="DEFENSA" data-container="f2_1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              En defensa de la República: con Negrín en el exilio.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_2_1" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/DEFENSA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>En defensa de la República: con Negrín en el exilio / Pablo de Azcárate; edición, estudio preliminar y notas de Ángel Viñas. -- Barcelona: Crítica, 2010. 496 p.; [8] páginas de láminas: ilustraciones.</p>
                                              <h5>Contenido</h5>
                                                <p>DP271.A93 / A93</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f2_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_2_2" data-pdf="FUGA" data-container="f2_2"  data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              La fuga de Kropotkin.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_2_2" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/FUGA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>La fuga de Kropotkin / Rodrigo Quesada Monge. -- Santiago de Chile: Editorial Eleuterio, 2013. 173 p.</p>
                                              <h5>Contenido</h5>
                                                <p>DK769.K7 / Q84</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f2_2"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="libros3">
                            <div id="accordion3" class="panel-group accordion accordion-custom accordion-teal">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_1" data-pdf="COSTARICA" data-container="f3_1" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Costa Rica y sus hechos políticos de 1948: problemática de una década.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_1" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/COSTARICA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Costa Rica y sus hechos políticos de 1948: problemática de una década / Óscar Aguilar Bulgarell. -- San José, Costa Rica: EUNED, Editorial Universidad Estatal a Distancia, 2004. 437 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_2" data-pdf="CRISIS" data-container="f3_2" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Crisis social y memorias en lucha: guerra civil en Costa Rica, 1940-1948.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_2" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/CRISIS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Crisis social y memorias en lucha: guerra civil en Costa Rica, 1940-1948 / David Díaz Arias. -- [San José], Costa Rica: Editorial UCR, 2015. 381 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_2"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_3" data-pdf="CUERPO" data-container="f3_3" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              El cuerpo dócil de la cultura: poder, cultura y comunicación en la Venezuela de Chávez.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_3" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/CUERPO.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>El cuerpo dócil de la cultura: poder, cultura y comunicación en la Venezuela de Chávez / Manuel Silva-Ferrer. -- Madrid: Iberoamericana; Vervuert: Frankfurt am Main, 2014. 320 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_3"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_4" data-pdf="ESTUDIOS" data-container="f3_4" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Estudios afrocolombianos hoy: aportes a un campo transdisciplinario.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_4" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/ESTUDIOS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Estudios afrocolombianos hoy: aportes a un campo transdisciplinario / Eduardo Restrepo, editor. -- Popayán, Colombia: Editorial Universidad del Cauca, 2013. 309 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_4"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_5" data-pdf="FIGUERES" data-container="f3_5"  data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Fin de la Segunda República Figueres y la Constituyente del 49.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_5" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/FIGUERES.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Fin de la Segunda República Figueres y la Constituyente del 49 / Óscar Castro Vega. -- San José, Costa Rica: EUNED, Editorial Universidad Estatal a Distancia, 2007. 593 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_5"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_6" data-pdf="FRONTEIRAS" data-container="f3_6" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Fronteiras irmãs: transfronterizaҫões na Bacia do Preata.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_6" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/FRONTEIRAS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Fronteiras irmãs: transfronteirizaҫões na bacia do prata / Camilo Pereira Carneiro. -- Porto Alegre: Ideograf, 2016. 273 p.</p>
                                              <h5>Contenido</h5>
                                                <p>F2554 / P47</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_6"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_7" data-pdf="ISLA" data-container="f3_7" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              La Isla de Hití.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_7" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/ISLA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>La Isla de Haití / Lous Gentil Tippenhauer. -- República Dominicana: Academia Dominicana de Historia, 2016. 912 p.</p>
                                              <h5>Contenido</h5>
                                                <p>F1901 / T56</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_7"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_8" data-pdf="MALDICION" data-container="f3_8" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              La maldición del legionario: cómo se construyó un estigma político autoritario en Paraguay.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_8" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/MALDICION.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>La maldición del legionario: cómo se construyó un estigma político autoritario en Paraguay / Claudio José Fuentes Armadans. -- Asunción: Tiempo de Historia, 2016. 380 p.</p>
                                              <h5>Contenido</h5>
                                                <p>F2687 / F84</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_8"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_9" data-pdf="MEMORIAS" data-container="f3_9" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Memórias ancoradas em corpos negros.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_9" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/MEMORIAS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Memórias ancoradas em corpos negros / María Antonieta Antonacci. -- São Paulo: Educ, 2015. 382 p.</p>
                                              <h5>Contenido</h5>
                                                <p>F2510 / A58 / 2015</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_9"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_10" data-pdf="PEOBLES" data-container="f3_10" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              A people's history of Latin America.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_10" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/PEOBLES.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>A people's history of Latin America / Hernán Horna. -- New Jersey: Markus Wiener Publishers, 2014. 330 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_10"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_11" data-pdf="QUE" data-container="f3_11" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Qué pasó en los años 40.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_11" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/QUE.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Qué pasó en los años 40 / Fernando Soto Harrison. -- San José, Costa Rica: EUNED, 1991. 400 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="3_11"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_12" data-pdf="REPENSAR" data-container="f3_12" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Repensarnos: Guatemala 2012, capital mundial de la filosofía.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_12" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/REPENSAR.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Repensarnos: Guatemala 2012, capital mundial de la filosofía / Edgar Montiel, Juan Blanco y Amílcar Dávila, coordinadores. -- Guatemala: UNESCO: URL, 2011. 188 p.</p>
                                              <h5>Contenido</h5>
                                                <p>F1463.5 / R47</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="3_12"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_13" data-pdf="REPUBLICA" data-container="f3_13" data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              La República errante.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_13" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/REPUBLICA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>La República errante / Patricia Galeana [y otros]. -- México: Secretaría de Cultura: Instituto Nacional de Estudios Históricos de las Revoluciones de México, 2016. 224 p.</p>
                                              <h5>Contenido</h5>
                                                <p>F1233 / 45</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_13"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h4 class="panel-title">
                                          <a href="#faq_3_14" data-pdf="UTOPIAS" data-container="f3_14"  data-parent="#accordion3" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false">
                                              <i class="icon-arrow"></i>
                                              Utopías móviles: nuevos caminos para la historia intelectual en América Latina.
                                          </a>
                                      </h4>
                                  </div>
                                  <div class="panel-collapse collapse" id="faq_3_14" aria-expanded="false">
                                      <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/UTOPIAS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Utopías móviles: nuevos caminos para la historia intelectual en América Latina / coordinador Selnich Vivas Hurtado [y otros]. -- Bogotá: Diente de León Editor: Universidad de Atioquia, 2014. 432 p. -- (Colección ensayos).</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f3_14"></div>
                                            </div>
                                          </div>
                                        </div>
                                  </div>
                              </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="libros4">
                            <div id="accordion4" class="panel-group accordion accordion-custom accordion-teal">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_4_1" data-pdf="BRANISLAVA" data-container="f4_1" data-parent="#accordion4" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Branislava Susnik: la antropóloga del "Paraguay".
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_4_1">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/BRANISLAVA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Branislava Susnik: la antropóloga del Paraguay / Carlos Peres C. -- Asunción: El Lector, 2014. 96 p.</p>
                                              <h5>Contenido</h5>
                                                <p>GN21.S87 / P47</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f4_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="libros5">
                            <div id="accordion5" class="panel-group accordion accordion-custom accordion-teal">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_1" data-pdf="ENEMIGOS" data-container="f5_1"  data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Enemigos íntimos: terratenientes, poder y violencia en Chiapas.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_1">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/ENEMIGOS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Enemigos íntimos: terratenientes, poder y violencia en Chiapas / Aaron Bobrow-Strain; traducción al español Isabel Vericat Núñez. -- México: UNAM, Centro de Investigaciones Muldisciplinarias sobre Chiapas y la Frontera Sur, 2015. 333 p.</p>
                                              <h5>Contenido</h5>
                                                <p>HD1331.M6 / B6318</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_2" data-pdf="HOW" data-container="f5_2"  data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                How Latin America weathered the global financial crisis.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_2">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/HOW.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>How Latin America weathered the global financial crisis / José de Gregorio. -- Washington, D.C: Peterson Institute for International Economics, 2014. 165 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_2"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_3" data-pdf="IMPERIO" data-container="f5_3" data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                El imperio del banano: las compañías bananeras contra la soberanía de las naciones del Caribe.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_3">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/IMPERIO.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>El imperio del banano: las companías bananeras contra la soberanía de las naciones del Caribe / Charles David Kepner y Jay Henry Soothill; prólogo de Juan Valdés Paz. -- México: Ediciones Akal, 2015. 349 p.</p>
                                              <h5>Contenido</h5>
                                                <p>HD9259.B3 / K465 / 2015</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_3"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_4" data-pdf="LLEGADA" data-container="f5_4" data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                La llegada al Sur: la controvertida historia de los deslindes de terrenos baldíos en Chiapas, México, en su contexto internacional, 1881-1917.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_4">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/LLEGADA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>La llegada al Sur: la controvertida historia de los deslindes de terrenos baldíos en Chiapas, México, en su contexto internacional y nacional, 1881-1917 / Justus Fenner Bieling. -- México: UNAM, Centro de Investigaciones Multidisciplinarias sobre Chiapas y la Frontera Sur, 2015. 480 p.</p>
                                              <h5>Contenido</h5>
                                                <p>HD1671.M42 / C454</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_4"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_5" data-pdf="PERSPECTIVAS" data-container="f5_5" data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Perspectivas y oportunidades de la Alianza del Pacífico.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_5">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/PERSPECTIVAS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Perspectivas y oportunidades de la Alianza del Pacífico / Isabel Rodríguez Aranda, Edgar Vieira Posada, editores. -- Bogotá: Colegio de Estudios Superiores de Administración; Chile: Universidad del Desarrollo, 2015. 390 p.</p>
                                              <h5>Contenido</h5>
                                                <p>HC125 / P475</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_5"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_6" data-pdf="PUERTO" data-container="f5_6"  data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Puerto ricans in the empire: tobacco growers and U.S. colonialism.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_6">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/PUERTO.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Puerto ricans in the empire: tobacco growers and U.S Colonialism / Teresita A. Levy. -- New Brunswinck, New Jersey: Rutgers University Press, 2015. 182 p.: ilustraciones.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_6"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_5_7" data-pdf="VIOLENCIA" data-container="f5_7" data-parent="#accordion5" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Violencia(s): reflexiones sobre sus diversas formas en Paraguay.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_5_7">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/VIOLENCIA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Violencia(s): reflexiones sobre sus diversas formas en Paraguay / Magdalena López, Victoria Taboada (coordinadores). -- Asunción Paraguay: Grupo de Estudios Sociales sobre Paraguay: Sociodata: Editorial Arandurã, 2015. 215 p.</p>
                                              <h5>Contenido</h5>
                                                <p>HN340.Z9 / V58 / 2015</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f5_7"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="libros6">
                            <div id="accordion6" class="panel-group accordion accordion-custom accordion-teal">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_6_1" data-pdf="MUNDO" data-container="f6_1"  data-parent="#accordion6" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Un mundo en cambio: análisis de política nacional e internacional.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_6_1">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/MUNDO.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Un mundo en cambio: análisis de política nacional e internacional / José Ayala Lasso. -- Ecuador: Fundación el Comericio y UIDE, 2013. 181 p.</p>
                                              <h5>Contenido</h5>
                                                <p>JA71 / A93</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f6_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_6_2" data-pdf="SOBRE" data-container="f6_2" data-parent="#accordion6" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Sobre política: artículos y fragmentos escogidos.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_6_2">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/SOBRE.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Sobre política: artículos y fragmentos escogidos / Cayetano Betancur; Jorge Giraldo Ramírez, editor académico. -- Medellín, Colombia: Fondo Editorial Universidad EAFTT, 2010. 307.</p>
                                              <h5>Contenido</h5>
                                                <p>JA84.C6 / B47</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f6_2"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="libros7">
                            <div id="accordion7" class="panel-group accordion accordion-custom accordion-teal">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_7_1" data-pdf="ACANTILADO" data-container="f7_1"  data-parent="#accordion7" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                El acantilado de la libertad: antología de crónicas valdivianas, 1977-1992.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_7_1">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/ACANTILADO.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>El Acantilado de la libertad: antología de crónicas valdivianas 1977-1992 / compilación, edición y presentación Ignacio Szmulewiez Ramírez. -- Valdivia, Chile: Ediciones Kultrún, 2015. 159 p.</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f7_1"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_7_2" data-pdf="AMOR" data-container="f7_2" data-parent="#accordion7" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                De amor, crimen y cotidianidad: las revistas teatrales y colecciones de novelas cortas argentinas del Instituto Ibero-Americano.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_7_2">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/AMOR.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>De amor, crimen y cotidianidad: las revistas teatrales y colecciones de novelas cortas argentinas del Instituto Ibero-Americano / Peter Altekrueger, Katja Carrillo Zeiter, (eds.). -- Belín: Ibero-Amerikanisches Institut-PreuBischer Kulturbesitz, 2014. 112 p.</p>
                                              <h5>Contenido</h5>
                                                <p>PN5004 / D4318</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f7_2"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_7_3" data-pdf="CAMPOS" data-container="f7_3" data-parent="#accordion7" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Campos de batalla y campos de ruinas.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_7_3">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/CAMPOS.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Campos de batalla y campos de ruinas / Enrique Gómez Carrillo; con un prólogo de Benito Pérez Galdós. -- Guatemala: Editorial Cultura, 2014. 270 p.</p>
                                              <h5>Contenido</h5>
                                                <p>PQ7499.G6 / C35 / 2014</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f7_3"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_7_4" data-pdf="CHINA" data-container="f7_4" data-parent="#accordion7" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                China y México: un diálogo cultural desde las humanidades y las ciencias sociales.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_7_4">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/CHINA.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>China y México: un diálogo cultural desde las humanidades y las ciencias sociales / Alicia Girón, Aurelia Vargas Valencia, Guillermo Pulido, coordinadores. -- México: UNAM, 2015. 538 p. -- (Colección Universitaria de Estudios Asiáticos).</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f7_4"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_7_5" data-pdf="OCTAVIO" data-container="f7_5" data-parent="#accordion7" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Octavio Paz: una mirada al nuevo milenio: ensayos en torno a la modernidad.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_7_5">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/OCTAVIO.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Octavio Paz, una mirada al nuevo milenio: ensayos en torno a la modernidad / Diana Valencia. -- Toluca de Lerdo, México: Secretaría de Educación: Consejo Editorial de la Administración Pública Estatal: Saint Joseph College, 2010. 380 p.</p>
                                              <h5>Contenido</h5>
                                                <p>PQ7297.P4956 / Z9336/2010</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f7_5"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#faq_7_6" data-pdf="TEVOY" data-container="f7_6" data-parent="#accordion7" data-toggle="collapse" class="accordion-toggle collapsed">
                                                <i class="icon-arrow"></i>
                                                Te voy a recordar: relatos de ciencia ficción.
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-collapse collapse" id="faq_7_6">
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <img src="<?=URL_PUBLIC?>frontend/images/boletin/TEVOY.jpg">
                                            </div>
                                            <div class="col-md-8">
                                              <h5>Información</h5>
                                                <p>Te voy a recordar: relatos de ciencia ficción / Jessica Clark [y otros]. -- San José de Costa Rica: Editorial Universidad Estatal a Distancia, 2015. 159 p.</p>
                                              <h5>Contenido</h5>
                                                <p>PQ7488 / T48 / 2015</p>
                                            </div>
                                            <div class="col-md-12">
                                              <br><h5>PDF:</h5><br>
                                              <div id="f7_6"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
	$(".accordion-toggle").click(function() {
		$('#' +$(this).data('container')).html('<iframe src="http://docs.google.com/gview?url=<?=URL_PUBLIC?>frontend/images/boletin/'+$(this).data('pdf')+'.pdf&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>');
	});
</script>
