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

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Navn</th>
                <th scope="col">Beskrivelse</th>
                <th scope="col">Tidspunkt</th>
                <th scope="col">Handling</th>
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
                <td>
                    <a href="?side=visNotifikation&id=<?= $notifications->id ?>"><button class="btn btn-primary" >Vis</button></a>
                    <a href="?side=sletNotifikation&id=<?= $notifications->id ?>"><button class="btn btn-danger" >Slet</button></a>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="col-md-12 offset-5" style="margin-bottom: 15px;">
            <a href="?side=sletAlleNotifikationer" id="delete_all_notifications" class="btn btn-outline-danger">Slet Alle Notifikationer</a>
        </div>
    </div>
</div>