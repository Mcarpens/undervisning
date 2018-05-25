<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 22-01-2018
 * Time: 10:42
 */

$cat = $products->getColor($_GET['id']);

if (isset($_POST['btn_opret'])) {

    $fileUploader = new FileUploader("../assets/img/farver/");
    $newfile = $fileUploader->fileUploadEdit($_FILES['filUpload'], 250, 250);
    unlink('../assets/img/farver/' . $cat->cimage);
    unlink('../assets/img/farver/thumb/' .$cat->cimage);

    $products->editColor($_POST, $newfile['filename']);
    $notification->setEditProductNotification();
    $user->redirect('farver');

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
                                <i class="ti-shopping-cart bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Rediger en farve</h4>
                                    <span>Her kan du redigere en farve i systemet.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Opret produkt</a>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= @$cat->id ?>">

                            <label for="name">Navn</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" value="<?= @$cat->cname ?>">
                            </div>

                            <br>
                            <!-- Image upload card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Billede Upload</h5>
                                    <img src="../assets/img/farver/thumb/<?= $cat->cimage ?>" id="image" class="img-thumbnail" height="50" width="50">
                                </div>
                                <div class="card-block">
                                    <div class="sub-title"> <?php
                                        if (empty($cat->cimage)) {
                                            echo 'Vælg et billede';
                                        } else {
                                            echo @$cat->cimage;
                                        }
                                        ?></div>
                                    <input type="file" name="filUpload" id="filer_input" multiple="multiple">
                                </div>
                            </div>
                            <!-- Image upload card end -->

                            <div class="clearfix"></div><hr />
                            <input type="submit" class="btn btn-success" value="Rediger" name="btn_opret" />
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