<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:01
 */

$tag = $blogs->getTags($_GET['id']);

if(isset($_POST['btn_edit'])) {

    $name = strip_tags($_POST['name']);

    $blogs->editTag($_POST);
    $notification->setEditTagNotification();
    $user->redirect('tags');

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
                                    <h4>Rediger et tags</h4>
                                    <span>Her kan du redigere et tag i systemet.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Rediger Tag</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->
                <div class="page-body">
                    <div class="col-md-8 offset-2 center">
                        <h4 style="color: dodgerblue">General Information</h4>
                        <hr>
                        <form name="contactform" action="" method="post">
                            <input type="hidden" name="id" value="<?= $tag->id ?>">

                            <div class="form-group">
                                <label for="name">Titel</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= $tag->name ?>">
                            </div>

                            <div class="clearfix"></div><hr />
                            <input type="submit" class="btn btn-success" value="Rediger" name="btn_edit" />
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