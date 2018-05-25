<?php

if(isset($_POST['btn_update_more_info_1'])) {
    $error = [];

    if(empty($_POST['title'])) {
        $error['title'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst titlen.
                            </div>";
    }

    if(empty($_POST['icon'])) {
        $error['icon'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Skriv venligst et ikon. Du skal skrive shortcodes. (Eks: icon-thumbs-up)
                            </div>";
    }

    if(sizeof($error) == 0) {
        if($setting->updateWebshopMoreInfo($_POST) == true){
            $notification->setUpdateSettingsNotificationSuccess();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                           Felt 1, er blevet opdateret!
                            </div>';
            $_POST = array();
        }
    }
} else if(isset($_POST['btn_update_more_info_2'])) {
    $error = [];

    if(empty($_POST['title'])) {
        $error['title'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst et side titlen.
                            </div>";
    }

    if(empty($_POST['icon'])) {
        $error['icon'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Skriv venligst et ikon. Du skal skrive shortcodes. (Eks: icon-thumbs-up)
                            </div>";
    }

    if(sizeof($error) == 0) {
        if($setting->updateWebshopMoreInfo($_POST) == true){
            $notification->setUpdateSettingsNotificationSuccess();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Felt 2, er blevet opdateret!
                            </div>';
            $_POST = array();
        }
    }
} else if(isset($_POST['btn_update_more_info_3'])) {
    $error = [];

    if(empty($_POST['title'])) {
        $error['title'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst et side titlen.
                            </div>";
    }

    if(empty($_POST['icon'])) {
        $error['icon'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Skriv venligst et ikon. Du skal skrive shortcodes. (Eks: icon-thumbs-up)
                            </div>";
    }

    if(sizeof($error) == 0) {
        if($setting->updateWebshopMoreInfo($_POST) == true){
            $notification->setUpdateSettingsNotificationSuccess();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Felt 3, er blevet opdateret!
                            </div>';
            $_POST = array();
        }
    }
} else if(isset($_POST['btn_update_more_info_4'])) {
    $error = [];

    if(empty($_POST['title'])) {
        $error['title'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Udfyld venligst et side titlen.
                            </div>";
    }

    if(empty($_POST['icon'])) {
        $error['icon'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
                            <a href=\"#\" class=\"close\">&times;</a>
                            <i class=\"glyphicon glyphicon-warning-sign\"></i>
                            Skriv venligst et ikon. Du skal skrive shortcodes. (Eks: icon-thumbs-up)
                            </div>";
    }

    if(sizeof($error) == 0) {
        if($setting->updateWebshopMoreInfo($_POST) == true){
            $notification->setUpdateSettingsNotificationSuccess();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Felt 4, er blevet opdateret!
                            </div>';
            $_POST = array();
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
                    <?php foreach ($setting->getOneWebshopSettingsMoreInfo(1) as $settings); { ?>
                        <?=@$success?>
                        <div class="col-md-5">
                            <h4>Felt 1</h4>
                            <hr>
                            <form name="contactform" action="" method="post">
                                <input type="hidden" name="id" value="<?= $settings->id ?>" >
                                <div class="form-group">
                                    <label for="title">Side Titel</label>
                                    <?=@$error['title']?>
                                    <input type="text" name="title" id="title" class="form-control" value="<?= $settings->title ?>">
                                </div>

                                <div class="group-group">
                                    <label for="icon">Skriv teksten til et ikon</label>
                                    <?=@$error['icon']?>
                                    <input class="form-control" id="icon" name="icon" type="text" value="<?= $settings->icon ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Footer Beskrivelse</label>
                                    <?=@$error['description']?>
                                    <textarea class="form-control" id="description" name="description" rows="3"><?= $settings->description ?></textarea>
                                </div>

                                <div class="input-group" style="justify-content: center">
                                    <input type="submit" style="margin-top: 25px; margin-bottom: 25px" class="btn btn-success" value="Opdater Felt 1" name="btn_update_more_info_1" />
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                    <hr>
                    <div class="col-md-2">
                        <h4 style="margin-top: 10px; text-align: center">Yderligere Information</h4>
                        <hr>
                        <p>På webshoppen, under hvert produkt, vises der en quick teskt. Dette er 4 felter, som redigeres her.</p>
                        <p>Disse 4 felter, skal gerne fortælle noget omkring webshoppen, såsom åbningstider, kreditkort info osv. osv.</p>
                    </div>
                    <hr>
                    <?php foreach ($setting->getOneWebshopSettingsMoreInfo(2) as $settings); { ?>
                    <?=@$success?>
                    <div class="col-md-5">
                        <h4>Felt 2</h4>
                        <hr>
                        <form name="contactform" action="" method="post">
                            <input type="hidden" name="id" value="<?= $settings->id ?>" >
                            <div class="form-group">
                                <label for="title">Side Titel</label>
                                <?=@$error['title']?>
                                <input type="text" name="title" id="title" class="form-control" value="<?= $settings->title ?>">
                            </div>


                            <div class="group-group">
                                <label for="icon">Skriv teksten til et ikon</label>
                                <?=@$error['icon']?>
                                <input class="form-control" id="icon" name="icon" type="text" value="<?= $settings->icon ?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Footer Beskrivelse</label>
                                <?=@$error['description']?>
                                <textarea class="form-control" id="description" name="description" rows="3"><?= $settings->description ?></textarea>
                            </div>

                            <div class="input-group" style="justify-content: center">
                                <input type="submit" style="margin-top: 25px; margin-bottom: 25px" class="btn btn-success" value="Opdater Felt 2" name="btn_update_more_info_1" />
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
                <hr>
                <?php foreach ($setting->getOneWebshopSettingsMoreInfo(3) as $settings); { ?>
                <?=@$success?>
                <div class="row">
                    <div class="col-md-5">
                        <h4>Felt 3</h4>
                        <hr>
                        <form name="contactform" action="" method="post">
                            <input type="hidden" name="id" value="<?= $settings->id ?>" >
                            <div class="form-group">
                                <label for="title">Side Titel</label>
                                <?=@$error['title']?>
                                <input type="text" name="title" id="title" class="form-control" value="<?= $settings->title ?>">
                            </div>


                            <div class="group-group">
                                <label for="icon">Skriv teksten til et ikon</label>
                                <?=@$error['icon']?>
                                <input class="form-control" id="icon" name="icon" type="text" value="<?= $settings->icon ?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Footer Beskrivelse</label>
                                <?=@$error['description']?>
                                <textarea class="form-control" id="description" name="description" rows="3"><?= $settings->description ?></textarea>
                            </div>

                            <div class="input-group" style="justify-content: center">
                                <input type="submit" style="margin-top: 25px; margin-bottom: 25px" class="btn btn-success" value="Opdater Felt 3" name="btn_update_more_info_1" />
                            </div>
                        </form>
                    </div>
                    <?php } ?>
                    <hr>
                    <div class="col-md-2">
                        <h4 style="margin-top: 10px; text-align: center">Eksempel på et felt</h4>
                        <hr>
                        <p>Dette er et eksempel på hvordan et felt kan ses ud. Du har mulighed for at skrive det nogen lunde sådan her:</p>
                        <div class="example_text" style="border-top: 1px solid #999; padding: 5px;">
                            <i class="fa fa-clock-o fa-2x"></i> &nbsp; <strong style="font-size: 24px; font-family: 'Crete Round', serif;">Åbningstider</strong>
                            <p style="color: #999; font-family: 'Crete Round', serif;">Hverdage: kl. 10-16,<br>Weekender: Lukket.</p>
                        </div>
                    </div>
                    <hr>


                    <?php foreach ($setting->getOneWebshopSettingsMoreInfo(4) as $settings); { ?>
                    <?=@$success?>
                    <div class="col-md-5">
                        <h4>Felt 4</h4>
                        <hr>
                        <form name="contactform" action="" method="post">
                            <input type="hidden" name="id" value="<?= $settings->id ?>" >
                            <div class="form-group">
                                <label for="title">Side Titel</label>
                                <?=@$error['title']?>
                                <input type="text" name="title" id="title" class="form-control" value="<?= $settings->title ?>">
                            </div>


                            <div class="group-group">
                                <label for="icon">Skriv teksten til et ikon</label>
                                <?=@$error['icon']?>
                                <input class="form-control" id="icon" name="icon" type="text" value="<?= $settings->icon ?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Footer Beskrivelse</label>
                                <?=@$error['description']?>
                                <textarea class="form-control" id="description" name="description" rows="3"><?= $settings->description ?></textarea>
                            </div>

                            <div class="input-group" style="justify-content: center">
                                <input type="submit" style="margin-top: 25px; margin-bottom: 25px" class="btn btn-success" value="Opdater Felt 4" name="btn_update_more_info_1" />
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="styleSelector">

</div>
</div>
</div>