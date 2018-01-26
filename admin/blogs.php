<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nyheder</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-newspaper-o"></i> Nyheder</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">Thumbnail</th>
                                <th scope="col">Navn</th>
                                <th scope="col">Skribent</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Kommentarer</th>
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
//                                $comment = $comments->rowCountCommentsFromBlog($blog->id);
//                                var_dump($comment);
                                ?>
                                <tr>
                                    <td style="text-align: center"><a href="../assets/img/blogs/<?= $blog->images ?>" target="_blank"><img src="../assets/img/blogs/<?= $blog->images ?>" class="img-thumbnail" height="30" width="30"></a></td>
                                    <td><?= $blog->title ?></td>
                                    <td><?= $author->firstname . ' ' . $author->lastname ?></td>
                                    <td><?= $category->name ?></td>
                                    <td><?= $tags->name ?></td>
<!--                                    <td>-->
<!--                                        --><?php //foreach($comments->rowCountCommentsFromBlog($blog->id) as $row) {
//                                            if ($row->fk_blog == $blog->id) {
//                                                echo $row;
//                                            }
//                                        }
//                                        ?>
<!--                                    </td>-->
                                    <td><?= $blog->timestamp ?></td>
                                    <td><?= substr($blog->text,"0", "100") ?></td>
                                    <td style="text-align: center">
                                        <a href="?side=nyhed&id=<?=$blog->id?>"><button class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Vis nyhed"><i class="fa fa-external-link"></i> </button></a>
                                        <a href="?side=redigerNyhed&id=<?=$blog->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger nyhed"><i class="fa fa-edit"></i> </button></a>
                                        <a href="?side=sletNyhed&id=<?=$blog->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet nyhed"><i class="fa fa-ban"></i> </button></a>
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



