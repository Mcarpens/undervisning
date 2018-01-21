<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 12:43
 */

ob_start();
session_start();

require_once '../config.php';

$setting = new settings($db);
$user = new User($db);
$notification = new Notifications($db);

if(isset($_POST['btn-login']))
{
    $username = strip_tags($_POST['txt_uname_email']);
    $password = strip_tags($_POST['txt_password']);

    if($user->doLogin($username,$password) == true)
    {
        $notification->setLoginUserNotificaitonAdminSuccess();
        $user->redirect('./index.php?side=dashboard');
    }
    else if($user->doLogin($username, $password) == false)
    {
        $error = "Forkerte oplysninger!";
    }
}

$user->destroyToken();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?> - Administrations Panel</title>
    <!-- Bootstrap core CSS-->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <!--    <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>-->
    <link href="./assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="./assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin.css" rel="stylesheet">

    <link href="./assets/custom.css">

    <script src="./assets/main.js"></script>
</head>
<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="text-align: center"><?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?> - Administrations Panel</div>
        <div class="card-body">

        <form class="form-signin" method="post" id="login-form">
            <input type="hidden" name="token" value="<?php echo $user->getToken() ?>">
            <h2 class="form-signin-heading" style="text-align: center">Log Ind</h2><hr />

            <div id="error">
                <?php
                if(isset($error))
                {
                    ?>
                    <div class="alert alert-danger alert-dismissible" id="myAlert">
                        <a href="#" class="close">&times;</a>
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<?php echo $error; ?>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="txt_uname_email" placeholder="Brugernavn eller E-mail" value="<?= @$_POST['txt_uname_email'] ?>" required />
                <span id="check-e"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="txt_password" placeholder="Din adgangskode" requried />
            </div>

            <hr />

            <div class="form-group">
                <button type="submit" name="btn-login" class="btn btn-success btn-block">
                    <i class="fa fa-sign-in-alt"></i> &nbsp; LOG IND
                </button>
            </div>

        </form>
            <div class="text-center">
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="./assets/vendor/chart.js/Chart.min.js"></script>
<script src="./assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="./assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="./assets/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="./assets/js/sb-admin-datatables.min.js"></script>
<script src="./assets/js/sb-admin-charts.min.js"></script>
</body>

</html>