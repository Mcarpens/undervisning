<!-- Page Title
    ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Shop</h1>
        <span>Produkter med filter</span>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Filters</a></li>
            <li class="active">Produkter</li>
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
                                <a href="#"><img src="./assets/img/produkter/<?= $product->image ?>" alt="<?= $product->name ?>"></a>
                                <!--                                <div class="sale-flash">50% Off*</div>-->
                                <div class="product-overlay">
                                    <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Tilføj til kurv</span></a>
                                    <a href="?side=produkt&id=<?=$product->id?>" class="item-quick-view"><i class="icon-zoom-in2"></i><span> Se mere</span></a>
                                </div>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title"><h3><a href="#"><?= $product->name ?></a></h3></div>
                                <div class="product-price"><?= $product->price ?> DKK</div>
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
