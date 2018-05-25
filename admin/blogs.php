<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-book bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Nyheder</h4>
                                    <span>Her kan du se alle dine nyheder i systemet.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Nyheder</a>
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
                                                <th scope="col" style="text-align: center">Thumbnail</th>
                                                <th scope="col">Navn</th>
                                                <th scope="col">Skribent</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Tags</th>
                                                <th scope="col">Tidspunkt</th>
                                                <th scope="col">Tekst</th>
                                                <th scope="col" style="text-align: center">Handling</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($blogs->getAllBlogs() as $blog) {
                                                $author = $user->getOne($blog->fk_author);
                                                $category = $blogs->getCategory($blog->fk_category);
                                                $tags = $blogs->getTags($blog->fk_tags);
                                                ?>
                                                <tr>
                                                    <td style="text-align: center"><a href="../assets/img/blogs/<?= $blog->images ?>" target="_blank"><img src="../assets/img/blogs/thumb/<?= $blog->images ?>" class="img-thumbnail" height="30" width="30"></a></td>
                                                    <td><?= $blog->title ?></td>
                                                    <td><?= $author->firstname . ' ' . $author->lastname ?></td>
                                                    <td><?= $category->name ?></td>
                                                    <td><?= $tags->name ?></td>
                                                    <td><?= $blog->timestamp ?></td>
                                                    <td><?= strlen($blog->text) ? substr($blog->text,"0", "50") : $blog->text ?></td>
                                                    <td style="text-align: center">
                                                        <a href="?side=nyhed&id=<?=$blog->id?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Vis nyhed"><i class="ti-new-window"></i> </button></a>
                                                        <a href="?side=redigerNyhed&id=<?=$blog->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger nyhed"><i class="ti-pencil-alt"></i> </button></a>
                                                        <a href="?side=sletNyhed&id=<?=$blog->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet nyhed"><i class="ti-na"></i> </button></a>
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