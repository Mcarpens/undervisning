<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-user bg-c-yellow"></i>
                                <div class="d-inline">
                                    <h4>Brugere</h4>
                                    <span>Her kan du se alle dine brugere i systemet</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Brugere</a>
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
                                        } else if ($users->fk_userrole == 3){
                                            $userrole = "Bruger";
                                        }
                                        ?>
                                    <tr>
                                        <td style="text-align: center"><a href="../assets/img/users/<?= $users->avatar ?>" target="_blank"><img src="../assets/img/users/thumb/<?= $users->avatar ?>" style="width: 30px; height: 30px;"></a></td>
                                        <td><?= $users->id ?></td>
                                        <td><?= $users->firstname . ' ' . $users->lastname ?></td>
                                        <td><?= $users->username ?></td>
                                        <td><?= $userrole ?></td>
                                        <td><?= $users->email ?></td>
                                        <td><?= $users->address ?></td>
                                        <td><?= $users->phone ?></td>
                                        <?php if ($users->id != 1) { ?>
                                        <td style="text-align: center"><a href="?side=sletBruger&id=<?=$users->id?>" data-toggle="tooltip" data-placement="bottom" title="Slet denne bruger"><button class="btn btn-danger" >Slet bruger</button></a></td>
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
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>