<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 15:40
 */

$blogs->deleteBlog($_GET['id']);
$notification->setDeleteBlogNotification();
$user->redirect('nyheder');