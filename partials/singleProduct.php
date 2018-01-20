<?php $singleProd = $products->singleProduct($_GET['id']); ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Produktet: <?= $singleProd->name ?></li>
        </ol>

        <img src="https://placehold.it/350x150" alt="Placeholder Image">
        <h3><?= $singleProd->name ?></h3><br>
        <p>Pris: <?= $singleProd->price ?></p><br>
        <p>Varenummer: <?= $singleProd->product_number ?></p><br>
        <hr>
        <p><?= $singleProd->description ?></p>
    </div>
</div>