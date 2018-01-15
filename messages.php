<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 15-01-2018
 * Time: 09:13
 */

?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Navn</th>
        <th scope="col">Email</th>
        <th scope="col">Besked</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if($user->secCheckLevel() >= 90) {
        foreach($email->getAllEmails() as $emails) { ?>
    <tr>
        <td><?= $emails->name ?></td>
        <td><?= $emails->email ?></td>
        <td><?= $emails->message ?></td>
    </tr>
        <?php }
    }
    ?>
    </tbody>
</table>