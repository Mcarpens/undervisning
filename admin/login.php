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

$setting = new Settings($db);
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
    <title>GURU Able - Premium Admin Template </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="./assets/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="./assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="./assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">


</head>

<body class="fix-menu">
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <form class="md-float-material" method="post" action="#">
                        <div class="text-center">
                            <img src="./assets/images/auth/logo_new.png" width="170" height="30" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Log Ind</h3>
                                </div>
                            </div>
                            <hr/>
                            <div class="input-group">
                                <input type="text" class="form-control" name="txt_uname_email" placeholder="Brugernavn">
                                <span class="md-line"></span>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" name="txt_password" placeholder="Adgangskode">
                                <span class="md-line"></span>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" name="btn-login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Log ind</button>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-left m-b-0">Log ind på dit administrations panel.</p>
                                    <p class="text-inverse text-left"><b>Carpens Systems, PMV</b></p>
                                </div>
                                <div class="col-md-2">
                                    <img src="../assets/img/favicon.png" width="45" height="45" alt="small-logo.png">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="./assets/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="./assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="./assets/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="./assets/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="./assets/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="./assets/js/common-pages.js"></script>
</body>

</html>
