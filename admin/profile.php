<?php

?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <!-- Main body start -->
        <div class="main-body user-profile">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-user bg-c-yellow"></i>
                                <div class="d-inline">
                                    <h4>Bruger Profil</h4>
                                    <span>Her kan du se alle dine profil oplysninger</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="?side=dashboard">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="?side=dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Profil</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <!--profile cover start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <img class="profile-bg-img img-fluid" src="assets/images/user-profile/bg-img2.jpg" alt="bg-img">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <?php var_dump($users) ?>
                                            <div class="media-left">
                                                <a href="#" class="profile-image">
                                                    <img class="user-img img-radius" src="../assets/img/users/<?= $users->avatar ?>" style="width: 100px; height: 100px" alt="user-img">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2><?= $users->firstname . ' ' . $users->lastname ?></h2>
                                                        <span class="text-white"><?php
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
                                                            ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--profile cover end-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- tab content start -->
                            <div class="tab-content">
                                <!-- tab panel personal start -->
                                <div class="tab-pane active" id="personal" role="tabpanel">
                                    <!-- personal card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-header-text">Omkring <?= $users->firstname ?></h5>
                                            <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                                <i class="icofont icofont-edit"></i>
                                            </button>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="general-info">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table m-0">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">Fulde Navn</th>
                                                                                <td><?= $users->firstname . ' ' . $users->lastname ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Brugernavn</th>
                                                                                <td><?= $users->username ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Bruger Niveau:</th>
                                                                                <td><?php
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
                                                                                    ?></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                                <div class="col-lg-12 col-xl-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th scope="row">Email</th>
                                                                                <td><a href="mailto:<?= $users->email ?> "><?= $users->email ?></a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Telefon Nummer</th>
                                                                                <td>(+45) <?= $users->phone ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Adresse</th>
                                                                                <td><?= $users->address ?></td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end of table col-lg-6 -->
                                                            </div>
                                                            <!-- end of row -->
                                                        </div>
                                                        <!-- end of general info -->
                                                    </div>
                                                    <!-- end of col-lg-12 -->
                                                </div>
                                                <!-- end of row -->
                                            </div>
                                            <!-- end of view-info -->
                                        </div>
                                        <!-- end of card-block -->
                                    </div>

                                </div>
                                <!-- tab pane personal end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main body end -->
        <div id="styleSelector">

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
