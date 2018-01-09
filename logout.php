<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 13:02
 */

session_destroy();
unset($_SESSION['user_session']);
header('Location: index.php');
return true;