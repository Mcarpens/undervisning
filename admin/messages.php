<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Beskeder</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-envelope"></i> Beskeder</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
