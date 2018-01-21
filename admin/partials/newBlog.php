<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 15:52
 */

function mediaImageUploader($inputFieldName, $mimeType = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp'], $folder = '../assets/img/blogs'){
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

if(isset($_POST['btn_opret'])) {

    $title = strip_tags($_POST['title']);
    $text = strip_tags($_POST['text']);
    $author = strip_tags($_POST['author']);
    $category = strip_tags($_POST['category']);
    $tags = strip_tags($_POST['tags']);
    $images = $_FILES['images'];

    $stmt = $_SESSION['user_id'] == $users->id;
    if($stmt == true) {
        if($blogs->newBlog($_POST) == true) {
            $notification->setNewBlogNotification();
            $user->redirect('nyheder');
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
            <li class="breadcrumb-item active">Opret en Nyhed</li>
        </ol>
        <form name="contactform" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= @$_POST['title'] ?>">
            </div>

            <div class="form-group">
                <input type="hidden" name="author" value="<?= $_SESSION['user_id'] ?>"
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control" name="category" id="exampleFormControlSelect1">
                    <?php foreach ($blogs->getAllCategory() as $cat) { ?>
                        <option value="<?= $cat->id ?>"><?= $cat->id . ' - ' . $cat->name ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Tags</label>
                <select class="form-control" name="tags" id="exampleFormControlSelect2">
                    <?php foreach ($blogs->getAllTags() as $tag) { ?>
                        <option value="<?= $tag->id ?>"><?= $tag->id . ' - ' . $tag->name ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Tekst</label>
                <textarea class="form-control" id="description" name="text" rows="3"><?= @$_POST['text'] ?></textarea>
            </div>

            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="images">
                    <label class="custom-file-label" for="inputGroupFile01">
                        Vælg et billede
                    </label>
                </div>
            </div>
            <div class="clearfix"></div><hr />
            <input type="submit" class="btn btn-success" value="Opret" name="btn_opret" />
        </form>
    </div>
</div>
