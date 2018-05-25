<body>
<!-- Pre-loader start -->
<!--<div class="theme-loader">-->
<!--    <div class="ball-scale">-->
<!--        <div class='contain'>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--            <div class="ring">-->
<!--                <div class="frame"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <a class="mobile-search morphsearch-search" href="#">
                        <i class="ti-search"></i>
                    </a>
                    <a href="./index.php?side=dashboard">
                        <img class="img-fluid" src="../assets/img/<?php foreach ($setting->getAllSettings() as $settings) {echo $settings->footer_logo;} ?>" width="200">
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <!-- themify icon -->
                                <i class="ti-search"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <a href="#!">
                                <i class="ti-bell"></i>
                                <?php foreach ($notification->getLastesNotifications() as $notifications) {
                                    if (strtotime($notifications->timestamp) > strtotime('-3 hours') ) {
                                        echo '<span class="badge bg-c-green"></span>';
                                    }
                                } ?>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6 style="color: black">Notifikationer</h6>
                                    <span class="badge badge-success" style="margin-top: -10px"><?= $notification->rowCountNotifications() ?></span>
                                </li>
                                <?php
                                foreach ($notification->getLastesNotifications() as $notifications) {
                                ?>
                                <li>
                                    <div class="media">
                                        <a href="?side=visNotifikation&id=<?= $notifications->id ?>">
                                            <i class="<?= $notifications->link ?>"></i>
                                            <div class="media-body">
                                                <h5 class="notification-user"><?= $notifications->name ?></h5>
                                                <p class="notification-msg"><?= $notifications->name ?></p>
                                                <span class="notification-time"><?= date('d-m/Y, H:i', strtotime($notifications->timestamp)) ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="header-notification">
                            <a href="#!" class="displayChatbox">
                                <i class="ti-email"></i>
                                <?php foreach ($email->getLatestEmail() as $emails) {
                                    if( strtotime($emails->timestamp) > strtotime('-3 hours') ) {
                                        echo '<span class="badge bg-c-pink"></span>';
                                    }
                                } ?>
                            </a>
                            <ul class="show-notification">
                                <li>
                                    <h6 style="color: black">Beskeder</h6>
                                    <span class="badge badge-danger" style="margin-top: -10px"><?= $email->rowCountEmail() ?></span>
                                </li>
                                <?php
                                foreach ($email->getLatestEmail() as $emails) {
                                    ?>
                                    <li>
                                        <div class="media">
                                            <a href="?side=visBesked&id=<?= $emails->id ?>">
                                                <div class="media-body">
                                                    <h5 class="notification-user"><?= $emails->name ?></h5>
                                                    <p class="notification-msg"><?= $emails->message ?></p>
                                                    <span class="notification-time"><?= date('d-m/y, H:i', strtotime($emails->timestamp)) ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="../assets/img/users/thumb/<?= $users->avatar ?>" class="img-radius" alt="User-Profile-Image">
                                <span><?= $users->firstname . ' ' . $users->lastname ?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="?side=indstillinger">
                                        <i class="ti-settings"></i> Indstillinger
                                    </a>
                                </li>
                                <li>
                                    <a href="?side=profil">
                                        <i class="ti-user"></i> Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="../index.php?side=forside">
                                        <i class="ti-home"></i> Front-End
                                    </a>
                                </li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#exampleModal">
                                        <i class="ti-layout-sidebar-left"></i> Log ud
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- search -->
                    <div id="morphsearch" class="morphsearch">
                        <form class="morphsearch-form">
                            <input class="morphsearch-input" type="search" placeholder="Search..." />
                            <button class="morphsearch-submit" type="submit">Search</button>
                        </form>
                        <div class="morphsearch-content">
                            <div class="dummy-column">
                                <h2>People</h2>
                                <a class="dummy-media-object img-radius" href="#!">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="Sara Soueidan" />
                                    <h3>Sara Soueidan</h3>
                                </a>
                                <a class="dummy-media-object img-radius" href="#!">
                                    <img src="assets/images/avatar-2.jpg" class="img-radius" alt="Shaun Dona" />
                                    <h3>Shaun Dona</h3>
                                </a>
                            </div>
                            <div class="dummy-column">
                                <h2>Popular</h2>
                                <a class="dummy-media-object img-radius" href="#!">
                                    <img src="assets/images/avatar-3.jpg" class="img-radius" alt="PagePreloadingEffect" />
                                    <h3>Page Preloading Effect</h3>
                                </a>
                                <a class="dummy-media-object img-radius" href="#!">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="DraggableDualViewSlideshow" />
                                    <h3>Draggable Dual-View Slideshow</h3>
                                </a>
                            </div>
                            <div class="dummy-column">
                                <h2>Recent</h2>
                                <a class="dummy-media-object img-radius" href="#!">
                                    <img src="assets/images/avatar-2.jpg" class="img-radius" alt="TooltipStylesInspiration" />
                                    <h3>Tooltip Styles Inspiration</h3>
                                </a>
                                <a class="dummy-media-object img-radius" href="#!">
                                    <img src="assets/images/avatar-3.jpg" class="img-radius" alt="NotificationStyles" />
                                    <h3>Notification Styles Inspiration</h3>
                                </a>
                            </div>
                        </div>
                        <!-- /morphsearch-content -->
                        <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                    </div>
                    <!-- search end -->
                </div>
            </div>
        </nav>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                            <div class="main-menu-header">
                                <img class="img-40 img-radius" src="../assets/img/users/thumb/<?= $users->avatar ?>" alt="<?= $users->firstname ?>">
                                <div class="user-details">
                                    <span><?= $users->firstname . ' ' . $users->lastname ?></span>
                                    <span id="more-details"><?php
                                        if ($users->fk_userrole == 1) {
                                            $userrole = "Super Admin";
                                        }
                                        else if ($users->fk_userrole == 2) {
                                            $userrole = "Admin";
                                        }
                                        else if ($users->fk_userrole == 3) {
                                            $userrole = "Medarbejder";
                                        }
                                        echo $userrole;
                                        ?><i class="ti-angle-down"></i></span>
                                </div>
                            </div>

                            <div class="main-menu-content">
                                <ul>
                                    <li class="more-details">
                                        <a href="?side=profil"><i class="ti-user"></i>Profil</a>
                                        <a href="?side=indstillinger"><i class="ti-settings"></i>Indstillinger</a>
                                        <a href="../index.php?side=forside"><i class="ti-home"></i>Front-End</a>
                                        <a href="" data-toggle="modal" data-target="#exampleModal"><i class="ti-layout-sidebar-left"></i>Log ud</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
<!--                        <div class="pcoded-search">-->
<!--                            <span class="searchbar-toggle">  </span>-->
<!--                            <div class="pcoded-search-box ">-->
<!--                                <input type="text" placeholder="Search">-->
<!--                                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <?php foreach ($setting->getAllAdminMenu() as $settings) { ?>
                                <li title="<?= $settings->name ?>">
                                    <a href="./index.php?side=<?= $settings->link ?>">
                                        <span class="pcoded-micon"><i class="<?= $settings->icon ?>"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main"><?= $settings->name ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.blog">Nyheder</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-book"></i></span>
                                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.blogs">Nyheder</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="./index.php?side=nyheder">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.allBlogs">Alle nyheder</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=opretNyhed">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.newBlog">Opret Nyhed</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>

                                    <li class=" ">
                                        <a href="./index.php?side=kategorier">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.allCategories">Alle Kategorier</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=opretKategori">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.newCategory">Opret Kategori</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>

                                    <li class=" ">
                                        <a href="./index.php?side=tags">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.allTag">Alle Tags</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=opretTag">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.newTag">Opret Tag</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element">Webshop</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="pcoded-hasmenu">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-shopping-cart"></i></span>
                                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.webshop">Webshop</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class=" ">
                                        <a href="./index.php?side=webshopIndstillinger">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.webshopSettings">Indstillinger</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <?php foreach ($setting->getAllWebshopSettings() as $webshop) {
                                        echo '';
                                    }
                                    if ($webshop->shop_online == 1) { ?>
                                    <li class=" ">
                                        <a href="./index.php?side=shop_MereInfo">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.webshopInfo">Informationer</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=produkter">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.allProducts">Alle Produkter</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=nytProdukt">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.newProduct">Opret Produkt</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=farver">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.webshopProducts">All Farver</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="./index.php?side=nyFarve">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.webshopColors">Opret Ny Farver</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                        <?php if ($user->secCheckLevel() == 99) { ?>
                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.settings">Indstillinger</div>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class=" ">
                                    <a href="./index.php?side=indstillinger">
                                        <span class="pcoded-micon"><i class="ti-settings"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.webshopSettings">CMS Indstillinger</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="" data-toggle="modal" data-target="#exampleModal2">
                                        <span class="pcoded-micon"><i class="ti-reload"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.webshopSettings">Opdater</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    <?php } ?>
                </nav>