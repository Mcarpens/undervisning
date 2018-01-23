<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:01
 */

$tag = $blogs->getTags($_GET['id']);

if(isset($_POST['btn_edit'])) {

    $name = strip_tags($_POST['name']);

    $blogs->editTag($_POST);
    $notification->setEditTagNotification();
    $user->redirect('tags');

}
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Rediger: <?= $tag->name ?></li>
        </ol>
        <form name="contactform" action="" method="post">
            <input type="hidden" name="id" value="<?= $tag->id ?>">

            <div class="form-group">
                <label for="name">Titel</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $tag->name ?>">
            </div>

            <div class="clearfix"></div><hr />
            <input type="submit" class="btn btn-success" value="Rediger" name="btn_edit" />
        </form>
    </div>
</div>