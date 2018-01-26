<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 26-01-2018
 * Time: 12:09
 */

$comments->deleteComment($_GET['id']);
$notification->setDeleteCommentNotification();
$user->redirect('kommentarer');