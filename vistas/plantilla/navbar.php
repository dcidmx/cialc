<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?=URL_APP?>">
                            <img height="30px" src="assets/images/framedev.svg" class="logo-default"> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->

							<?php //include('notificaciones.php'); ?>

                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img id="avatar_top" alt="" class="img-circle" src="plugs/timthumb.php?src=<?=$avatar_usr_circ?>&w=32&h=32&a=t" />
                                    <span class="username username-hide-on-mobile">
										<div id="name_top" tooltip="<?=strtolower($credenciales_top['rol'])?>"><?=$usuario_name?></div>
										<!--<span style="font-variant: small-caps; font-size:1em;"><?=strtolower($credenciales_top['rol'])?></span>-->
									</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <?php
									if($this->tiene_permiso('Usuarios|perfil')){
									?>
									<li>
                                        <a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>usuarios/perfil');">
                                            <i class="icon-user"></i> Mi perfil </a>
                                    </li>
									<?php
									}
									?>
									<?php
									if($this->tiene_permiso('Usuarios|index')){
									?>
                                    <li>
                                        <a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>usuarios');">
                                            <i class="fa fa-users"></i> Control de usuarios </a>
                                    </li>
									<?php
									}
									?>
									<?php
									if($this->tiene_permiso('Controllers|index')){
									?>
                                    <li>
                                        <a href="javascript:void(0)" onclick="carga_archivo('contenedor_principal','<?=URL_APP?>controllers');">
                                            <i class="fa fa-gamepad"></i> Controladores </a>
                                    </li>
									<?php
									}
									?>

                                    <li class="divider"> </li>
                                    <!--<li>
                                        <a href="page_user_lock_1.html">
                                            <i class="icon-lock"></i> Bloquear sesión </a>
                                    </li>-->
									<?php
									if(isset($_SESSION['token'])){
									?>
									<li>
										<a  href="<?=URL_APP?>login/lockSession">
											<i class="icon-lock"></i>
											Bloquear
										</a>
									</li>
									<li>
										<a  href="<?=URL_APP?>site" target="_blank">
											<i class="icon-globe"></i>
											Site
										</a>
									</li>
									<li>
										<a onclick="salir();" href="javascript:void(0)">
											<i class="icon-key"></i>
											Salir
										</a>
									</li>
									<?php
									}
									?>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
			<!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
