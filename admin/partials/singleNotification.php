<?php $singleNotification = $notification->singleNotification($_GET['id']); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-bell bg-c-green2"></i>
                                <div class="d-inline">
                                    <h4>Visning af notifikationen : <?= $singleNotification->id ?></h4>
                                    <span>Dette er en fuld visning af den valgte notifikation.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.php?side=dashboard">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="?side=dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="?side=notifikationer">Notifikationer</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!"><?= $singleNotification->name ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-<?= $singleNotification->status ?>"><i class="<?= $singleNotification->link ?>"></i> <?= $singleNotification->name ?></h4>
                                    <span><?= $singleNotification->description ?></span>
                                    <span>Notifikations ID: <?= $singleNotification->id ?></span>
                                    <span><?= date('d-m-Y, H:i', strtotime($singleNotification->timestamp)) ?></span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option" style="width: 35px;">
                                            <li class=""><i class="icofont icofont-simple-left"></i></li>
                                            <li><i class="icofont icofont-maximize full-card"></i></li>
                                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                                            <li><a href="?side=sletNotifikation&id=<?= $singleNotification->id ?>"><i class="icofont icofont-error close-card"></i></a></li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>




<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Notification: <?= $singleNotification->id ?></li>
        </ol>

        <h3><?= $singleNotification->name ?></h3>
        <p>Status: <strong><span class="text-<?= $singleNotification->status ?>"><i class="<?= $singleNotification->link ?>"></i> <?= $singleNotification->status ?></span></strong></p>
        <p>Tidspunkt: <?= $singleNotification->timestamp ?></p>
        <hr>
        <p><?= $singleNotification->description ?></p>
        <a href="./index.php?side=notifikationer" class="btn btn-outline-primary"> Se alle notifikationer</a>
    </div>
</div>