<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 17-01-2018
 * Time: 09:54
 */

$product = $products->singleProduct($_GET['id']);
$currentColors = $products->getBlobs($_GET['id']);
$i = 0;
$currentColorsArray = [];
foreach($currentColors as $color) {
    $currentColorsArray[$i] = $color->color_id;
    $i++;
}
$i = 0;

$currentSizes = $products->getSizes($_GET['id']);
$i2 = 0;
$currentSizesArray = [];
foreach($currentSizes as $size) {
    $currentSizesArray[$i2] = $size->size_id;
    $i2++;
}
$i2 = 0;

if(isset($_POST['btn_send'])) {

    $fileUploader = new FileUploader("../assets/img/produkter/");

    $adds = array_diff($_POST['colors'], $currentColorsArray);
    $deletes = array_diff($currentColorsArray, $_POST['colors']);

    $adds2= array_diff($_POST['sizes'], $currentSizesArray);
    $deletes2 = array_diff($currentSizesArray, $_POST['sizes']);

    $products->editColorHandler($adds, $deletes, $_GET['id']);
    $products->editSizeHandler($adds2, $deletes2, $_GET['id']);

    $error = [];
    if(empty($_POST['name'])) {
        $error['name'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
            <a href=\"#\" class=\"close\">&times;</a>
            <i class=\"glyphicon glyphicon-warning-sign\"></i>
            Udfyld venligst et navn.
            </div>";
                }

                if(empty($_POST['price'])) {
                    $error['price'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
            <a href=\"#\" class=\"close\">&times;</a>
            <i class=\"glyphicon glyphicon-warning-sign\"></i>
            Udfyld venligst prisen.
            </div>";
                }

                if(empty($_POST['description'])) {
                    $error['description'] = "<div class=\"alert alert-danger alert-dismissible\" data-dismiss=\"alert\" id=\"myAlert\">
            <a href=\"#\" class=\"close\">&times;</a>
            <i class=\"glyphicon glyphicon-warning-sign\"></i>
            Udfyld venligst beskrivelsen.
            </div>";

    }
    $product = $products->singleProduct($_GET['id']);

    if(sizeof($error) == 0) {
        $newfile = $fileUploader->fileUploadEdit($_FILES['filUpload'], 250, 250);
        unlink('../assets/img/produkter/' . $product->image);
        unlink('../assets/img/produkter/thumb/' .$product->image);
        $prodId = $products->editProduct($_POST, $newfile['filename']);
        if($products->updateColors($prodId, $_POST['colors']) && $products->updateSizes($prodId, $_POST['sizes']) == true){
            $notification->setEditProductNotification();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
            <a href="#" class="close">&times;</a>
            <i class="glyphicon glyphicon-warning-sign"></i>
            Produktet '.$_POST['name'].' er redigeret!
            </div>';
            $product = $products->singleProduct($_GET['id']);
            $currentColors = $products->getBlobs($_GET['id']);
            $currentSizes = $products->getSizes($_GET['id']);
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
                                <i class="ti-shopping-cart bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Opret et nyt produkt</h4>
                                    <span>Her kan du oprette et nyt produkt til webshoppen.</span>
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
                    <?=@$success?>
                    <div class="col-md-8 offset-2 center">
                        <h4 style="color: dodgerblue">General Information</h4>
                        <hr>
                    <form name="contactform" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= @$product->id ?>" name="id">
                        <div class="form-group">
                            <label for="name">Navn</label>
                            <?=@$error['name']?>
                            <input type="text" name="name" id="name" class="form-control" value="<?= @$product->name ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Pris</label>
                            <?=@$error['price']?>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="<?= @$product->price ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="mytextarea2">Kort Beskrivelse</label>
                            <?=@$error['short_description']?>
                            <textarea class="form-control" id="mytextarea2" name="short_description" rows="10" ><?= @$product->short_description ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="mytextarea">Beskrivelse</label>
                            <?=@$error['description']?>
                            <textarea class="form-control" id="mytextarea" name="description" rows="10" ><?= @$product->description ?></textarea>
                        </div>

                        <br>
                        <h4 style="color: dodgerblue">Yderligere Information</h4>
                        <hr>

                        <div class="form-group">
                            <label for="exampleFormControlSelect4">Farver</label>
                            <?=@$error['color']?>
                            <select multiple class="form-control" name="colors[]" id="exampleFormControlSelect4">
                                <?php foreach ($products->getAllColors() as $color) {
                                    $selected = '';
                                    foreach ($currentColors as $key) {
                                        if ($color->id == $key->color_id) {
                                            $selected = 'selected';
                                        }
                                    }
                                    echo '<option ' . $selected . ' value="' . $color->id . '">' . $color->cname . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Størrelser</label>
                            <?=@$error['sizes']?>
                            <select multiple class="form-control" name="sizes[]" id="exampleFormControlSelect12">
                                <?php foreach ($products->getAllSizes() as $size) {
                                    $selected = '';
                                    foreach ($currentSizes as $key) {
                                        if ($size->id == $key->size_id) {
                                            $selected = 'selected';
                                        }
                                    }
                                    echo '<option ' . $selected . ' value="' . $size->id . '">' . $size->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="height">Højde <small>(0 = Ikke angivet)</small></label>
                                <div class="input-group">
                                    <label class="sr-only" for="height">Højde</label>
                                    <?=@$error['height']?>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Cm.</div>
                                        </div>
                                        <input type="number" class="form-control" id="height" name="height" value="<?php if(@$product->height == 0) { echo '0'; } else { echo @$product->height; } ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="length">Længde <small>(0 = Ikke angivet)</small></label>
                                <div class="input-group">
                                    <label class="sr-only" for="length">Længde</label>
                                    <?=@$error['length']?>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Cm.</div>
                                        </div>
                                        <input type="number" class="form-control" id="length" name="length" value="<?php if(@$product->length == 0) { echo '0'; } else { echo @$product->length; } ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect5">Udsalg</label>
                                    <select class="form-control" name="on_sale" id="exampleFormControlSelect5">
                                        <?php if($product->on_sale == 0){ ?>
                                        <option value="0" selected>Ikke på Udsalg</option>
                                        <option value="1">På Udsalg</option>
                                        <?php } else { ?>
                                            <option value="0">Ikke på Udsalg</option>
                                        <option value="1" selected>På Udsalg</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="sale_price">Tilbudspris</label>
                                    <?=@$error['sale_price']?>
                                    <input type="text" class="form-control" id="sale_price" name="sale_price" aria-describedby="emailHelp" value="<?= @$product->sale_price ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="sale_text">Tilbuds Tekst</label>
                                    <?=@$error['sale_text']?>
                                    <input type="text" class="form-control" maxlength="100" id="sale_text" name="sale_text" aria-describedby="emailHelp" value="<?= @$product->sale_text ?>">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="stock">Lager Status</label>
                                    <?=@$error['stock']?>
                                    <input type="number" class="form-control" maxlength="4" id="stock" name="stock" aria-describedby="emailHelp" value="<?= @$product->stock ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 50px">
                            <!-- Image upload card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Billede Upload</h5>
                                    <img src="../assets/img/produkter/thumb/<?= $product->image ?>" id="image" class="img-thumbnail" height="50px" width="100%">
                                </div>
                                <div class="card-block">
                                    <div class="sub-title"> <?php
                                        if (empty($product->image)) {
                                            echo 'Vælg et billede';
                                        } else {
                                            echo @$product->image;
                                        }
                                        ?></div>
                                    <input type="file" name="filUpload" id="filer_input" multiple="multiple">
                                </div>
                            </div>
                            <!-- Image upload card end -->
                        </div>
                        <div class="row">
                            <input type="submit" style="position: fixed; right: 0.5%; bottom: 0.5%; margin-bottom: 15px; z-index: 5" class="btn btn-success float-right" value="Opdater" name="btn_send" />
                        </div>
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