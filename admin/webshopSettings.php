<?php
foreach ($setting->getAllWebshopSettings() as $webSet);
if(isset($_POST['btn_update'])) {

    $fileUploader = new FileUploader("../assets/img/shop/");
    $newfile = $fileUploader->fileUploadEdit($_FILES['brand_logo'], 250, 250);
    unlink('../assets/img/shop/' . $webSet->shop_brand_logo);
    unlink('../assets/img/shop/thumb/' .$webSet->shop_brand_logo);

    $error = [];
    if(sizeof($error) == 0) {
        if($setting->updateWebshopSettings($_POST, $newfile['filename']) == true){
            $notification->setUpdateSettingsNotificationSuccess();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Dine webshop indstillinger er blevet opdateret!
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
                                    <h4>CMS - Webshop Indstillinger</h4>
                                    <span>Her kan du foretage ændringer i de generelle indstillinger for webshoppen.</span>
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
                    <?php foreach($setting->getAllWebshopSettings() as $webSettings); { ?>
                        <form name="contactform" action="" method="post" enctype="multipart/form-data">
                        <h3 style="color: blue;">Generelle Indstillinger</h3>
                        <input type="hidden" name="id" value="<?= $webSettings->id ?>" >
                        <?php if($webSettings->shop_online == 0) { ?>

                            <div class="form-group">
                                <label for="exampleFormControlSelect5">Webshop Tilstand:</label>
                                <select class="form-control" name="shop_online" id="exampleFormControlSelect5">
                                    <option value="0" selected>Webshop er Offline</option>
                                    <option value="1">Webshop er Online</option>
                                </select>
                            </div>

                            <input type="hidden" name="shop_nav_title" value="<?= $webSettings->shop_nav_title ?>">
                            <input type="hidden" name="shop_nav_subtitle" value="<?= $webSettings->shop_nav_subtitle ?>">
                            <input type="hidden" name="shop_textarea" value="<?= $webSettings->shop_textarea ?>">
                            <input type="hidden" name="brand_logo" value="<?= $webSettings->shop_brand_logo ?>">
                            <input type="hidden" name="brand_logo_link" value="<?= $webSettings->shop_brand_logo_link ?>">
                            <input type="hidden" name="paypal_url" value="<?= $webSettings->paypal_url ?>">
                            <input type="hidden" name="paypal_id" value="<?= $webSettings->paypal_id ?>">

                            <div class="input-group" style="justify-content: center">
                                <input type="submit" style="position: fixed; right: 0.5%; bottom: 0.5%; margin-bottom: 15px; z-index: 5" class="btn btn-success float-right" value="GEM ÆNDRING" name="btn_update" />
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label for="exampleFormControlSelect5">Webshop Tilstand:</label>
                                <select class="form-control" name="shop_online" id="exampleFormControlSelect5">
                                    <option value="0">Webshop er Offline</option>
                                    <option value="1" selected>Webshop er Online</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="shop_nav_title">Webshop Titel</label>
                                <input type="text" name="shop_nav_title" id="shop_nav_title" class="form-control" value="<?= $webSettings->shop_nav_title ?>">
                            </div>

                            <div class="form-group">
                                <label for="shop_nav_subtitle">Webshop Subtitel</label>
                                <input type="text" class="form-control" id="shop_nav_subtitle" name="shop_nav_subtitle" aria-describedby="emailHelp" value="<?= $webSettings->shop_nav_subtitle ?>">
                            </div>

                            <div class="form-group">
                                <label for="mytextarea">Beskrivelse</label>
                                <textarea class="form-control" id="mytextarea" name="shop_textarea" rows="5"><?= $webSettings->shop_textarea ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="brand_logo_link">Logo Link</label>
                                <input type="url" class="form-control" id="brand_logo_link" name="brand_logo_link" aria-describedby="emailHelp" value="<?= $webSettings->shop_brand_logo_link ?>">
                            </div>

                            <!-- Image upload card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Billede Upload</h5><br>
                                    <img src="../assets/img/shop/thumb/<?= $webSettings->shop_brand_logo ?>" id="image" class="img-thumbnail" height="100" width="auto">
                                    <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                </div>
                                <div class="card-block">
                                    <div class="sub-title"><?php
                                        if (empty($webSettings->shop_brand_logo)) {
                                            echo 'Vælg et billede';
                                        } else {
                                            echo @$webSettings->shop_brand_logo;
                                        }
                                        ?></div>
                                    <input type="file" name="brand_logo" id="filer_input" multiple="multiple">
                                </div>
                            </div>
                            <!-- Image upload card end -->

                            <h4>Betalings Oplysninger</h4>
                            <hr>
                            <h6>PayPal Oplysninger</h6>
                            <div class="form-group">
                                <label for="paypal_url">PayPal URL</label>
                                <input type="url" class="form-control" id="paypal_url" name="paypal_url" aria-describedby="emailHelp" value="<?= $webSettings->paypal_url ?>">
                            </div>

                            <div class="form-group">
                                <label for="paypal_id">PayPal ID</label>
                                <input type="text" class="form-control" id="paypal_id" name="paypal_id" aria-describedby="emailHelp" value="<?= $webSettings->paypal_id ?>">
                            </div>

                            <h6>MobilePay Oplysninger</h6>

                            <p>Kommer snart!</p>

                            <div class="input-group">
                                <input type="submit" style="position: fixed; right: 0.5%; bottom: 0.5%; margin-bottom: 15px; z-index: 5" class="btn btn-success float-right" value="GEM ÆNDRING" name="btn_update" />
                            </div>
                        </form>
                    <?php } } ?>
                </div>
            </div>
        </div>
        <div id="styleSelector">

        </div>
    </div>
</div>