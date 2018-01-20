<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="./index.php?side=dashboard"><?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?> - Administrations Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-user-circle"></i>
                    <span class="nav-link-text">Hej, <?= $users->firstname . ' ' . $users->lastname ?> </span>
                </a>
            </li>
            <?php foreach ($setting->getAllAdminMenu() as $settings) { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?= $settings->name ?>">
                    <a class="nav-link" href="./index.php?side=<?= $settings->link ?>">
                        <i class="<?= $settings->icon ?>"></i>
                        <span class="nav-link-text"><?= $settings->name ?></span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Produkter">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-product-hunt"></i>
                    <span class="nav-link-text">Produkter</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="./index.php?side=produkter">Alle Produkter</a>
                    </li>
                    <li>
                        <a href="./index.php?side=nytProdukt">Nyt Produkter</a>
                    </li>
                </ul>
            </li>
            <?php if ($user->secCheckLevel() == 99) { ?>
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Opdater">
                <a class="nav-link" href="../index.php?side=opdater">
                    <i class="fa fa-refresh"></i>
                    <span class="nav-link-text">Opdater</span>
                </a>
            </li>
            <?php } ?>
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">-->
<!--                <a class="nav-link" href="index.html">-->
<!--                    <i class="fa fa-fw fa-dashboard"></i>-->
<!--                    <span class="nav-link-text">Dashboard</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">-->
<!--                <a class="nav-link" href="charts.html">-->
<!--                    <i class="fa fa-fw fa-area-chart"></i>-->
<!--                    <span class="nav-link-text">Charts</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">-->
<!--                <a class="nav-link" href="tables.html">-->
<!--                    <i class="fa fa-fw fa-table"></i>-->
<!--                    <span class="nav-link-text">Tables</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">-->
<!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">-->
<!--                    <i class="fa fa-fw fa-wrench"></i>-->
<!--                    <span class="nav-link-text">Components</span>-->
<!--                </a>-->
<!--                <ul class="sidenav-second-level collapse" id="collapseComponents">-->
<!--                    <li>-->
<!--                        <a href="navbar.html">Navbar</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="cards.html">Cards</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">-->
<!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">-->
<!--                    <i class="fa fa-fw fa-file"></i>-->
<!--                    <span class="nav-link-text">Example Pages</span>-->
<!--                </a>-->
<!--                <ul class="sidenav-second-level collapse" id="collapseExamplePages">-->
<!--                    <li>-->
<!--                        <a href="login.html">Login Page</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="register.html">Registration Page</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="forgot-password.html">Forgot Password Page</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="blank.html">Blank Page</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">-->
<!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">-->
<!--                    <i class="fa fa-fw fa-sitemap"></i>-->
<!--                    <span class="nav-link-text">Menu Levels</span>-->
<!--                </a>-->
<!--                <ul class="sidenav-second-level collapse" id="collapseMulti">-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>-->
<!--                        <ul class="sidenav-third-level collapse" id="collapseMulti2">-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Item</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Item</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Item</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">-->
<!--                <a class="nav-link" href="#">-->
<!--                    <i class="fa fa-fw fa-link"></i>-->
<!--                    <span class="nav-link-text">Link</span>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="d-lg-none">Beskeder
              <span class="badge badge-pill badge-primary"><?= $email->rowCountEmail() ?></span>
            </span>
                    <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">Seneste beskeder:</h6>
                    <div class="dropdown-divider"></div>
                    <?php
                    foreach ($email->getLatestEmail() as $emails) {
                    ?>
                    <a class="dropdown-item" href="?side=visBesked&id=<?= $emails->id ?>">
                        <strong><?= $emails->name ?></strong>
                        <span class="small float-right text-muted"><?= $emails->timestamp ?></span>
                        <div class="dropdown-message small"><?= $emails->message ?></div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a class="dropdown-item small" href="./index.php?side=beskeder">Se alle beskeder</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Notifikationer
              <span class="badge badge-pill badge-warning"><?= $notification->rowCountNotifications() ?></span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Nyeste Notifikationer:</h6>
                    <div class="dropdown-divider"></div>
                    <?php
                    foreach ($notification->getLastesNotifications() as $notifications) {
                        ?>
                        <a class="dropdown-item" href="?side=visNotifikation&id=<?= $notifications->id ?>">
                            <span class="text-<?= $notifications->status ?>">
                              <strong><i class="<?= $notifications->link ?>"></i> <?= $notifications->name ?></strong>
                            </span>
                            <span class="small float-right text-muted"><?= $notifications->timestamp ?></span>
                            <div class="dropdown-message small"><?= $notifications->description ?></div>
                        </a>
                    <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a class="dropdown-item small" href="./index.php?side=notifikationer">Se alle notifikationer</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Søg efter...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php?side=forside">
                    <i class="fa fa-home"></i> Front-end</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>