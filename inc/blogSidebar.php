<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 12:47
 */

?>
<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Søgning</h4>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Søg efter nyheder" aria-label="Søg efter nyheder" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button"> <span class="fa fa-search"></span></button>
            </div>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Tags:</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <?php foreach ($blogs->getAllTags() as $sidebar) { ?>
                    <li>
                        <a href="?side=tags&id=<?= $sidebar->id ?>"><span class="label label-default"><?= $sidebar->name ?></span></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /.row -->
