<?php
if($user->is_loggedin() !== "") {
    $user->redirect('index.php');
}

if(isset($_SESSION['username']) && $_SESSION['username'] !== "") {

    echo 'Velkommen! <b>'.@$_SESSION['username'].'</b>';

} else if(isset($_SESSION['tmp']['username']) && $_SESSION['tmp']['username'] !== "") {
    
    if($user->doLogin($_SESSION['tmp']['username'], $_SESSION['tmp']['password'])) {
        unset($_SESSION['tmp']);
        echo 'Velkommen! <b>'.@$_SESSION['username'].'</b>';
    } else {
        echo 'Der skete en fejl i login.';
    }

} else {

    $user->redirect('logind');

}