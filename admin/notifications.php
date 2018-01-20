<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Notifikationer</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bell"></i> Notifikationer</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <td style="text-align: center"><strong><span class="text-<?= $notifications->status ?>"><i class="<?= $notifications->link ?> fa-2x"></i></span></strong></td>
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
        <div class="col-md-12 offset-5" style="margin-bottom: 15px;">
            <a href="?side=sletAlleNotifikationer" id="delete_all_notifications" class="btn btn-outline-danger">Slet Alle Notifikationer</a>
        </div>
    </div>
</div>