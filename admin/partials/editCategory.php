<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 08:31
 */

$cat = $blogs->getCategory($_GET['id']);

if(isset($_POST['btn_edit'])) {

    $name = strip_tags($_POST['name']);

    $blogs->editCategory($_POST);
    $notification->setEditBlogNotification();
    $user->redirect('kategorier');

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
            <li class="breadcrumb-item active">Rediger: <?= $cat->name ?></li>
        </ol>
        <form name="contactform" action="" method="post">
            <input type="hidden" name="id" value="<?= $cat->id ?>">

            <div class="form-group">
                <label for="name">Titel</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $cat->name ?>">
            </div>

            <div class="clearfix"></div><hr />
            <input type="submit" class="btn btn-success" value="Rediger" name="btn_edit" />
        </form>
    </div>
</div>