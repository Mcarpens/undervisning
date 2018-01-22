<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nyheder</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-list"></i> Kategorier</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Navn</th>
                            <th scope="col" style="text-align: center">Handling</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($blogs->getAllCategory() as $cat) { ;?>
                            <tr>
                                <td><?= $cat->name ?></td>
                                <td style="text-align: center">
                                    <a href="?side=redigerKategori&id=<?=$cat->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger nyhed"><i class="fa fa-edit"></i> </button></a>
                                    <a href="?side=sletKategori&id=<?=$cat->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet nyhed"><i class="fa fa-ban"></i> </button></a>
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

