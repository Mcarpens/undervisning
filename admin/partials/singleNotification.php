<?php $singleNotification = $notification->singleNotification($_GET['id']); ?>
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