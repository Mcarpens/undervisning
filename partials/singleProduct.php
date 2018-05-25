<?php
$singleProd = $products->singleProduct($_GET['id']);
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
foreach($currentSizes as $sizes) {
    $currentSizesArray[$i2] = $sizes->size_id;
    $i2++;
}
$i2 = 0;

//$i3 = 0;
//$currentBasketArray = [];
//foreach($currentBasket as $basket) {
//    $currentBasketArray[$i3] = $basket->antal;
//    $i++;
//}
//$i3 = 0;

foreach ($setting->getAllWebshopSettings() as $webshop) {
    echo '';
}
if ($webshop->shop_online == 0) {
    $user->redirect('404');
}

// Indkøbskurv logik //
if(isset($_GET['action']) && $_GET['action'] === 'add') {
    if ($singleProd->on_sale == 1) {
        $minKurv->PutIKurv($singleProd->id, $_POST['quantity'], $singleProd->sale_price, $singleProd->name, $singleProd->image);
        $user->redirect('produkt&id='. $singleProd->id . '');
    } else {
        $minKurv->PutIKurv($singleProd->id, $_POST['quantity'], $singleProd->price, $singleProd->name, $singleProd->image);
        $user->redirect('produkt&id='. $singleProd->id . '');
    }
}

if(isset($_GET['add'])){
    $minKurv->RetVare($_GET['add'], 1);
    header('Location: index.php?kurv');
}

if(isset($_GET['minus'])){
    $minKurv->MinusVare($_GET['minus'], 1);
    header('Location: index.php?kurv');
}

if(isset($_GET['remove'])){
    $minKurv->SletVare($_GET['remove'], 1);
    header('Location: index.php?kurv');
}

?>

<?php if(isset($_GET['kurv'])): require_once './inc/basket.php'; ?>
<?php endif; //else: ?>
<?php if((!isset($_GET['opret'])) && (!isset($_GET['kurv']))) : ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $singleProd->name ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">Hjem</a></li>
            <li><a href="#">Webshop</a></li>
            <li class="active">Produkt : <?= $singleProd->name ?></li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="single-product">

                <div class="product">

                    <div class="col_two_fifth">

                        <!-- Product Single - Gallery
                        ============================================= -->
                        <div class="product-image">
                            <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        <div class="slide" data-thumb="./assets/img/produkter/thumb/<?= $singleProd->image ?>"><a href="./assets/img/produkter/<?= $singleProd->image ?>" title="<?= $singleProd->name ?>" data-lightbox="gallery-item"><img src="./assets/img/produkter/<?= $singleProd->image ?>" alt="<?= $singleProd->name ?>"></a></div>
                                    </div>
                                </div>
                            </div>
                            <?php if($singleProd->on_sale === 1) { ?>
                            <div class="sale-flash"><?= $singleProd->sale_text ?></div>
                            <?php } ?>
                        </div>

                        <!-- Product Single - Gallery End -->

                    </div>

                    <div class="col_two_fifth product-desc">

                        <!-- Product Single - Price
                        ============================================= -->
                        <?php if($singleProd->on_sale == 0) { ?>
                            <div class="product-price"><?= $singleProd->price ?> DKK</div>
                        <?php } else { ?>
                            <div class="product-price"><del><?= $singleProd->price ?> DKK</del> <ins><?= $singleProd->sale_price ?> DKK</ins></div>
                            <!-- Product Single - Price End -->
                        <?php } ?>
                        <!-- Product Single - Price End -->

                        <!-- Product Single - Rating
                        ============================================= -->
                        <div class="product-rating">
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star-half-full"></i>
                            <i class="icon-star-empty"></i>
                        </div>
                        <!-- Product Single - Rating End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Quantity & Cart Button
                        ============================================= -->
                        <form class="cart nobottommargin clearfix" action="?side=produkt&id=<?= $singleProd->id ?>&action=add&id=<?= $singleProd->id ?>" method="post" enctype='multipart/form-data'>
                            <div class="quantity clearfix">
                                <input type="number" name="quantity" value="1" class="qty" size="4" min="1" max="<?= @$singleProd->stock ?>">

                                <input type="hidden" value="<?= $singleProd->name ?>" name="navn">
                                <input type="hidden" value="<?= $singleProd->price ?>" name="price">
                                <input type="hidden" value="<?= $singleProd->image ?>" name="billede">
                            </div>
                            <button type="submit" name="cart" class="add-to-cart button nomargin">Tilføj til Kurv</button>
                        </form>
                        <!-- Product Single - Quantity & Cart Button End -->

                        <div class="clear"></div>
                        <div class="line"></div>

                        <!-- Product Single - Short Description
                        ============================================= -->
                        <p><?= strlen($singleProd->short_description) >= 500 ? substr($singleProd->short_description,0,500) . '...'  : $singleProd->short_description ?></p>

                        <!-- Product Single - Meta
                        ============================================= -->
                        <div class="panel panel-default product-meta">
                            <div class="panel-body">
                                <span itemprop="productID" class="sku_wrapper">Produkt Nummer (SKU): <span class="sku"><?= $singleProd->product_number ?></span></span>
                                <span class="posted_in">Kategori: <a rel="tag">Andet</a>.</span>
                                <span class="tagged_as">Tags: <a rel="tag">Andet</a>,</span>
                            </div>
                        </div><!-- Product Single - Meta End -->

                        <!-- Product Single - Share
                        ============================================= -->
<!--                        <div class="si-share noborder clearfix">-->
<!--                            <span>Share:</span>-->
<!--                            <div>-->
<!--                                <a href="#" class="social-icon si-borderless si-facebook">-->
<!--                                    <i class="icon-facebook"></i>-->
<!--                                    <i class="icon-facebook"></i>-->
<!--                                </a>-->
<!--                                <a href="#" class="social-icon si-borderless si-twitter">-->
<!--                                    <i class="icon-twitter"></i>-->
<!--                                    <i class="icon-twitter"></i>-->
<!--                                </a>-->
<!--                                <a href="#" class="social-icon si-borderless si-pinterest">-->
<!--                                    <i class="icon-pinterest"></i>-->
<!--                                    <i class="icon-pinterest"></i>-->
<!--                                </a>-->
<!--                                <a href="#" class="social-icon si-borderless si-gplus">-->
<!--                                    <i class="icon-gplus"></i>-->
<!--                                    <i class="icon-gplus"></i>-->
<!--                                </a>-->
<!--                                <a href="#" class="social-icon si-borderless si-rss">-->
<!--                                    <i class="icon-rss"></i>-->
<!--                                    <i class="icon-rss"></i>-->
<!--                                </a>-->
<!--                                <a href="#" class="social-icon si-borderless si-email3">-->
<!--                                    <i class="icon-email3"></i>-->
<!--                                    <i class="icon-email3"></i>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->

                        <!-- Product Single - Share End -->

                    </div>



                    <div class="col_one_fifth col_last">
                        <?php foreach ($setting->getAllWebshopSettings() as $webSettings) { ?>

                            <a href="<?= $webSettings->shop_brand_logo_link ?>" target="_blank" title="Brand Logo" class="hidden-xs"><img class="image_fade" src="./assets/img/shop/<?= $webSettings->shop_brand_logo ?>" alt="Brand Logo"></a>

                            <div class="divider divider-center"><i class="icon-circle-blank"></i></div>
                            <?php foreach ($setting->getAllWebshopSettingsMoreInfo() as $setMoreInfo) { ?>
                                <div class="feature-box fbox-plain fbox-dark fbox-small">
                                    <div class="fbox-icon">
                                        <i class="<?= $setMoreInfo->icon ?>"></i>
                                    </div>
                                    <h3><?= $setMoreInfo->title ?></h3>
                                    <p class="notopmargin"><?= $setMoreInfo->description ?></p>
                                </div>
                            <?php } } ?>
                    </div>

                    <div class="col_full nobottommargin">

                        <div class="tabs clearfix nobottommargin" id="tab-1">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="hidden-xs"> Beskrivelse</span></a></li>
                                <li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="hidden-xs"> Yderligere Information</span></a></li>
                                <li><a href="#tabs-3"><i class="icon-star3"></i><span class="hidden-xs"> Anmeldelser (2)</span></a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <p><?= $singleProd->description ?></p>
                                </div>
                                <div class="tab-content clearfix" id="tabs-2">

                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Størrelse</td>
                                            <td>
                                                <?php $data = $products->getSizes($_GET['id']);
                                                foreach ($data as $size) { $singleSizes = $products->getMoreSizes($size->size_id);
                                                    if ($size->size_id == 17) { ?>
                                                        Ikke angivet
                                                        <?php } else { ?>
                                                        <?= $singleSizes[0]->name; ?> &bull;
                                                <?php } } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Farver</td>
                                            <td>
                                                <?php $data = $products->getBlobs($_GET['id']);
                                                foreach ($data as $color) { $singleColor = $products->getMoreColors($color->color_id);
                                                    if($color->color_id == 13) { ?>
                                                        Ikke angivet
                                                        <?php } else { ?>
                                                        <img src="./assets/img/farver/<?= $singleColor[0]->cimage ?>" title="<?= $singleColor[0]->cname ?>"> &nbsp;
                                                <?php } } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Højde</td>
                                            <td>
                                                <?php if($singleProd->height == 0) { ?>
                                                    Ikke angivet.
                                                <?php } else { ?>
                                                    <?= $singleProd->height ?> cm.
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Længde</td>
                                            <td><?php if($singleProd->length == 0) { ?>
                                                    Ikke angivet.
                                                <?php } else { ?>
                                                    <?= $singleProd->length ?> cm.
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-content clearfix" id="tabs-3">

                                    <div id="reviews" class="clearfix">

                                        <ol class="commentlist clearfix">

                                            <li class="comment even thread-even depth-1" id="li-comment-1">
                                                <div id="comment-1" class="comment-wrap clearfix">

                                                    <div class="comment-meta">
                                                        <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                                        </div>
                                                    </div>

                                                    <div class="comment-content clearfix">
                                                        <div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2014 at 10:46AM</a></span></div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo perferendis aliquid tenetur. Aliquid, tempora, sit aliquam officiis nihil autem eum at repellendus facilis quaerat consequatur commodi laborum saepe non nemo nam maxime quis error tempore possimus est quasi reprehenderit fuga!</p>
                                                        <div class="review-comment-ratings">
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star-half-full"></i>
                                                        </div>
                                                    </div>

                                                    <div class="clear"></div>

                                                </div>
                                            </li>

                                            <li class="comment even thread-even depth-1" id="li-comment-1">
                                                <div id="comment-1" class="comment-wrap clearfix">

                                                    <div class="comment-meta">
                                                        <div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                                        </div>
                                                    </div>

                                                    <div class="comment-content clearfix">
                                                        <div class="comment-author">Mary Jane<span><a href="#" title="Permalink to this comment">June 16, 2014 at 6:00PM</a></span></div>
                                                        <p>Quasi, blanditiis, neque ipsum numquam odit asperiores hic dolor necessitatibus libero sequi amet voluptatibus ipsam velit qui harum temporibus cum nemo iste aperiam explicabo fuga odio ratione sint fugiat consequuntur vitae adipisci delectus eum incidunt possimus tenetur excepturi at accusantium quod doloremque reprehenderit aut expedita labore error atque?</p>
                                                        <div class="review-comment-ratings">
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star3"></i>
                                                            <i class="icon-star-empty"></i>
                                                            <i class="icon-star-empty"></i>
                                                        </div>
                                                    </div>

                                                    <div class="clear"></div>

                                                </div>
                                            </li>

                                        </ol>

                                        <!-- Modal Reviews
                                        ============================================= -->
                                        <a href="#" data-toggle="modal" data-target="#reviewFormModal" class="button button-3d nomargin fright">Opret en anmeldelse</a>

                                        <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="reviewFormModalLabel">Opret anmeldelse</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="nobottommargin" id="template-reviewform" name="template-reviewform" action="#" method="post">

                                                            <div class="col_half">
                                                                <label for="template-reviewform-name">Navn <small>*</small></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" id="template-reviewform-name" name="template-reviewform-name" value="" class="form-control required" />
                                                                </div>
                                                            </div>

                                                            <div class="col_half col_last">
                                                                <label for="template-reviewform-email">Email <small>*</small></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">@</span>
                                                                    <input type="email" id="template-reviewform-email" name="template-reviewform-email" value="" class="required email form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="clear"></div>

                                                            <div class="col_full col_last">
                                                                <label for="template-reviewform-rating">Rating</label>
                                                                <select id="template-reviewform-rating" name="template-reviewform-rating" class="form-control">
                                                                    <option value="" disabled>-- Vælg en --</option>
                                                                    <option value="1">1 Stjerne</option>
                                                                    <option value="2">2 Stjerner</option>
                                                                    <option value="3">3 Stjerner</option>
                                                                    <option value="4">4 Stjerner</option>
                                                                    <option value="5">5 Stjerner</option>
                                                                </select>
                                                            </div>

                                                            <div class="clear"></div>

                                                            <div class="col_full">
                                                                <label for="template-reviewform-comment">Kommentar <small>*</small></label>
                                                                <textarea class="required form-control" id="template-reviewform-comment" name="template-reviewform-comment" rows="6" cols="30"></textarea>
                                                            </div>

                                                            <div class="col_full nobottommargin">
                                                                <button class="button button-3d nomargin" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="submit">Opret anmeldelse</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Luk</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!-- Modal Reviews End -->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->
<?php endif; ?>