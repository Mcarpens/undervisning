<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 10:58
 */
?>
<div class="container">
    <div class="row" style="margin-top: 25px">
        <?php foreach ($blogs->getAllBlogs() as $blog) { ?>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img" src="./assets/img/blogs/<?= $blog->images ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $blog->title ?></h5>
                    <p class="card-text"><?= substr($blog->text, 0, 100) ?>[...]</p>
                    <a href="?side=nyhed&id=<?= $blog->id ?>" class="btn btn-primary">Se mere</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>