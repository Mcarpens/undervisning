<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Produkter</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-users"></i> Brugere</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th scope="col">Navn</th>
                        <th scope="col">Pris</th>
                        <th scope="col">Vare nummer</th>
                        <th scope="col">Beskrivelse</th>
                        <th scope="col">Handling</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['search'])) {
                        foreach($products->searchProduct($_GET['search']) as $product) { ?>
                            <tr>
                                <td><?= $product->name ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= $product->product_number ?></td>
                                <td><?= $product->description ?></td>
                                <td>
                                    <a href="?side=produkt&id=<?=$product->id?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Vis produkt"><i class="fa fa-external-link"></i> </button></a>
                                    <a href="?side=redigerProdukt&id=<?=$product->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger produkt"><i class="fa fa-edit"></i> </button></a>
                                    <a href="?side=sletProdukt&id=<?=$product->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet produkt"><i class="fa fa-ban"></i> </button></a>
                                </td>
                            </tr>
                        <?php }
                    } else {
                        foreach($products->allProducts() as $product) { ?>
                            <tr>
                                <td><?= $product->name ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= $product->product_number ?></td>
                                <td><?= $product->description ?></td>
                                <td style="text-align: center">
                                    <a href="?side=produkt&id=<?=$product->id?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Vis produkt"><i class="fa fa-external-link"></i> </button></a>
                                    <a href="?side=redigerProdukt&id=<?=$product->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger produkt"><i class="fa fa-edit"></i> </button></a>
                                    <a href="?side=sletProdukt&id=<?=$product->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet produkt"><i class="fa fa-ban"></i> </button></a>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>



