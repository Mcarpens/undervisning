<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 15:52
 */

$fileUploader = new FileUploader("../assets/img/blogs/");

if(isset($_POST['btn_opret'])) {
    $newfile = $fileUploader->fileUpload($_FILES['images'], 250, 250);
    $title = strip_tags($_POST['title']);
    $text = strip_tags($_POST['text']);
    $author = strip_tags($_POST['author']);
    $category = strip_tags($_POST['category']);
    $tags = strip_tags($_POST['tags']);

    $stmt = $_SESSION['user_id'] == $users->id;
    if($stmt == true) {
        if($blogs->newBlog($_POST, $newfile['filename']) == true) {
            $notification->setNewBlogNotification();
            $success = '<div class="alert alert-success alert-dismissible" data-dismiss="alert" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Nyheden '.$_POST['title'].' er oprettet!
                            </div>';
            $user->redirect('nyheder');
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
                                <i class="ti-book bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Opret en nyhed</h4>
                                    <span>Her kan du oprette en nyhed i systemet.</span>
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
                                    <li class="breadcrumb-item"><a href="#!">Opret nyhed</a>
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
                                <label for="mytextarea">Tekst</label>
                                <textarea class="form-control" id="mytextarea" name="text" rows="10"><?= @$_POST['text'] ?></textarea>
                            </div>

                            <!-- Image upload card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Billede Upload</h5>
                                </div>
                                <div class="card-block">
                                    <div class="sub-title">Vælg et billede</div>
                                    <input type="file" name="images" id="filer_input" multiple="multiple">
                                </div>
                            </div>
                            <!-- Image upload card end -->
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