<?php if ( ! defined( 'URL_APP' ) ) { exit; } ?>
<div class="panel panel-right panel-reveal">
    <div class="line"></div>

    <div class="user-banner">
        <span class="ava-box">
            <img src="<?=FW7?>assets/img/tmp/ava3.jpg" alt="">
        </span>
    </div>

    <div class="welcome-msg">
        <h3>Eduardo Aguado Meza</h3>
        <h4>Estado de cuenta del usuario</h4>
    </div>

    <div class="list-block mt-15">
        <div class="list-group">
            <nav>
                <ul>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Profile</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="settings.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-cog"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Settings</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Messages</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">I Like It</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.html" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Friends</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a  onclick="salir();" href="javascript:void(0)" class="item-link close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-sign-out"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">Salir</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="list-group mt-20">
            <nav>
                <ul>
                    <li>
                        <a href="#" class="item-link item-primary close-panel item-content">
                            <div class="item-media">
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="item-inner">
                                <div class="item-title">About APP/Website</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

</div>