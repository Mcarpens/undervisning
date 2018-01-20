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
        <table class="table">
            <thead class="thead-dark">
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
            <?php foreach($user->getAll() as $users) { ?>
            <tr>
                <td><a href="../assets/img/users/<?= $users->avatar ?>" target="_blank"><img src="../assets/img/users/<?= $users->avatar ?>" style="width: 30px; height: 30px;"></a></td>
                <td><?= $users->id ?></td>
                <td><?= $users->firstname . ' ' . $users->lastname ?></td>
                <td><?= $users->username ?></td>
                <td><?= $users->fk_userrole ?></td>
                <td><?= $users->email ?></td>
                <td><?= $users->address ?></td>
                <td><?= $users->phone ?></td>
                <?php if ($users->id != 1) { ?>
                <td><a href="?side=sletBruger&id=<?=$users->id?>"><button class="btn btn-danger" >Slet</button></a></td>
                <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>