<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 12:43
 */

if(isset($_POST['btn-login']))
{
    $username = strip_tags($_POST['txt_uname_email']);
    $password = strip_tags($_POST['txt_password']);

    if($user->doLogin($username,$password))
    {
        $user->redirect('index.php');
    }
    else
    {
        $error = "Forkerte oplysninger !";
    }
}

$user->destroyToken();