<?php

?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Brugere</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-users"></i> Brugere</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Avatar</th>
                                <th scope="col">ID</th>
                                <th scope="col">Navn</th>
                                <th scope="col">Brugernavn</th>
                                <th scope="col">Niveau</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Telefon</th>
                                <th scope="col">Handling</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php foreach($user->getAll() as $users) {
                        if ($users->fk_userrole == 1) {
                            $userrole = "Super Admin";
                        } else if ($users->fk_userrole == 2) {
                            $userrole = "Admin";
                        } else ($users->fk_userrole == 3){
                            $userrole = "Bruger"
                        }
                        ?>
                    <tr>
                        <td style="text-align: center"><a href="../assets/img/users/<?= $users->avatar ?>" target="_blank"><img src="../assets/img/users/<?= $users->avatar ?>" style="width: 30px; height: 30px;"></a></td>
                        <td><?= $users->id ?></td>
                        <td><?= $users->firstname . ' ' . $users->lastname ?></td>
                        <td><?= $users->username ?></td>
                        <td><?= $userrole ?></td>
                        <td><?= $users->email ?></td>
                        <td><?= $users->address ?></td>
                        <td><?= $users->phone ?></td>
                        <?php if ($users->id != 1) { ?>
                        <td style="text-align: center"><a href="?side=sletBruger&id=<?=$users->id?>" data-toggle="tooltip" data-placement="bottom" title="Slet denne bruger"><button class="btn btn-danger" ><i class="fa fa-user-times"></i></button></a></td>
                        <?php } else { ?>
                            <td style="text-align: center; font-weight: 500;" <span style="text-decoration: underline">Kan ikke slettes</span></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>