<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 20-01-2018
 * Time: 14:22
 */

if ($user->is_loggedin() == false) {
    header("Location: login.php");
} else {
    if ($user->secCheckLevel() == 50) {
        header("Location: ../index.php?side=forside");
    }
}
$user->sessionTimeout();