<?php $emails = $email->singleEmail($_GET['id']); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-email bg-c-pink2"></i>
                                <div class="d-inline">
                                    <h4>Visning af beskeden : <?= $emails->id ?></h4>
                                    <span>Dette er en fuld visning af den valgte besked.</span>
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
                                    <li class="breadcrumb-item"><a href="?side=beskeder">Beskeder</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!"><?= $emails->name ?></a>
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
                                    <h4 class="text-<?= $emails->status ?>"><i class="<?= $emails->link ?>"></i> <?= $emails->name ?></h4>
                                    <span><?= $emails->message ?></span>
                                    <span>Notifikations ID: <?= $emails->id ?></span>
                                    <span><?= date('d-m-Y, H:i', strtotime($emails->timestamp)) ?></span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option" style="width: 35px;">
                                            <li class=""><i class="icofont icofont-simple-left"></i></li>
                                            <li><i class="icofont icofont-maximize full-card"></i></li>
                                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                                            <li><a href="?side=sletNotifikation&id=<?= $emails->id ?>"><i class="icofont icofont-error close-card"></i></a></li></li>
                                        </ul>
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
        <h3><?= $emails->name ?></h3>
        <p>Email: <?= $emails->email ?></p>
        <p>Tidspunkt: <?= $emails->timestamp ?></p>
        <hr>
        <p><?= $emails->message ?></p>
        <a href="./index.php?side=beskeder" class="btn btn-outline-primary"> Se alle beskeder</a>
    </div>
</div>