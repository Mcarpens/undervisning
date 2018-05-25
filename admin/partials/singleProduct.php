<?php $singleProd = $products->singleProduct($_GET['id']); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-shopping-cart bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Visning af produktet : <?= $singleProd->id ?></h4>
                                    <span>Dette er en fuld visning af den valgte produkt.</span>
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
                                    <li class="breadcrumb-item"><a href="?side=webshop">Webshop</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!"><?= $singleProd->name ?></a>
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
                                    <h4 style="color: black"><?= $singleProd->name ?></h4>
                                    <span class="z-depth-top-0" style="width: 130px"><img src="../assets/img/produkter/<?= $singleProd->image ?>" width="100" height="auto" style="margin: 15px"></span>
                                    <span><?= $singleProd->description ?></span>
                                    <span>Produkt ID: <?= $singleProd->id ?></span>
                                    <span>Produkt Pris: <?= $singleProd->price ?> DKK.</span>
                                    <span>Produkt Nr: <?= $singleProd->product_number ?></span>
                                    <span>Produkt Lagerstatus: <?= $singleProd->stock ?> Stk.</span>
                                    <span>Produkt Højde: <?= $singleProd->height ?> Cm.</span>
                                    <span>Produkt Længde: <?= $singleProd->length ?> Cm.</span>
                                    <span>Produkt på Udsalg: <?php if($singleProd->on_sale == 1) { echo 'JA'; } else { echo 'NEJ';} ?></span>
                                    <span>Produkt Udsalspris: <?= $singleProd->sale_price ?> DKK.</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option" style="width: 35px;">
                                            <li class=""><i class="icofont icofont-simple-left"></i></li>
                                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                                            <li><a href="?side=redigerProdukt&id=<?= $singleProd->id ?>"><i class="icofont icofont-edit full-card"></i></a></li>
                                            <li><a href="?side=sletProdukt&id=<?= $singleProd->id ?>"><i class="icofont icofont-error close-card"></i></a></li>
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