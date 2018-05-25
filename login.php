<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 12:43
 */

if(isset($_POST['btn-login']))
{
    $username = strip_tags($_POST['txt_uname_email']);
    $password = strip_tags($_POST['txt_password']);

    if($user->doLogin($username,$password) == true)
    {
        $notification->setLoginUserNotificaitonAdminSuccess();
        $user->redirect('profil');
    }
    else if($user->doLogin($username, $password) == false)
    {
        $error = "Forkerte oplysninger!";
    }
}

$user->destroyToken();
?>

<!-- Content
    ============================================= -->
<section id="content">

    <div class="content-wrap nopadding">

        <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('assets/img/parallax/home/1.jpg') center center no-repeat; background-size: cover;"></div>

        <div class="section nobg full-screen nopadding nomargin">
            <div class="container vertical-middle divcenter clearfix">

                <div class="row center" style="margin-bottom: 10px">
                    <a href="index.php"><img src="./assets/img/<?= $settings->footer_logo ?>" alt="Logo"></a>
                </div>

                <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                    <div class="panel-body" style="padding: 40px;">
                        <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                            <input type="hidden" name="token" value="<?php echo $user->getToken() ?>">
                            <h3>Logind på din konto</h3>

                            <div class="col_full">
                                <label for="login-form-username">Brugernavn:</label>
                                <input type="text" id="login-form-username" name="txt_uname_email" value="" class="form-control not-dark" />
                            </div>

                            <div class="col_full">
                                <label for="login-form-password">Adgangskode:</label>
                                <input type="password" id="login-form-password" name="txt_password" value="" class="form-control not-dark" />
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" id="login-form-submit" name="btn-login"  value="login">Logind</button>
<!--                                <a href="#" class="fright">Forgot Password?</a>-->
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row center dark"><small>&copy; <?= date('Y') ?>, Carpens Systems, PMV. Alle Rettigheder Overholdt</small></div>

            </div>
        </div>

    </div>

</section><!-- #content end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>