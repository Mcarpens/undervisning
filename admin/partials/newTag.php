<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:04
 */

if (isset($_POST['btn_opret'])) {
    $name = strip_tags($_POST['name']);

    if ($name=="") {
        $error[] = "Angiv et navn!";
    } else {
        $blogs->newTag($_POST);
        $notification->setNewTagNotification();
        $user->redirect('tags');
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
                                <i class="ti-book bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Opret et ny tag</h4>
                                    <span>Her kan du oprette et nyt tag til nyhederne.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Opret tag</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->
                <div class="page-body">
                    <div class="col-md-8 offset-2">
                        <form name="contactform" action="" method="post">
                            <div class="form-group">
                                <label for="name">Navn</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= @$_POST['name'] ?>">
                            </div>
                            <div class="clearfix"></div><hr />
                            <input type="submit" class="btn btn-success" value="Opret" name="btn_opret" />
                        </form>
                    </div>
                </div>
            </div>
            <div id="styleSelector">

            </div>
        </div>
    </div>
</div>
</div>
</div>