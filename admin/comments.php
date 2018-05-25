<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-speech-comments bg-c-yellow"></i>
                                <div class="d-inline">
                                    <h4>Kommentarer</h4>
                                    <span>Her kan du se alle dine kommentarer i systemet.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Kommentarer</a>
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
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>