<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 17-01-2018
 * Time: 09:54
 */

$product = $products->singleProduct($_GET['id']);

if(isset($_POST['btn_send'])) {
    $error = [];
    if(empty($_POST['name'])) {
        $error['name'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
<a href=\"#\" class=\"close\">&times;</a>
<i class=\"glyphicon glyphicon-warning-sign\"></i>
Udfyld venligst et navn.
</div>";
    }

    if(empty($_POST['price'])) {
        $error['price'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
<a href=\"#\" class=\"close\">&times;</a>
<i class=\"glyphicon glyphicon-warning-sign\"></i>
Udfyld venligst prisen.
</div>";
    }

    if(empty($_POST['description'])) {
        $error['description'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
<a href=\"#\" class=\"close\">&times;</a>
<i class=\"glyphicon glyphicon-warning-sign\"></i>
Udfyld venligst beskrivelsen.
</div>";
    }

    if(sizeof($error) == 0) {
        if($products->editProduct($_POST) == true){
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
    <a href="#" class="close">&times;</a>
    <i class="glyphicon glyphicon-warning-sign"></i>
    Produktet '.$_POST['name'].' er redigeret!
</div>';
            $product = $products->singleProduct($_GET['id']);
        }
    }
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
            <li class="breadcrumb-item active">Rediger Produktet: <?= @$product->name ?></li>
        </ol>
        <?=@$success?>
        <form name="contactform" action="" method="post">
            <input type="hidden" value="<?= @$product->id ?>" name="id">
            <div class="form-group">
                <label for="name">Navn</label>
                <?=@$error['name']?>
                <input type="text" name="name" id="name" class="form-control" value="<?= @$product->name ?>">
            </div>

            <div class="form-group">
                <label for="price">Pris</label>
                <?=@$error['price']?>
                <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="<?= @$product->price ?>">
            </div>

            <div class="form-group">
                <label for="description">Beskrivelse</label>
                <?=@$error['description']?>
                <textarea class="form-control" id="description" name="description" rows="3"><?= @$product->description ?></textarea>
            </div>

            <input type="submit" class="btn btn-success" value="Opdater" name="btn_send" />
        </form>
    </div>
</div>

