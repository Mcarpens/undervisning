<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 18-01-2018
 * Time: 10:22
 */

// Start session & overbuffer //
ob_start();
session_start();

// Require configfilen //
require_once '../config.php';

// Instantiering af klasser //
$setting = new settings($db);
$user = new User($db);
$email = new Email($db);
$products = new Products($db);
$notification = new Notifications($db);
$blogs = new Blogs($db);

// Require vores session fil //
require_once './inc/session.php';

// Hvis vi er logget ind, fetch vores user id //
// inkludere vores head fil //
if ($user->is_loggedin() == true) {
    $users = $user->getOne($_SESSION['user_id']);
    include_once './inc/head.php';
    include_once './inc/menu.php';
    if ($debug == 1) {
        include_once './inc/debug.php';
    }
}

// Vores Søgefelt i top menuen, så vi kan søge på vores produkter //
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

// Håndter vores undersider via en switch case //
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

            /** Blogs-Nyheder */
            case 'nyheder';
                include_once './blogs.php';
                break;
            case 'opretNyhed';
                include_once './partials/newBlog.php';
                break;
            case 'sletNyhed';
                include_once './partials/deleteBlog.php';
                break;
            case 'redigerNyhed';
                include_once './partials/editBlog.php';
                break;
            case 'nyhed';
                include_once './partials/singleBlog.php';
                break;

            /** Blog - Kategorier */
            case 'opretKategori';
                include_once './partials/newCategory.php';
                break;
            case 'kategorier';
                include_once './categories.php';
                break;
            case 'sletKategori';
                include_once './partials/deleteCategory.php';
                break;
            case 'redigerKategori';
                include_once './partials/editCategory.php';
                break;

            /** Blog - Tags */
            case 'tags';
                include_once './tags.php';
                break;
            case 'redigerTag';
                include_once './partials/editTag.php';
                break;
            case 'sletTag';
                include_once './partials/deleteTag.php';
                break;
            case 'opretTag';
                include_once './partials/newTag.php';
                break;

            /** Bruger */
            case 'brugere';
                include_once './users.php';
                break;
            case 'sletBruger';
                include_once './partials/deleteUser.php';
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
// inkludere vores footer hvis logget ind
if ($user->is_loggedin() == true) {
    include_once './inc/footer.php';
}
























