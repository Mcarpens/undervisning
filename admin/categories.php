<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-book bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Kategorier</h4>
                                    <span>Her kan du se alle ategorier til dine nyheder.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Kategorier</a>
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
                                                <th scope="col">Navn</th>
                                                <th scope="col" style="text-align: center">Handling</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($blogs->getAllCategory() as $cat) { ;?>
                                            <tr>
                                                <td><?= $cat->name ?></td>
                                                <td style="text-align: center">
                                                    <a href="?side=redigerKategori&id=<?=$cat->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger kategori"><i class="ti-pencil-alt"></i> </button></a>
                                                    <a href="?side=sletKategori&id=<?=$cat->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet kategori"><i class="ti-na"></i> </button></a>
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