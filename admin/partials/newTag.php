<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:04
 */

if (isset($_POST['btn_opret'])) {
    $name = strip_tags($_POST['name']);

    if ($name=="") {
        $error[] = "Angiv et navn!";
    } else {
        $blogs->newTag($_POST);
        $notification->setNewTagNotification();
        $user->redirect('tags');
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
            <li class="breadcrumb-item active">Opret et Tag</li>
        </ol>
        <?php
        if(isset($error))
        {
            foreach($error as $error)
            {
                ?>
                <div class="alert alert-danger alert-dismissible" data-dismiss="alert" id="myAlert">
                    <a href="#" class="close">&times;</a>
                    <i class="fa fa-warning"></i> &nbsp;<?php echo $error; ?>
                </div>
                <?php
            }
        }
        ?>

        <form name="contactform" action="" method="post">
            <div class="form-group">
                <label for="name">Navn</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= @$_POST['name'] ?>">
            </div>
            <div class="clearfix"></div><hr />
            <input type="submit" class="btn btn-success" value="Opret" name="btn_opret" />
        </form>
    </div>
</div>