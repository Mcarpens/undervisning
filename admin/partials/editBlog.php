<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 09:11
 */

$blog = $blogs->singleBlog($_GET['id']);
$author = $user->getOne($_SESSION['user_id']);
if(isset($_POST['btn_edit'])) {

    $fileUploader = new FileUploader("../assets/img/blogs/");

    $title = strip_tags($_POST['title']);
    $text = strip_tags($_POST['text']);
    $author = strip_tags($_POST['author']);
    $category = strip_tags($_POST['category']);
    $tags = strip_tags($_POST['tags']);
    $images = $_FILES['filUpload'];

    $newfile = $fileUploader->fileUploadEdit($_FILES['filUpload'], 250, 250);
    unlink('../assets/img/blogs/' . $blog->images);
    unlink('../assets/img/blogs/thumb/' .$blog->images);
    $blogs->editBlog($_POST, $newfile['filename']);
    $notification->setEditBlogNotification();
    $user->redirect('nyheder');

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
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $blog->id ?>"
                            </div>
                            <div class="form-group">
                                <label for="title">Titel</label>
                                <input type="text" name="title" id="title" class="form-control" value="<?= $blog->title ?>">
                            </div>

                            <div class="form-group">
                                <label for="author">Author</label>
                                <input class="form-control" id="author" type="text" name="author" placeholder="<?= $author->firstname . ' ' . $author->lastname ?>" readonly>
                                <input type="hidden" name="author" value="<?= $_SESSION['user_id'] ?>"/>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori</label>
                                <select class="form-control" name="category" id="exampleFormControlSelect1">
                                    <?php foreach ($blogs->getAllCategory() as $cat) { ?>
                                        <option value="<?= $cat->id ?>" selected><?= $cat->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Tags</label>
                                <select class="form-control" name="tags" id="exampleFormControlSelect2">
                                    <?php foreach ($blogs->getAllTags() as $tag) { ?>
                                        <option value="<?= $tag->id ?>" selected><?= $tag->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mytextarea">Tekst</label>
                                <textarea class="form-control" id="mytextarea" name="text" rows="10"><?= $blog->text ?></textarea>
                            </div>

                            <!-- Image upload card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Billede Upload</h5>
                                    <img src="../assets/img/blogs/thumb/<?= $blog->images ?>" id="image" class="img-thumbnail" height="50px" width="100%">
                                </div>
                                <div class="card-block">
                                    <div class="sub-title"> <?php
                                        if (empty($blog->images)) {
                                            echo 'Vælg et billede';
                                        } else {
                                            echo @$blog->images;
                                        }
                                        ?></div>
                                    <input type="file" name="filUpload" id="filer_input" multiple="multiple">
                                </div>
                            </div>
                            <!-- Image upload card end -->
                            <div class="clearfix"></div><hr />
                            <input type="submit" class="btn btn-success" value="Opdater" name="btn_edit" />
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