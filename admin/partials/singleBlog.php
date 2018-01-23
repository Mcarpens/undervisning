<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:37
 */
$blog = $blogs->singleBlog($_GET['id']);
$author = $user->getOne($blog->fk_author);
$category = $blogs->getCategory($blog->fk_category);
$tags = $blogs->getTags($blog->fk_tags);

if ($author->fk_userrole == 1) {
    $userrole = "Super Admin";
} else if ($author->fk_userrole == 2) {
    $userrole = "Admin";
}
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid -align-center">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nyhed: <?= $blog->id ?></li>
        </ol>

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?= $blog->title ?></h1>

        <!-- Author -->
        <p class="lead">
            af <?= $author->firstname . ' ' . $author->lastname . ' <small>(' . $userrole . ')</small>'; ?>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-user"></span> Publiceret: <?= $blog->timestamp ?></p>
        <p><span class="glyphicon glyphicon-time"></span> Tags: <span class="label label-default"><?= $tags->name ?></span></p>
        <p><span class="glyphicon glyphicon-category"></span> Kategori: <?= $category->name ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="../assets/img/blogs/<?= $blog->images ?>" style="width: 600px; height: auto;" alt="">

        <hr>

        <!-- Post Content -->
        <div class="col-md-6">
            <p class="lead"><?= $blog->text ?></p>
        </div>
        <hr>
        <a href="?side=nyheder" class="btn btn-outline-primary" style="margin-bottom: 25px;"> Gå tilbage</a>
    </div>
</div>
