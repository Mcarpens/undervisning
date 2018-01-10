<?php
print_r($_SESSION['tmp']);
if($user->doLogin($_SESSION['tmp']['username'], $_SESSION['tmp']['password'])) {
    unset($_SESSION['tmp']);
    print_r($_SESSION);
    echo '<br>';
    echo 'Velkommen! '.@$_SESSION['username'].'';
}

