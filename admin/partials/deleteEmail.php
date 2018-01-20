<?php

$email->deleteEmail($_GET['id']);
$notification->setMessageDeleteNotification();
$user->redirect('beskeder');
