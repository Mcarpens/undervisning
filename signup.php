<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 13:09
 */

if(isset($_POST['btn-signup']))
{
    $firstname = strip_tags($_POST['txt_fname']);
    $lastname = strip_tags($_POST['txt_lname']);
    $username = strip_tags($_POST['txt_uname']);
    $password = strip_tags($_POST['txt_upass']);

    if ($firstname=="") {
        $error[] = "Angiv et fornavn !";
    }
    else if ($lastname=="") {
        $error[] = "Angiv et efternavn !";
    }
    else if($username=="")	{
        $error[] = "Angiv et brugernavn !";
    }
    else if($password=="")	{
        $error[] = "Angiv en adgangskode!";
    }
    else if(strlen($password) < 4){
        $error[] = "Adgangskoden skal mindst være på 4 karaktere";
    }

    else
    {
        try
        {
            $stmt = $user->checkUsername($username);
            if($stmt == false) {
                if($user->register($firstname, $lastname, $username, $password) == true){
                    $notification->setNewUserNotification();
                    $user->redirect('logind');
                }
            }
            else
            {
                $error[] = "Brugernavnet er allerede i brug !";
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>

<!-- Page Title
    ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Ny Konto</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Ny Konto</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_two_third col_last nobottommargin">


                <h3>Har du ikke en konto endnu? Opret en her!</h3>

                <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">
                    <?php
                    if(isset($error))
                    {
                        foreach($error as $error)
                        {
                            ?>
                            <div class="alert alert-danger alert-dismissible" data-dismiss="alert" id="myAlert">
                                <a href="#" class="close">&times;</a>
                                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<?php echo $error; ?>
                            </div>
                            <?php
                        }
                    }
                    else if(isset($_GET['joined']))
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-check"></i> &nbsp;Registreringen er gemmeført, <a href='?joined'>log ind</a> her
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col_half">
                        <label for="register-form-name">Fornavn:</label>
                        <input type="text" id="register-form-name" name="txt_fname" value="<?= @$_POST['txt_fname'] ?>" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-phone">Efternavn:</label>
                        <input type="text" id="register-form-phone" name="txt_lname" value="<?= @$_POST['txt_lname'] ?>" class="form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-username">Brugernavn:</label>
                        <input type="text" id="register-form-username" name="txt_uname" value="<?= @$_POST['txt_uname'] ?>" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-password">Adgangskode:</label>
                        <input type="password" id="register-form-password" name="txt_upass" value="<?= @$_POST['txt_uname'] ?>" class="form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="register-form-submit" name="btn-signup" value="register">Opret bruger</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</section><!-- #content end -->