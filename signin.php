<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 13:09
 */

// Script for Creating Site Admin User //
// Only USE ONCE //

$username = 'admin@admin.dk';
$firstname = 'admin';
$lastname = 'admin';
$passwordAdmin = 'admin';


$options  = array('cost' => 12);
$password = password_hash($passwordAdmin, PASSWORD_BCRYPT, $options);

if(!$username('INSERT INTO users (username, firstname, lastname, password, fk_userrole)VALUES(:username, :firstname, :lastname, :password, :fk_userrole);',
                        array(
                            ':username' => $username,
                            ':firstname' => $firstname,
                            ':lastname' => $lastname,
                            ':password' => $password,
                            ':fk_userrole' => 1
                        ))
                    ){
    $error['userCreate'] = 'Fejl ved oprettelse af Admin bruger. Prøv igen';
}else{
    $success = 'Din Site Admin bruger er nu oprettet!';
    header('Refresh:5;url=./index.php?p=login');
}
