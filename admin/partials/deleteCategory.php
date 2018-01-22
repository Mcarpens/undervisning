<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 22-01-2018
 * Time: 11:52
 */

$blogs->deleteCategory($_GET['id']);
$notification->setDeleteCategoryNotification();
$user->redirect('kategorier');