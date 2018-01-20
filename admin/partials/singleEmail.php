<?php $emails = $email->singleEmail($_GET['id']); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Besked: <?= $emails->id ?></li>
        </ol>

        <h3><?= $emails->name ?></h3>
        <p>Email: <?= $emails->email ?></p>
        <p>Tidspunkt: <?= $emails->timestamp ?></p>
        <hr>
        <p><?= $emails->message ?></p>
        <a href="./index.php?side=beskeder" class="btn btn-outline-primary"> Se alle beskeder</a>
    </div>
</div>