<?php
error_reporting('NONE')
?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Avanceret Søgning</h1>
        <ol class="breadcrumb">
            <li><a href="?side=forside">Forside</a></li>
            <li class="active">Søgning</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <form method="post" action="" role="form" class="nobottommargin">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" name="searchContent" placeholder="Indtast dit søgeord her..." value="<?= @$_POST['searchContent'] ?>">
                    <span class="input-group-btn">
                        <input class="btn btn-success" name="btn_search" type="submit" value="Søg">
                    </span>
                </div>
            </form>
            <br><hr><br>

            <?php

            if(isset($_POST['btn_search'])) {

                $search->search($_POST['searchContent']);

                if (strLen($_POST['searchContent']) >= 2 && $search->productCount != 0){

                    echo "<div id='searchProductsContainer'>";

                    for ($i = 0; $i < $search->productCount; $i++) {
                        $id = $search->productId[$i];
                        $title = $search->productTitle[$i];
                        $image = $search->productImage[$i];
                        $description = $search->productDescription[$i];

                        $prod = $products->singleProduct($id);
                        $blog = $blogs->singleBlog($id);

                        if($prod->id == $id) { ?>
                            <div class='col-sm-6 col-md-4'>
                                <div class='thumbnail'>
                                    <img data-src='./assets/img/produkter/thumb/<?= $image ?>' alt='300x200' src='./assets/img/produkter/thumb/<?= $image ?>' style='display: block;'>
                                    <div class='caption'>
                                        <h3 style='text-align: center; margin-top: 10px'><?= $title ?></h3>
                                        <p style='text-align: center'><?= strlen($description) > 50 ? substr($description, 0 , 50) : $description ?></p>
                                        <a href='?side=produkt&id=<?= $id ?>' class='btn btn-primary' role='button'>Se mere</a>
                                    </div>
                                </div>
                            </div>
                        <?php } else if($blog->id == $id) { ?>
                            <div class='col-sm-6 col-md-4'>
                                <div class='thumbnail'>
                                    <img data-src='./assets/img/blogs/thumb/<?= $image ?>' alt='300x200' src='./assets/img/blogs/thumb/<?= $image ?>' style='display: block;'>
                                    <div class='caption'>
                                        <h3 style='text-align: center; margin-top: 10px'><?= $title ?></h3>
                                        <p style='text-align: center'><?= strlen($description) > 50 ? substr($description, 0 , 50) : $description ?></p>
                                        <a href='?side=nyhed&id=<?= $id ?>' class='btn btn-primary' role='button'>Se mere</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ;
                    }
                    echo '<kbd style="position: relative; margin-bottom: 50% ; left: 15%; z-index: 9999">' . $search->productCount . ' Resultater</kbd>';
                    echo "</div>";

                } else{

                    $errorMessage = array();

                    //checks what the error is

                    if ($search->productCount == 0){

                        $errorMessage[] = $search->searchError("no_results");

                    }

                    if(strLen($_POST['searchContent']) < 2){

                        $errorMessage[] = $search->searchError("too_short");

                    }

                    echo "<div id='searchError'>";

                    foreach ($errorMessage as $error){
                        echo "<div class='style-msg errormsg'>
                                     <div class='sb-msg'>
                                        <i class='icon-remove'></i>
                                        <strong>".$error."</strong>
                                     </div>
                                  </div>";
                    }

                    echo "</div>";


                }
            }

            ?>
        </div>

    </div>

</section><!-- #content end -->


