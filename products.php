<?php foreach ($setting->getAllWebshopSettings() as $webshop) {
    echo '';
}
if ($webshop->shop_online == 0) {
    $user->redirect('404');
}
?>
<!-- Page Title
    ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <?php foreach ($setting->getAllWebshopSettings() as $webSettings); { ?>
            <h1><?= $webSettings->shop_nav_title ?></h1>
            <span><?= $webSettings->shop_nav_subtitle ?></span>
        <?php } ?>
        <ol class="breadcrumb">
            <li><a href="#">Hjem</a></li>
            <li class="active">Webshop</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin col_last">

                <!-- Shop
                ============================================= -->
                <div id="shop" class="shop product-3 grid-container clearfix">

                    <?php foreach($products->allProducts() as $product) { ?>
                        <div class="product sf-dress clearfix">
                            <div class="product-image">
                                <a href="#"><img style="border: 1px solid #999; padding: 10px; border-radius: 3px; background: linear-gradient(#fff, #ececec)" src="./assets/img/produkter/thumb/<?= $product->image ?>" alt="<?= $product->name ?>"></a>
                                <?php if($product->on_sale == 1) { ?>
                                    <div class="sale-flash"><?= $product->sale_text ?></div>
                                <?php } ?>
                                <div class="product-overlay">

                                    <a style="width: 100%" href="?side=produkt&id=<?=$product->id?>" class="item-quick-view"><i class="icon-zoom-in2"></i><span> Se mere</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title"><h3><a href="#"><?= $product->name ?></a></h3></div>
                                <div class="product-price">
                                    <?php if($product->on_sale == 1) { ?>
                                        <del><?= $product->price ?> DKK</del> <ins><?= $product->sale_price ?> DKK</ins>
                                    <?php } else { ?>
                                        <?= $product->price ?> DKK
                                    <?php } ?>
                                </div>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div><!-- #shop end -->

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin">
                <div class="sidebar-widgets-wrap">

                    <div class="widget widget-filter-links clearfix">

                        <h4>Vælg Kategori</h4>
                        <ul class="custom-filter" data-container="#shop" data-active-class="active-filter">
                            <li class="widget-filter-reset active-filter"><a href="#" data-filter="*">Ryd</a></li>
                            <!--                                <li><a href="#" data-filter=".sf-dress">Dress</a></li>-->
                            <!--                                <li><a href="#" data-filter=".sf-tshirt">Tshirts</a></li>-->
                            <!--                                <li><a href="#" data-filter=".sf-pant">Pants</a></li>-->
                            <!--                                <li><a href="#" data-filter=".sf-sunglass">Sunglasses</a></li>-->
                            <!--                                <li><a href="#" data-filter=".sf-shoes">Shoes</a></li>-->
                            <!--                                <li><a href="#" data-filter=".sf-watch">Watches</a></li>-->
                        </ul>

                    </div>

                    <div class="widget widget-filter-links clearfix">

                        <h4>Sorter efter</h4>
                        <ul class="shop-sorting">
                            <li class="widget-filter-reset active-filter"><a href="#" data-sort-by="original-order">Ryd</a></li>
                            <li><a href="#" data-sort-by="name">Navn</a></li>
                            <li><a href="#" data-sort-by="price_lh">Pris: Lav til Høj</a></li>
                            <li><a href="#" data-sort-by="price_hl">Pris: Høj til Lav</a></li>
                        </ul>

                    </div>

                </div>
            </div><!-- .sidebar end -->

        </div>

    </div>

</section><!-- #content end -->