<!----------------------->
<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.php" class="standard-logo" data-dark-logo="./assets/img/logo-new.png"><img src="./assets/img/logo.png" alt="Canvas Logo"></a>
                    <a href="index.php" class="retina-logo" data-dark-logo="./assets/img/logo-dark@2x.png"><img src="./assets/img/logo@2x.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <?php
                        foreach ($setting->getAllMenu() as $menu) {
                            echo '<li>';
                            echo '<a href="./index.php?side=' . $menu->link . '">' . $menu->name . '</a>';
                            echo '</li>';
                        }
                        ?>
                        <li>
                            <a href="#">
                                <div>
                                    <?php
                                    if($user->is_loggedin() === TRUE) {
                                        foreach ($user->getAll() as $u){
                                            if ($u->fk_userrole == 1) {
                                                $userrole = "Super Admin";
                                            }
                                            else if ($u->fk_userrole == 2) {
                                                $userrole = "Admin";
                                            }
                                            else if ($u->fk_userrole == 3) {
                                                $userrole = "Medarbejder";
                                            }
                                            if ($u->id === $_SESSION['user_id']) {
                                                echo '<img src="./assets/img/users/' . $users->avatar . '" style="width: 25px; height: 25px;" class="rounded Responsive image"> ' . $u->username;
                                            }
                                        }
                                    } else {
                                        echo 'Log Ind';
                                    }
                                    ?>
                                </div>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">
                                        <?php
                                        if($user->secCheckLevel() >= 50) {
                                            echo '<li><a class="dropdown-item" href="index.php?side=profil"><i class="fa fa-user"></i> Profil</a></li>';
                                        }

                                        if($user->secCheckLevel() >= 90) {
                                            echo '<li><a class="dropdown-item" href="./admin/index.php?side=dashboard"><i class="fab fa-connectdevelop"></i> Admin CP</a></li>';
                                        }

                                        if($user->is_loggedin() === TRUE) {
                                            echo '<div class="dropdown-divider"></div>';
                                            echo '<li><a class="dropdown-item" href="index.php?side=logud"><i class="fas fa-sign-out-alt"></i>Log ud</a></li>';
                                        } else {
                                            echo '<li><a class="dropdown-item" href="index.php?side=logind"><i class="fas fa-sign-in-alt"></i> Log ind</a></li>';
                                            echo '<div class="dropdown-divider"></div>';
                                            echo '<li><a class="dropdown-item" href="index.php?side=opret"><i class="fas fa-user-plus"></i> Opret en bruger</a></li>';
                                        }
                                        ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart">
                        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>1</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Indkøbskurv</h4>
                            </div>
                            <div class="top-cart-items">
                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a href="#"><img src="./assets/img/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a href="#">Blue Round-Neck Tshirt</a>
                                        <span class="top-cart-item-price">$19.99</span>
                                        <span class="top-cart-item-quantity">x 2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="top-cart-action clearfix">
                                <span class="fleft top-checkout-price">114.95 DKK</span>
                                <button class="button button-3d button-small nomargin fright">Se Kurv</button>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Skriv &amp; Tryk Enter..">
                        </form>
                    </div><!-- #top-search end -->

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->