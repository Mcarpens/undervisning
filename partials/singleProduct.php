<?php $singleProd = $products->singleProduct($_GET['id']); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 25px">
            <img src="<?= $singleProd->image ?>" style="height: 250px; width: auto;" alt="Placeholder Image">
            <h3><?= $singleProd->name ?></h3>
            <p>Pris: <?= $singleProd->price ?></p>
            <p>Varenummer: <?= $singleProd->product_number ?></p>
            <hr>
            <p><?= $singleProd->description ?></p>
        </div>
        <div class="col-md-12">
            <a href="./index.php?side=produkter" class="btn btn-outline-primary">Gå tilbage</a>
        </div>
    </div>
</div>