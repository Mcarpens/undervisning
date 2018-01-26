<?php
$blog = $blogs->singleBlog($_GET['id']);
$author = $user->getOne($blog->fk_author);
$category = $blogs->getCategory($blog->fk_category);
$tags = $blogs->getTags($blog->fk_tags);

if ($author->fk_userrole == 1) {
    $userrole = "Super Admin";
} else if ($author->fk_userrole == 2) {
    $userrole = "Admin";
}

if(isset($_POST['btn_comment'])) {
    if (isset($_POST['fk_user'])) {
        $fk_user = strip_tags($_POST['fk_user']);
    } else {
        $name = strip_tags($_POST['name']);
    }
    $fk_blog = strip_tags($_POST['fk_blog']);
    $text = strip_tags($_POST['text']);

    $comments->newComment($_POST);
    $notification->setNewCommentNotification();
}
?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Blog Single</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Blog Single</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="single-post nobottommargin">

                <!-- Single Post
                ============================================= -->
                <div class="entry clearfix">

                    <!-- Entry Title
                    ============================================= -->
                    <div class="entry-title">
                        <h2><?= $blog->title ?></h2>
                    </div><!-- .entry-title end -->

                    <!-- Entry Meta
                    ============================================= -->
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> <?= $blog->timestamp ?></li>
                        <li><a href="#"><i class="icon-user"></i> <?= $author->firstname . ' ' . $author->lastname . ' <small>(' . $userrole . ')</small>'; ?></a></li>
                        <li><i class="icon-folder-open"></i> <a href="#"><?= $category->name ?></a></li>
                        <!--                                <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>-->
                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                    </ul><!-- .entry-meta end -->

                    <!-- Entry Image
                    ============================================= -->
                    <div class="entry-image bottommargin">
                        <a href="#"><img src="./assets/img/blogs/<?= $blog->images ?>" alt="Blog Single"></a>
                    </div><!-- .entry-image end -->

                    <!-- Entry Content
                    ============================================= -->
                    <div class="entry-content notopmargin">

                        <p><?= $blog->text ?></p>
                        <!-- Post Single - Content End -->

                        <!-- Tag Cloud
                        ============================================= -->
                        <div class="tagcloud clearfix bottommargin">
                            <a href="#"><i class="icon-tags"></i> <?= $tags->name ?></a>
                        </div><!-- .tagcloud end -->

                    </div>
                </div><!-- .entry end -->

                <!-- Comments
                ============================================= -->
                <div id="comments">

                    <!-- Comment Form
                    ============================================= -->
                    <div id="respond" class="clearfix">

                        <h3>Skriv en <span>Kommentar</span></h3>

                        <form class="clearfix" action="#" method="post" id="commentform" >
                            <?php if ($user->is_loggedin() == true) {
                                $users = $user->getOne($_SESSION['user_id']);
                                ?>
                                <div class="col_one_third">
                                    <input type="text" class="sm-form-control" value="<?= $users->firstname . ' ' . $users->lastname ?>" readonly>
                                    <input type="hidden" name="fk_user" value="<?= $users->id ?>">
                                </div>
                            <?php } else { ?>
                                <div class="col_one_third">
                                    <input type="text" class="sm-form-control" name="name" placeholder="Navn">
                                </div>
                            <?php } ?>

                            <div class="clear"></div>

                            <div class="col_full">
                                <input type="hidden" name="fk_blog" value="<?= $blog->id ?>">
                                <textarea name="text" type="text" cols="58" rows="7" tabindex="4" placeholder="Kommentar" class="sm-form-control"></textarea>
                            </div>

                            <div class="col_full nobottommargin">
                                <button name="btn_comment" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Send</button>
                            </div>

                        </form>

                    </div><!-- #respond end -->

                    <div class="clear"></div>
                    <div class="line"></div>

                    <!-- Comments List
                    ============================================= -->
                    <ol class="commentlist clearfix">
                        <?php
                        foreach ($comments->getAllComments() as $comment) {
                            $comUser = $user->getOne($comment->fk_user);
                            if ($comment->fk_blog == $blog->id) { ?>
                                <li class="comment even thread-even depth-1" id="li-comment-1">

                                    <div id="comment-1" class="comment-wrap clearfix">

                                        <div class="comment-meta">

                                            <div class="comment-author vcard">

												<span class="comment-avatar clearfix">
                                                    <?php if(isset($comment->fk_user)) {
                                                        echo '<img src="./assets/img/users/' . $comUser->avatar . '" class="avatar avatar-60 photo avatar-default" height="60" width="60">';
                                                    } else {
                                                        echo '<img src="./assets/img/users/0487a3c256d7318de93d26e183667ac9b56be46f" class="avatar avatar-60 photo avatar-default" height="60" width="60">';
                                                    }
                                                    ?>
												</span>

                                            </div>

                                        </div>

                                        <div class="comment-content clearfix">

                                            <div class="comment-author">
                                                <?php
                                                    if(isset($comment->fk_user)){
                                                        echo $comUser->firstname . ' ' . $comUser->lastname;
                                                    } else {
                                                        echo $comment->name;
                                                    }
                                                 ?>
                                                <span><a href="#" title="Permalink to this comment"><?= $comment->timestamp ?></a></span></div>

                                            <p><?= $comment->text ?></p>

                                            <a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>

                                        </div>

                                    </div>

                                </li>
                            <?php  } } ?>
                    </ol> <!-- .commentlist end -->

                </div><!-- #comments end -->

            </div>

        </div>

    </div>

</section><!-- #content end -->