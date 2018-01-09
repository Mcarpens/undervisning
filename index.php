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

$setting = new Settings($db);
$user = new User($db);

include_once './inc/head.php';
include_once './inc/menu.php';

print_r($_SESSION);

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
                include_once './signin.php';
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