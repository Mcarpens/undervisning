<?php
if(isset($_POST['btn_send'])){
    $error = $email->validateContact($_POST);
    if(sizeof($error) == 0) {
        $email->sendMail($_POST);
        $notification->setMessageNotificationSuccess();

        $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Tak for din henvendelse, vi vender tilbage til dig hurtigst muligt!
                            </div>';
        $user->redirect('kontakt');
    }
}
?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Kontakt</h1>
        <span>Kom i kontakt med os</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Kontakt</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Contact Form & Map Overlay Section
============================================= -->
<section id="map-overlay">

    <div class="container clearfix">

        <!-- Contact Form Overlay
        ============================================= -->
        <div id="contact-form-overlay-mini" class="clearfix">

            <div class="fancy-title title-dotted-border">
                <h3>Send os en Email</h3>
            </div>

            <div class="contact-widget" data-alert-type="inline">

                <div class="contact-form-result"></div>

                <!-- Contact Form
                ============================================= -->
                <form class="nobottommargin" action="" method="post">
                    <?= @$success ?>
                    <div class="col_full">
                        <label for="template-contactform-name">Navn <small>*</small></label>
                        <input type="text" id="template-contactform-name" name="navn" value="<?= @$_POST['navn'] ?>" class="sm-form-control required" />
                    </div>

                    <div class="col_full">
                        <label for="template-contactform-email">Email <small>*</small></label>
                        <input type="email" id="template-contactform-email" name="email" value="<?= @$_POST['email'] ?>" class="required email sm-form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="template-contactform-message">Besked <small>*</small></label>
                        <textarea class="required sm-form-control" id="template-contactform-message" name="besked" rows="6" cols="30"><?= @$_POST['besked'] ?></textarea>
                    </div>

                    <div class="col_full">
                        <input class="button button-3d nomargin" type="submit" name="btn_send" value="Send">
                    </div>

                </form>

            </div>


        </div><!-- Contact Form Overlay End -->

    </div>

    <!-- Google Map
    ============================================= -->
    <section id="google-map" class="gmap">
        <div id="google-map1" style="height: 900px;" class="gmap"></div>
    </section>


</section>
<!-- Contact Form & Map Overlay Section End -->