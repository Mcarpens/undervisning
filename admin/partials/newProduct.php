<?php

$fileUploader = new FileUploader("../assets/img/produkter/");

if(isset($_POST['btn_send'])) {
    $newfile = $fileUploader->fileUpload($_FILES['filUpload'], 250, 250);
    $error = [];
    $prodId = $products->newProducts($_POST, $newfile['filename']);
    if($products->insertColors($prodId, $_POST['colors']) && $products->insertSizes($prodId, $_POST['sizes']) == true) {
        if ($newfile['success'] == true){
            $notification->setNewProductNotificationSuccess();
            $success = '<div class="alert success" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Produktet '.$_POST['name'].' er oprettet!
                            </div>';
            $user->redirect('produkter');
        } else {
            echo $newfile['msg'];
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
                    <div class="col-md-8 offset-2">
                    <form name="contactform" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Navn</label>
                            <?=@$error['name']?>
                            <input type="text" name="name" id="name" class="form-control" value="<?= @$_POST['name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="price">Pris</label>
                            <?=@$error['price']?>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="<?= @$_POST['price'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="mytextarea">Kort Beskrivelse</label>
                            <?=@$error['short_description']?>
                            <textarea class="form-control" id="mytextarea2" name="short_description" maxlength="200" type="text" rows="10"><?= @$_POST['short_description'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="mytextarea">Beskrivelse</label>
                            <?=@$error['description']?>
                            <textarea class="form-control" id="mytextarea" name="description" rows="10"><?= @$_POST['description'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect4">Farver</label>
                            <select multiple class="form-control" name="colors[]" id="exampleFormControlSelect4">
                                <?php foreach ($products->getAllColors() as $color) { ?>
                                    <option value="<?= @$color->id ?>" selected><?= @$color->cname ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Størrelser</label>
                            <?=@$error['sizes']?>
                            <select multiple class="form-control" name="sizes[]" id="exampleFormControlSelect12" required>
                                <?php foreach ($products->getAllSizes() as $size) { ?>
                                    <option value="<?= @$size->id ?>" selected><?= @$size->name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="height">Højde i cm <small>(0 = Ikke angivet)</small></label>
                                <div class="input-group">
                                    <label class="sr-only" for="height">Højde</label>
                                    <?=@$error['height']?>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="number" class="form-control" id="height" name="height" value="0" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="length">Længde i cm <small>(0 = Ikke angivet)</small></label>
                                <div class="input-group">
                                    <label class="sr-only" for="length">Længde</label>
                                    <?=@$error['length']?>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="number" class="form-control" id="length" name="length" value="0"  required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect5">Udsalg</label>
                                    <select class="form-control" name="on_sale" id="exampleFormControlSelect5">
                                        <option value="0" selected>Ikke på Udsalg</option>
                                        <option value="1">På Udsalg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="sale_price">Tilbudspris</label>
                                    <?=@$error['sale_price']?>
                                    <input type="text" class="form-control" id="sale_price" name="sale_price" aria-describedby="emailHelp" value="<?= @$_POST['sale_price'] ?>" placeholder="0">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="sale_text">Tilbuds Tekst</label>
                                    <?=@$error['sale_text']?>
                                    <input type="text" class="form-control" maxlength="100" id="sale_text" name="sale_text" aria-describedby="emailHelp" value="<?= @$_POST['sale_text'] ?>" placeholder="SPAR 100 DKK">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="stock">Lager Status</label>
                                    <?=@$error['stock']?>
                                    <input type="number" class="form-control" maxlength="4" id="stock" name="stock" aria-describedby="emailHelp" value="<?= @$_POST['stock'] ?>" placeholder="0">
                                </div>
                            </div>
                        </div>

                        <!-- Image upload card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Billede Upload</h5>
                            </div>
                            <div class="card-block">
                                <div class="sub-title">Vælg et billede</div>
                                <input type="file" name="filUpload" id="filer_input" multiple="multiple">
                            </div>
                        </div>
                        <!-- Image upload card end -->

                        <div class="input-group">
                            <input type="submit" style="margin-bottom: 15px; z-index: 5" class="btn btn-success" value="Opret" name="btn_send" />
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