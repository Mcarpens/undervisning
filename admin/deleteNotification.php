<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 18-01-2018
 * Time: 17:11
 */

$setting->deleteNotification($_GET['id']);
$user->redirect('notifikationer');