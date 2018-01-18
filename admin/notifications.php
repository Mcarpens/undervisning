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
            foreach($setting->getAllNotifications() as $notification) { ?>
            <tr>
                <td style="text-align: center"><strong><span class="text-<?= $notification->status ?>"><i class="<?= $notification->link ?> fa-2x"></i></span></strong></td>
                <td><?= $notification->name ?></td>
                <td><?= $notification->description ?></td>
                <td><?= $notification->timestamp ?></td>
                <td><a href="?side=sletNotifikation&id=<?= $notification->id ?>"><button class="btn btn-danger" >Slet</button></a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
</div>