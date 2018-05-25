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
                                    <h4>Produkter</h4>
                                    <span>Her kan du se alle dine produkter i webshoppen</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="?side=dashbord">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="?side=dashbord">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Produkter</a>
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
                                <div class="dt-responsive table-responsive">
                                    <table id="new-cons" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" role="grid">
                                        <thead>
                                            <tr>
                                                <th scope="col">Thumbnail</th>
                                                <th scope="col">Navn</th>
                                                <th scope="col">Pris</th>
                                                <th scope="col">Lager status</th>
                                                <th scope="col">Vare nummer</th>
                                                <th scope="col">Farve</th>
                                                <th scope="col">Beskrivelse</th>
                                                <th scope="col">Handling</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($products->allProducts() as $product) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center"><a href="../assets/img/produkter/<?= $product->image ?>" target="_blank"><img src="../assets/img/produkter/<?= $product->image ?>" style="width: 30px; height: 30px;"></a></td>
                                                <td><?= $product->name ?></td>
                                                <td>
                                                    <?php if($product->on_sale == 1) {
                                                        echo '<strike>' . $product->price . '</strike>';
                                                        echo '<br>';
                                                        echo $product->sale_price;
                                                    } else {
                                                        echo $product->price;
                                                    } ?>
                                                </td>
                                                <td><?= $product->stock ?></td>
                                                <td><?= $product->product_number ?></td>
                                                <td style="text-align: center">
                                                    <?php $data = $products->getBlobs($product->id);
                                                    foreach ($data as $color) { $singleColor = $products->getMoreColors($color->color_id);?>
                                                        <img src="../assets/img/farver/<?= $singleColor[0]->cimage ?>" width="16x" height="16x" title="<?= $singleColor[0]->cname ?>"> &nbsp;
                                                    <?php } ?>
                                                </td>
                                                <td><?php $description = strip_tags($product->description) ; echo strlen($description) ? substr($description, 0 ,50). ' <a href="?side=produkt&id=' . $product->id . '" class="view_prod_link">[...]</a> ' : $description ?></td>
                                                <td style="text-align: center">
                                                    <a href="?side=produkt&id=<?=$product->id?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Vis produkt"><i class="ti-new-window"></i> </button></a>
                                                    <a href="?side=redigerProdukt&id=<?=$product->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger produkt"><i class="ti-pencil-alt"></i> </button></a>
                                                    <a href="?side=sletProdukt&id=<?=$product->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet produkt"><i class="ti-na"></i> </button></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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