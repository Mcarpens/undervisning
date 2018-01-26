<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 17-01-2018
 * Time: 09:54
 */

function mediaImageUploader($inputFieldName, $mimeType = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'], $folder = '../assets/img/produkter'){
    $uploadError = array(
        1 => 'Filens størrelse overskrider \'upload_max_filesize\' directivet i php.ini.',
        2 => 'Filen størrelse overskride \'MAX_FILE_SIZE\' directivet i HTML formen.',
        3 => 'File blev kun delvis uploadet.',
        4 => 'Filen blev ikke uploaded.',
        6 => 'Kunne ikke finde \'tmp\' mappen.',
        7 => 'Kunne ikke gemme filen på disken.',
        8 => 'A PHP extension stopped the file upload.'
    );
    if($_FILES[$inputFieldName]['error'] === 0){
        $image = $_FILES[$inputFieldName];
        if(!in_array($image['type'], $mimeType)){
            return [
                'code' => false,
                'msg' => 'Ikke tiladt filtype'
            ];
        }
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }
        $imageName = sha1(time()*rand(5,1000));
        if(move_uploaded_file($image['tmp_name'], $folder . '/' . $imageName)){
            return [
                'code' => true,
                'type' => $image['type'],
                'name' => $imageName
            ];
        }
    } else {
        return [
            'code' => false,
            'msg' => $uploadError[$_FILES[$inputFieldName]['error']]
        ];
    }
}

$product = $products->singleProduct($_GET['id']);

if(isset($_POST['btn_send'])) {
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

    if(sizeof($error) == 0) {
        if($products->editProduct($_POST) == true){
            $notification->setEditProductNotification();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
    <a href="#" class="close">&times;</a>
    <i class="glyphicon glyphicon-warning-sign"></i>
    Produktet '.$_POST['name'].' er redigeret!
</div>';
            $product = $products->singleProduct($_GET['id']);
        }
    }
}

?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Rediger Produktet: <?= @$product->name ?></li>
        </ol>
        <?=@$success?>
        <form name="contactform" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= @$product->id ?>" name="id">
            <div class="form-group">
                <label for="name">Navn</label>
                <?=@$error['name']?>
                <input type="text" name="name" id="name" class="form-control" value="<?= @$product->name ?>">
            </div>

            <div class="form-group">
                <label for="price">Pris</label>
                <?=@$error['price']?>
                <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" value="<?= @$product->price ?>">
            </div>

            <div class="form-group">
                <label for="description">Beskrivelse</label>
                <?=@$error['description']?>
                <textarea class="form-control" id="description" name="description" rows="3"><?= @$product->description ?></textarea>
            </div>

            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="filUpload">
                    <label class="custom-file-label" for="inputGroupFile01">
                        <?php
                        if (empty($product->image)) {
                        echo 'Vælg et billede';
                        } else {
                        echo @$product->image;
                        }
                        ?>
                    </label>
                </div>
            </div>

            <input type="submit" style="margin-top: 25px" class="btn btn-success" value="Opdater" name="btn_send" />
        </form>
    </div>
</div>

