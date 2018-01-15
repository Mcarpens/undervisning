<?php
if($email->deleteEmail($_GET['id']) == true) {
    $user->redirect('beskeder');
} else {
    ?>
<div class="alert alert-danger alert-dismissible" id="myAlert">
    <a href="#" class="close">&times;</a>
        <i class="glyphicon glyphicon-warning-sign"></i>
        Der skete desværre en fejl. Gå tilbage <a href="?side=beskeder">her</a> og prøv igen.
</div>
    <?php
}