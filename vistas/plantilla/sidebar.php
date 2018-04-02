<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse" id="sidebar">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
							<?php
							//include('top_sidebar.php');
							include('sidebar_condicionada.php');
							?>
                        </ul>
                    </div>
                </div>