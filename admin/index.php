<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 18-01-2018
 * Time: 10:22
 */

ob_start();
session_start();

require_once '../config.php';

$setting = new settings($db);
$user = new User($db);
$email = new Email($db);
$products = new Products($db);
$notification = new Notifications($db);

if ($user->is_loggedin() == true) {
    $users = $user->getOne($_SESSION['user_id']);
}

include_once './inc/head.php';

if ($user->is_loggedin() == true) {
    include_once './inc/menu.php';
};

if ($user->is_loggedin() == true && $debug == 1){
    include_once './inc/debug.php';
}

if(isset($_POST['search'])) {
    if(strlen($_POST['navn']) > 6 || strlen($_POST['navn']) < 1) {
        $error['navn'] = '<div class="alert alert-danger alert-dismissible" id="myAlert">
            <a href="#" class="close">&times;</a>
            <i class="glyphicon glyphicon-warning-sign"></i>
            Din søgning skal være mellem 1 og 6 tegn.
            </div>';
    } else {
        $user->redirect('produkter&search='.$_POST['navn'].'');
    }
}

if ($user->secCheckMethod('GET') || $user->secCheckMethod('POST')) {
    $get = $user->secGetInputArray(INPUT_GET);
    if (isset($get['side']) && !empty($get['side'])) {
        switch ($get['side']) {

            /** Hovedsider */
            case 'dashboard';
                include_once './dashboard.php';
                break;

            /** Beskeder */
            case 'beskeder';
                include_once './messages.php';
                break;
            case 'sletEmail';
                include_once './partials/deleteEmail.php';
                break;
            case 'visBesked';
                include_once './partials/singleEmail.php';
                break;

            /** Produkter */
            case 'produkter';
                include_once './products.php';
                break;
            case 'nytProdukt';
                include_once './partials/newProduct.php';
                break;
            case 'redigerProdukt';
                include_once './partials/editProduct.php';
                break;
            case 'sletProdukt';
                include_once './partials/deleteProduct.php';
                break;
            case 'produkt';
                include_once './partials/singleProduct.php';
                break;

            /** Bruger */
            case 'brugere';
                include_once './users.php';
                break;
            case 'sletBruger';
                include_once './partials/deleteUser.php';
                break;
            case 'logind';
                include_once './login.php';
                break;
            case 'logud';
                include_once './logout.php';
                break;


            /** Notifikationer */
            case 'notifikationer';
                include_once './notifications.php';
                break;
            case 'sletNotifikation';
                include_once './partials/deleteNotification.php';
                break;
            case 'visNotifikation';
                include_once './partials/singleNotification.php';
                break;
            case 'sletAlleNotifikationer';
                include_once './partials/deleteAllNotifications.php';
                break;

            default:
                header('Location: index.php?side=dashboard');
                break;
        }
    } else {
        header('Location: index.php?side=dashboard');
    }
}
if ($user->is_loggedin() == true) {
    include_once './inc/footer.php';
}
























