<?php
foreach ($setting->getAllSettings() as $set);
if(isset($_POST['btn_update'])) {

    $fileUploader = new FileUploader("../assets/img/");
    $newfile = $fileUploader->fileUploadEdit($_FILES['footer_logo'], 250, 250);
    unlink('../assets/img/' . $set->footer_logo);
    unlink('../assets/img/thumb/' .$set->footer_logo);

    $error = [];
    if(empty($_POST['site_name'])) {
        $error['site_name'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst et side titlen.
                            </div>";
    }

    if(empty($_POST['address'])) {
        $error['address'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst adressen.
                            </div>";
    }

    if(empty($_POST['city'])) {
        $error['city'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst byen.
                            </div>";
    }

    if(empty($_POST['country'])) {
        $error['country'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst landet.
                            </div>";
    }

    if(empty($_POST['phone'])) {
        $error['phone'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst telefon nummeret.
                            </div>";
    }

    if(empty($_POST['email'])) {
        $error['email'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst emailen.
                            </div>";
    }

    if(empty($_POST['footer_description'])) {
        $error['footer_description'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst beskrivelsen.
                            </div>";
    }

    if(empty($_POST['theme'])) {
        $error['theme'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Vælg venligst et tema.
                            </div>";
    }

    if(sizeof($error) == 0) {
        if($setting->updateSettings($_POST, $newfile['filename']) == true){
            $notification->setUpdateSettingsNotificationSuccess();
            echo '<div data-type="success" data-animation-in="animated flipInX" data-animation-out="animated flipOutX" >Dine indstillinger er blevet gemt!</div>';
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Dine indstillinger er blevet opdateret!
                            </div>';
            $_POST = array();
//            $user->redirect('indstillinger');
        }
    }
}
?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ti-settings bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>CMS - Indstillinger</h4>
                                    <span>Her kan du foretage ændringer i de generelle indstillinger til CMS'et.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="?side=forside">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="?side=forside">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Indstillinger</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->
                        <div class="page-body">
                            <?=@$success?>
                            <?php foreach ($setting->getAllSettings() as $settings); { ?>
                                <form name="contactform" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $settings->id ?>" >
                                    <div class="form-group">
                                        <label for="name">Side Titel</label>
                                        <?=@$error['site_name']?>
                                        <input type="text" name="site_name" id="site_name" class="form-control" value="<?= $settings->site_name ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Adresse</label>
                                        <?=@$error['address']?>
                                        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" value="<?= $settings->address ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="city">By</label>
                                        <?=@$error['city']?>
                                        <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" value="<?= $settings->city ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Land</label>
                                        <?=@$error['country']?>
                                        <input type="text" class="form-control" id="country" name="country" aria-describedby="emailHelp" value="<?= $settings->country ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Telefon</label>
                                        <?=@$error['phone']?>
                                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" value="<?= $settings->phone ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Email</label>
                                        <?=@$error['email']?>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= $settings->email ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="footer_description">Footer Beskrivelse</label>
                                        <?=@$error['footer_description']?>
                                        <textarea class="form-control" id="footer_description" name="footer_description" rows="3"><?= $settings->footer_description ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="theme">Tema Vælger</label>
                                        <?= @$error['theme'] ?>
                                        <select class="form-control" id="theme" name="theme">
                                            <?php foreach ($setting->getThemes() as $theme) { ?>
                                                <option value="<?= $theme->id ?>"><?= $theme->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!-- Image upload card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Billede Upload</h5><br>
                                            <img src="../assets/img/thumb/<?= $settings->footer_logo ?>" id="image" class="img-thumbnail" height="100" width="auto">
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block">
                                            <div class="sub-title"><?php
                                                if (empty($settings->footer_logo)) {
                                                    echo 'Vælg et billede';
                                                } else {
                                                    echo @$settings->footer_logo;
                                                }
                                                ?></div>
                                            <input type="file" name="footer_logo" id="filer_input" multiple="multiple">
                                        </div>
                                    </div>
                                    <!-- Image upload card end -->
                                    <div class="input-group">
                                        <input type="submit" style="position: fixed; right: 0.5%; bottom: 0.5%; margin-bottom: 15px; z-index: 5" class="btn btn-success float-right" value="Opdater" name="btn_update" />
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>