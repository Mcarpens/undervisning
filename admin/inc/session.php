<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 20-01-2018
 * Time: 14:22
 */

if ($user->is_loggedin() == "") {
    header("Location: login.php");
}