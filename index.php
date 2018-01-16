<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 16-11-2017
 * Time: 09:56
 */

ob_start();
session_start();

require_once './config.php';

$setting = new settings($db);
$user = new User($db);
$email = new Email($db);

include_once './inc/head.php';
include_once './inc/menu.php';

if ($user->is_loggedin() == true && $debug == 1){
    echo '<div class="debug">';
    echo '<h4><i class="fa fa-bug"></i> DEBUG MENU <i class="fa fa-bug"></i></h4>';
    echo '<p>'. print_r($_SESSION) .'</p>';
    echo '</div>';
}

if ($user->secCheckMethod('GET') || $user->secCheckMethod('POST')) {
    $get = $user->secGetInputArray(INPUT_GET);
    if (isset($get['side']) && !empty($get['side'])) {
        switch ($get['side']) {

            case 'forside';
                include_once './home.php';
                break;
            case 'omkring';
                include_once './about.php';
                break;
            case 'kontakt';
                include_once './contact.php';
                break;
            case 'logind';
                include_once './login.php';
                break;
            case 'logud';
                include_once './logout.php';
                break;
            case 'opret';
                include_once './signup.php';
                break;

            case 'joined';
                include_once './joined.php';
                break;

            case 'beskeder';
                include_once './messages.php';
                break;

            case 'sletEmail';
                include_once './deleteEmail.php';
                break;

            case 'opdater';
                include_once './update.php';
                break;

            default:
                header('Location: index.php?side=forside');
                break;
        }
    } else {
        header('Location: index.php?side=forside');
    }
}

include_once './inc/footer.php';