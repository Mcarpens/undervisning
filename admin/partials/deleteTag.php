<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:07
 */
$blogs->deleteTag($_GET['id']);
$notification->setDeleteTagNotification();
$user->redirect('tags');
