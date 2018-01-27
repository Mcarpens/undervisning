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
                            <th scope="col">Id</th>
                            <th scope="col">Navn</th>
                            <th scope="col">Tidspunkt</th>
                            <th scope="col">Blog Navn</th>
                            <th scope="col">Tekst</th>
                            <th scope="col" style="text-align: center">Handling</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($comments->getAllComments() as $com) {
                            $author = $user->getOne($com->fk_user);
                            $blog = $blogs->singleBlog($com->fk_blog);
                            ?>
                            <tr>
                                <td><?= $com->id ?></td>
                                <td>
                                    <?php
                                    if ($com->fk_user ==  "") {
                                        echo $com->name . ' (Ingen bruger)';
                                    } else {
                                        echo $author->firstname . ' ' . $author->lastname . ' (logget ind)';
                                    }
                                    ?>
                                </td>
                                <td><?= $com->timestamp ?></td>
                                <td><?= $blog->title ?></td>
                                <td><?= substr($com->text, "0", "50") ?></td>
                                <td style="text-align: center">
                                    <a href="?side=sletKommentar&id=<?= $com->id ?>" data-toggle="tooltip" data-placement="bottom" title="Slet kommentar"><button class="btn btn-danger" > Slet</button></a>
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
