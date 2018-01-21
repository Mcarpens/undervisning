<?php
$blog = $blogs->singleBlog($_GET['id']);
$author = $user->getOne($blog->fk_author);
$category = $blogs->getCategory($blog->fk_category);
$tags = $blogs->getTags($blog->fk_tags);

if ($author->fk_userrole == 1) {
    $userrole = "Super Admin";
} else if ($author->fk_userrole == 2) {
    $userrole = "Admin";
} else {
    $userrole = "Anonymous";
}
?>
<!-- Page Content -->
<div class="container">

    <div class="row" style="margin-top: 25px;">

        <!-- Blog Post Content Column -->
        <div class="col-md-8">

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
            <img class="img-responsive" src="./assets/img/blogs/<?= $blog->images ?>" style="width: 600px; height: auto;" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?= $blog->text ?></p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well" style="margin-bottom: 25px">
                <h4>Skriv en kommentar:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>

            <!--            <hr>-->

            <!-- Posted Comments -->

            <!-- Comment -->
            <!--            <div class="media">-->
            <!--                <a class="pull-left btn-lg" href="#">-->
            <!--                    <span class="glyphicon glyphicon-comment"></span>-->
            <!--                </a>-->
            <!--                <div class="media-body">-->
            <!--                    <h4 class="media-heading">User One says:-->
            <!--                        <small>August 25, 2014 at 9:30 PM</small>-->
            <!--                    </h4>-->
            <!--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.-->
            <!--                </div>-->
            <!--            </div>-->

            <!-- Comment -->
            <!--            <div class="media">-->
            <!--                <a class="pull-left btn-lg" href="#">-->
            <!--                    <span class="glyphicon glyphicon-comment"></span>-->
            <!--                </a>-->
            <!--                <div class="media-body">-->
            <!--                    <h4 class="media-heading">User Two says:-->
            <!--                        <small>August 25, 2014 at 9:30 PM</small>-->
            <!--                    </h4>-->
            <!--                    Cras sit amet nibh libero, in gravida nulla.-->
            <!---->
            <!--                </div>-->
            <!--            </div>-->

        </div>
        <?php include_once './inc/blogSidebar.php'; ?>
