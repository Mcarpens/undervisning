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
                                    <h4>Beskeder</h4>
                                    <span>Her kan du se alle dine beskeder i systemet</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Beskeder</a>
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
                                            <th scope="col">Email</th>
                                            <th scope="col">Besked</th>
                                            <th scope="col">Tidspunkt</th>
                                            <th scope="col" style="text-align: center">Handling</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($email->getAllEmails() as $emails) { ?>
                                            <tr>
                                                <td><?= $emails->name ?></td>
                                                <td><?= $emails->email ?></td>
                                                <td><?= $emails->message ?></td>
                                                <td><?= $emails->timestamp ?></td>
                                                <td style="text-align: center">
                                                    <a href="?side=visBesked&id=<?= $emails->id ?>" data-toggle="tooltip" data-placement="bottom" title="Slet produkt"><button class="btn btn-primary"> Vis</button></a>
                                                    <a href="?side=sletEmail&id=<?= $emails->id ?>" data-toggle="tooltip" data-placement="bottom" title="Slet besked"><button class="btn btn-danger" > Slet</button></a>
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