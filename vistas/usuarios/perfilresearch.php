<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
						<style>
						.profile-sidebar{
							padding-top: 80px;
						}
						</style>
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Perfil del Investigador
                            <small>configuracion de informacion del investigador</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PROFILE SIDEBAR -->
                                <div class="profile-sidebar">
                                    <!-- PORTLET MAIN -->
                                    <div class="portlet light profile-sidebar-portlet ">
                                        <!-- SIDEBAR USERPIC -->

																				<?php
																				if ($perfil['avatar']){
																				?>
										                              <div class="profile-userpic" id="avatar_actual">
										                              <img src="plugs/timthumb.php?src=tmp/<?=$avatar?>&w=300" class="img-responsive" alt="">
																				</div>

																				<?php
																				}else{
																				?>
										                              <div class="profile-userpic" id="avatar_actual">
										                              <img src="assets/pages/media/profile/profile_user.png" class="img-responsive" alt="">
																				</div>
																				<?php
																				}
																				?>

                                        <!-- END SIDEBAR USERPIC -->
                                        <!-- SIDEBAR USER TITLE -->
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> <?=$usuario_name?> </div>
                                            <div class="profile-usertitle-job">INVESTIGADOR</div><br><br>
                                        </div>
                                        <!-- END SIDEBAR USER TITLE -->
                                    </div>
                                    <!-- END PORTLET MAIN -->
                                </div>
                                <!-- END BEGIN PROFILE SIDEBAR -->
                                <!-- BEGIN PROFILE CONTENT -->
								<form id="editar_perfil">
									<div class="profile-content">
										<div class="row">
											<div class="col-md-12">
												<div class="portlet light ">
													<div class="portlet-title tabbable-line">
														<ul class="nav nav-tabs">
															<li class="active">
																<a href="#tab_2_0" data-toggle="tab">Avatar</a>
															</li>
															<li>
																<a href="#tab_2_1" data-toggle="tab">Información</a>
															</li>
															<li>
																<a href="#tab_2_2" data-toggle="tab">Trayectoria</a>
															</li>
															<li>
																<a href="#tab_2_4" data-toggle="tab">Investigaciones</a>
															</li>
															<li>
																<a href="#tab_2_6" data-toggle="tab">Publicaciones</a>
															</li>
															<li>
																<a href="#tab_2_5" data-toggle="tab">Docencia</a>
															</li>
															<li>
																<a href="#tab_2_7" data-toggle="tab">Otros</a>
															</li>
														</ul>
													</div>
													<div class="portlet-body">
														<div class="tab-content">
															<!-- AVATAR -->
															<div class="tab-pane active" id="tab_2_0">
																<div class="row">
																	<div class="space-10"></div>
																	<div class="col-xs-12 col-sm-4">

																		<div class="m-form m-form--fit m-form--label-align-right">
														          <div class="m-portlet__body">
														            <div class="form-group m-form__group row">
														              <div class="col-lg-12 col-md-12 col-sm-12">
														                <div class="m-dropzone dropzone" id="m-dropzone-one">
														                  <div class="m-dropzone__msg dz-message needsclick">
																								<h3 class="m-dropzone__msg-title">
																									<i class="fa fa-cloud-upload big-center"></i>
																								</h3>
														                  </div>
														                </div>
														              </div>
														            </div>
														          </div>
														        </div>
																	</div>

																	<div class="vspace-xs"></div>
																	<div class="col-xs-12 col-sm-8">
																		<div class="form-group">
																			<label class="col-sm-5 control-label no-padding-right" for="investigador">Nombre público</label>

																			<div class="col-sm-7">
																				<input  class="form-control" type="text" id="investigador" name="investigador" placeholder="Nombre público" value="<?=$research['nombre']?>" /><br>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-5 control-label no-padding-right" for="telefono">Teléfono</label>

																			<div class="col-sm-7">
																				<input  class="form-control" type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?=$research['telefono']?>" /><br>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-5 control-label no-padding-right" for="correo_publico">Correo público</label>

																			<div class="col-sm-7">
																				<input class="form-control" type="email" id="correo_publico" name="correo_publico" placeholder="Correo público" value="<?=$research['correo']?>" /><br>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-5 control-label no-padding-right" for="linea_investigacion">Categoría</label>

																			<div class="col-sm-7">
																			<select  class="form-control" id="linea_investigacion" name="linea_investigacion">
																			<?php echo $linea_investigacion; ?>
																			</select><br>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-5 control-label no-padding-right" for="tipo_investigador">Tipo</label>

																			<div class="col-sm-7">
																			<select  class="form-control" id="tipo_investigador" name="tipo_investigador">
																			<?php echo $tipo_investigador; ?><br>
																			</select>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- DATOS PERSONALES -->
															<div class="tab-pane" id="tab_2_1">
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<div class="space-10"></div>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div name="summernote_1" id="summernote_1"> </div><br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- TRAYECTORIA -->
															<div class="tab-pane" id="tab_2_2">
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<div class="space-10"></div>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div name="summernote_2" id="summernote_2"> </div><br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- INVESTIGACIONES-->
															<div class="tab-pane" id="tab_2_4">
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<div class="space-10"></div>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div name="summernote_4" id="summernote_4"> </div><br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- PUBLICACIONES-->
															<div class="tab-pane" id="tab_2_6">
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<div class="space-10"></div>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div name="summernote_6" id="summernote_6"> </div><br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- DOCENCIA-->
															<div class="tab-pane" id="tab_2_5">
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<div class="space-10"></div>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div name="summernote_5" id="summernote_5"> </div><br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- INFORMACION ADICIONAL-->
															<div class="tab-pane" id="tab_2_7">
																<div class="row">
																	<div class="col-xs-12 col-sm-12">
																		<div class="space-10"></div>
																		<div class="form-group">
																			<div class="col-sm-12">
																				<div name="summernote_7" id="summernote_7"> </div><br>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<input type="hidden" value="" id="informacion" name="informacion">
														<input type="hidden" value="" id="trayectoria" name="trayectoria">
														<input type="hidden" value="" id="investigacion" name="investigacion">
														<input type="hidden" value="" id="cursos" name="cursos">
														<input type="hidden" value="" id="publicaciones" name="publicaciones">
														<input type="hidden" value="" id="otros" name="otros">
														<input type="hidden" value="activo" id="research" name="research">
														<input type="hidden" value="inactivo" id="perfil" name="perfil">
														<input type="hidden" value="<?=$user_id?>" id="id_usuario" name="id_usuario">
													</div>
												</div>
											</div>
										</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-10 col-md-2">
											<button id="send_info" onclick="editar_research();" class="btn green" type="button">
												Guardar
											</button>
										</div>
									</div>

								</form>
                            </div>
                        </div>
                                <!-- END PROFILE CONTENT -->
					</div>
				</div>
<script>
$( "#send_info" ).hover(function() {
	$("#informacion").val($.trim($('#summernote_1').summernote('code')));
	$("#trayectoria").val($.trim($('#summernote_2').summernote('code')));
	$("#investigacion").val($.trim($('#summernote_4').summernote('code')));
	$("#cursos").val($.trim($('#summernote_5').summernote('code')));
	$("#publicaciones").val($.trim($('#summernote_6').summernote('code')));
	$("#otros").val($.trim($('#summernote_7').summernote('code')));
});

/*summernote*/
var ComponentsEditors = function () {

    var handleWysihtml5 = function () {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["<?=URL_PUBLIC?>assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }

    var handleSummernote = function () {
    $('#summernote_1').summernote({height: 300});
		$('#summernote_2').summernote({height: 300});
		$('#summernote_4').summernote({height: 300});
		$('#summernote_5').summernote({height: 300});
		$('#summernote_6').summernote({height: 300});
		$('#summernote_7').summernote({height: 300});

		/*CARGAR LA INFO AL INICIO*/
    var markupStr1 = $('#summernote_1').summernote('code','<?=$research['personales']?>');
    $( "#informacion" ).val(markupStr1);

    var markupStr2 = $('#summernote_2').summernote('code','<?=$research['trayectoria']?>');
    $( "#trayectoria" ).val(markupStr2);

    var markupStr4 = $('#summernote_4').summernote('code','<?=$research['investigaciones']?>');
    $( "#investigacion" ).val(markupStr4);

    var markupStr5 = $('#summernote_5').summernote('code','<?=$research['cursos']?>');
    $( "#cursos" ).val(markupStr5);

    var markupStr6 = $('#summernote_6').summernote('code','<?=$research['publicaciones']?>');
    $( "#publicaciones" ).val(markupStr6);

    var markupStr7 = $('#summernote_7').summernote('code','<?=$research['otros']?>');
    $( "#otros" ).val(markupStr7);

        // $('#summernote_1').summernote('destroy');
		// $('#summernote_2').summernote('destroy');
		// $('#summernote_3').summernote('destroy');
		// $('#summernote_4').summernote('destroy');
		// $('#summernote_5').summernote('destroy');
		// $('#summernote_6').summernote('destroy');
		// $('#summernote_7').summernote('destroy');
    }

    return {
        //main function to initiate the module
        init: function () {
            handleWysihtml5();
            handleSummernote();
        }
    };

}();

jQuery(document).ready(function() {
   ComponentsEditors.init();
});


$(document).ready(function() {
  $("#m-dropzone-one").dropzone({
    url: "usuarios/upload_dropzone/<?=$user_id?>",
    paramName: "file",
    maxFiles: 1,
    maxFilesize: 5, // MB
    acceptedFiles: "image/*",
    accept: function(file, done) {
        //console.log(file);
        done();
    },
    init: function() {
      this.on("success", function(statics,file) {
        var img = file.split("|");
        $('#avatar_actual').html('<center><img src="plugs/timthumb.php?src=tmp/'+img[0]+'&w=230"></center>');
      });
    }
   });
});

</script>
