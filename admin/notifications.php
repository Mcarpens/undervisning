<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-bell bg-c-green2"></i>
                                <div class="d-inline">
                                    <h4>Notifikationer</h4>
                                    <span>Her kan du se alle dine notifikationer i systemet</span>
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
                            <th scope="col">Status</th>
                            <th scope="col">Navn</th>
                            <th scope="col">Beskrivelse</th>
                            <th scope="col">Tidspunkt</th>
                            <th scope="col" style="text-align: center">Handling</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($notification->getAllNotifications() as $notifications) { ?>
                        <tr>
                            <td style="text-align: center"><strong><span class="text-<?= $notifications->status ?>"><i class="<?= $notifications->link ?>"></i></span></strong></td>
                            <td><?= $notifications->name ?></td>
                            <td><?= $notifications->description ?></td>
                            <td><?= $notifications->timestamp ?></td>
                            <td style="text-align: center">
                                <a href="?side=visNotifikation&id=<?= $notifications->id ?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Vis notifikation">Vis</button></a>
                                <a href="?side=sletNotifikation&id=<?= $notifications->id ?>" data-toggle="tooltip" data-placement="bottom" title="Slet notifikation"><button class="btn btn-danger" >Slet</button></a>
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
        <div class="col-md-12 offset-5" style="margin-bottom: 15px;">
            <a href="?side=sletAlleNotifikationer" id="delete_all_notifications" class="btn btn-outline-danger">Slet Alle Notifikationer</a>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>
</div>
</div>
</div>