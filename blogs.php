<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Blog</h1>
        <span>Our Latest News in Grid Layout</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Blog</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Posts
            ============================================= -->
            <div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows">

                <?php foreach ($blogs->getAllBlogs() as $blog) { ?>
                <div class="entry clearfix">
                    <div class="entry-image">
                        <a href="./assets/img/blogs/<?= $blog->images ?>" data-lightbox="image"><img class="image_fade" src="./assets/img/blogs/<?= $blog->images ?>" alt="Standard Post with Image"></a>
                    </div>
                    <div class="entry-title">
                        <h2><a href="?side=nyhed&id=<?= $blog->id ?>"><?= $blog->title ?></a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> <?= $blog->timestamp ?></li>
<!--                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>-->
                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                    </ul>
                    <div class="entry-content">
                        <p><?= substr($blog->text, 0, 100) ?>[...]</p>
                        <a href="?side=nyhed&id=<?= $blog->id ?>"class="more-link">Read More</a>
                    </div>
                </div>
                <?php } ?>

            </div><!-- #posts end -->

            <!-- Pagination
            ============================================= -->
            <ul class="pagination nobottommargin">
                <li class="disabled"><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>

        </div>

    </div>

</section><!-- #content end -->