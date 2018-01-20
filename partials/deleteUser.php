<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 17-01-2018
 * Time: 11:33
 */
$user->deleteUser($_GET['id']);
$notification->setDeleteUserNotification();
$user->doLogout();
$user->redirect('forside');
