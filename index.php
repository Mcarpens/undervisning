<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 16-11-2017
 * Time: 09:56
 */

// Start sessions //
ob_start(); // Over buffering start (RAM)
session_start();

// Require config filen //
require_once './config.php';

// Instantisering af objekterne //
$setting = new Settings($db);
$user = new User($db);
$email = new Email($db);
$products = new Products($db);
$notification = new Notifications($db);
$blogs = new Blogs($db);
$comments = new Comments($db);
$minKurv = new Basket();
$payments = new Payments($db);
//$update = new Update();
$search = new Search($db);

// Sæt indstiliinger her, så de kan kaldes på hele siden //
foreach ($setting->getAllSettings() as $settings);

// Hvis du er logget ind, hent brugerens oplysninger med session //
if ($user->is_loggedin() == true) {
    $users = $user->getOne($_SESSION['user_id']);
}

// Sætter vores indkøbskurv igang //
$quantity = 0;
foreach ($minKurv->VisKurv() as $key => $value){
    $quantity = $quantity + $value['antal'];
}

// Inkludere head og menu filerne fra inc mappen //
include_once './inc/head.php';
include_once './inc/menu.php';

// Hvis du er logget ind, så vis debug menuen, hvis sat til //
if ($user->is_loggedin() == true && $debug == 1){
    include_once './inc/debug.php';
}

// Vores switchcase til alle vores undersider //
// Vi tjekker på URL og POST inputs, for at sanitize det //
if ($user->secCheckMethod('GET') || $user->secCheckMethod('POST')) {
    // GET håndtere vores inputs //
    $get = $user->secGetInputArray(INPUT_GET);
    // Laver url'en om til ?side= //
    if (isset($get['side']) && !empty($get['side'])) {
        switch ($get['side']) {

            /** Hovedsider */
            case 'forside';
                include_once './home.php';
                break;
            case 'omkring';
                include_once './about.php';
                break;
            case 'kontakt';
                include_once './contact.php';
                break;
            case 'opdater';
                include_once './update.php';
                break;
            case '404';
                include_once './404.php';
                break;
            case 'soegning';
                include_once './search.php';
                break;

            /** Produkter */
            case 'webshop';
                include_once './products.php';
                break;
            case 'produkt';
                include_once './partials/singleProduct.php';
                break;
            case 'search';
                include_once './search.php';
                break;
            case 'kurv';
                include_once './inc/basket.php';
                break;
            case 'checkud';
                include_once './inc/checkout.php';
                break;

            /** Brugere */
            case 'sletBruger';
                include_once './partials/deleteUser.php';
                break;
            case 'redigerBruger';
                include_once './partials/editUser.php';
                break;
            case 'profil';
                include_once './profile.php';
                break;
            case 'opret';
                include_once './signup.php';
                break;
            case 'logind';
                include_once './login.php';
                break;
            case 'logud';
                include_once './logout.php';
                break;

            /** Blogs-Nyheder */
            case 'nyheder';
                include_once './blogs.php';
                break;
            case 'nyhed';
                include_once './partials/singleBlog.php';
                break;

            /** Default rollback */
            default:
                header('Location: index.php?side=404');
                break;
        }
    /** Hvis url inputtet er skrevet forkert, rollback til denne */
    } else {
        header('Location: index.php?side=forside');
    }
}

// Inkludere vores footer fil fra inc mappen //
include_once './inc/footer.php';