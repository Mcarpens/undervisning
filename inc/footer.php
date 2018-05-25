<!-- Footer
		============================================= -->
<footer id="footer" class="dark">

    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="col_two_third">

                <div class="col_one_third">

                    <div class="widget clearfix">

                        <img src="./assets/img/<?= $settings->footer_logo ?>" alt="" class="footer-logo">

                        <p><?= $settings->footer_description ?></p>

                        <div style="background: url('./assets/img/world-map.png') no-repeat center center; background-size: 100%;">
                            <address>
                                <strong>Hovedkvarter:</strong><br>
                                <?= $settings->address ?><br>
                                <?= $settings->city ?>, <?= $settings->country ?><br>
                            </address>
                            <abbr title="Phone Number"><strong>Telefon:</strong></abbr> (+45) <?= $settings->phone ?><br>
                            <abbr title="Email Address"><strong>Email:</strong></abbr> <a href="mail:<?= $settings->email ?>"><?= $settings->email ?></a>
                        </div>

                    </div>

                </div>

                <div class="col_one_third">

                    <div class="widget widget_links clearfix">

                        <h4>Sider</h4>

                        <ul>
                            <?php
                            foreach ($setting->getAllMenu() as $menu) {
                                echo '<li>';
                                echo '<a href="./index.php?side=' . $menu->link . '">' . $menu->name . '</a>';
                                echo '</li>';
                            }
                            foreach ($setting->getAllWebshopSettings() as $webshop) {
                                echo '';
                            }
                            if ($webshop->shop_online == 1) {
                                echo '<li><a href="?side=webshop"> Webshop</a></li>';
                            }
                            ?>
                            <li><a href="?side=kontakt"> Kontakt</a></li>
                            <li><a href="?side=logind"> Logind</a></li>
                            <li><a href="?side=opret"> Opret Bruger</a></li>
                        </ul>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget clearfix">
                        <h4>Seneste Blogs</h4>

                        <div id="post-list-footer">

                            <?php foreach ($blogs->getNewestBlogs() as $blog) { ?>
                            <div class="spost clearfix">
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="?side=nyhed&id=<?= $blog->id ?>"><?= $blog->title ?></a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li><?= $blog->timestamp ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>

                </div>

            </div>

            <div class="col_one_third col_last">

                <div class="widget clearfix" style="margin-bottom: -20px;">

                    <h4>Nyhedsbrev</h4>

                </div>

                <div class="widget subscribe-widget clearfix">
                    <h5><strong>Tilmeld</strong> dig til vores fantastiske nyhedsbreve:</h5>
                    <div class="widget-subscribe-form-result"></div>
                    <form id="widget-subscribe-form" action="./assets/include/subscribe.php" role="form" method="post" class="nobottommargin">
                        <div class="input-group divcenter">
                            <span class="input-group-addon"><i class="icon-email2"></i></span>
                            <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Indtast din email adresse">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Tilmeld</button>
                            </span>
                        </div>
                    </form>
                </div>

<!--                <div class="widget clearfix" style="margin-bottom: -20px;">-->
<!---->
<!--                    <div class="row">-->
<!---->
<!--                        <div class="col-md-6 clearfix bottommargin-sm">-->
<!--                            <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">-->
<!--                                <i class="icon-facebook"></i>-->
<!--                                <i class="icon-facebook"></i>-->
<!--                            </a>-->
<!--                            <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>-->
<!--                        </div>-->
<!--                        <div class="col-md-6 clearfix">-->
<!--                            <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">-->
<!--                                <i class="icon-rss"></i>-->
<!--                                <i class="icon-rss"></i>-->
<!--                            </a>-->
<!--                            <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->

            </div>

        </div><!-- .footer-widgets-wrap end -->

    </div>

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">

        <div class="container clearfix">

            <div class="col_half">
                Copyrights &copy; 2017 - <?= date('Y') ?>, Alle Rettigheder Overholdt af <?= $settings->site_name ?>.<br>
                <div class="copyright-links"><a href="?side=terms">Terms of Use</a> / <a href="?side=policy">Privacy Policy</a></div>
            </div>

            <div class="col_half col_last tright">
<!--                <div class="fright clearfix">-->
<!--                    <a href="#" class="social-icon si-small si-borderless si-facebook">-->
<!--                        <i class="icon-facebook"></i>-->
<!--                        <i class="icon-facebook"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-twitter">-->
<!--                        <i class="icon-twitter"></i>-->
<!--                        <i class="icon-twitter"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-gplus">-->
<!--                        <i class="icon-gplus"></i>-->
<!--                        <i class="icon-gplus"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-pinterest">-->
<!--                        <i class="icon-pinterest"></i>-->
<!--                        <i class="icon-pinterest"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-vimeo">-->
<!--                        <i class="icon-vimeo"></i>-->
<!--                        <i class="icon-vimeo"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-github">-->
<!--                        <i class="icon-github"></i>-->
<!--                        <i class="icon-github"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-yahoo">-->
<!--                        <i class="icon-yahoo"></i>-->
<!--                        <i class="icon-yahoo"></i>-->
<!--                    </a>-->
<!---->
<!--                    <a href="#" class="social-icon si-small si-borderless si-linkedin">-->
<!--                        <i class="icon-linkedin"></i>-->
<!--                        <i class="icon-linkedin"></i>-->
<!--                    </a>-->
<!--                </div>-->

                <div class="clear"></div>

                <i class="icon-envelope2"></i> <?= $settings->email ?> <span class="middot">&middot;</span> <i class="icon-phone"></i> +45 <?= $settings->phone ?>
            </div>

        </div>

    </div><!-- #copyrights end -->

</footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="./assets/js/jquery.js"></script>
<script type="text/javascript" src="./assets/js/plugins.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDGvkji1ljVXv_v4z_u9cETBFljmOXAKIo"></script>
<script type="text/javascript" src="./assets/js/jquery.gmap.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="./assets/js/functions.js"></script>

<!-- Bootstrap File Upload Plugin -->
<script type="text/javascript" src="./assets/js/components/bs-filestyle.js"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script type="text/javascript" src="./assets/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="./assets/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>

<script type="text/javascript">

    $('#google-map1').gMap({

        address: 'Farum Hovedgade 10F',
        maptype: 'ROADMAP',
        zoom: 14,
        markers: [
            {
                address: "Farum Hovedgade 10F"
            }
        ],
        doubleclickzoom: false,
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
        }

    });

</script>

<script type="text/javascript">

    var tpj = jQuery;

    var revapi202;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_579_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_579_1");
        } else {
            revapi202 = tpj("#rev_slider_579_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "assets/include/rs-plugin/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                responsiveLevels: [1140, 1024, 778, 480],
                visibilityLevels: [1140, 1024, 778, 480],
                gridwidth: [1140, 1024, 778, 480],
                gridheight: [728, 768, 960, 720],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll:"off",
                    disableFocusListener:false,
                },
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:300,
                    levels:[2,4,6,8,10,12,14,16,18,20,22,24,49,50,51,55],
                },
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "hermes",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div>	<div class="tp-arr-titleholder">{{title}}</div>	</div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                }
            });
            revapi202.bind("revolution.slide.onloaded",function (e) {
                setTimeout( function(){ SEMICOLON.slider.sliderParallaxDimensions(); }, 200 );
            });

            revapi202.bind("revolution.slide.onchange",function (e,data) {
                SEMICOLON.slider.revolutionSliderMenu();
            });
        }
    }); /*ready*/

    // Upload forms //
    $(document).on('ready', function() {

        $("#input-5").fileinput({showCaption: false});

        $("#input-6").fileinput({
            showUpload: false,
            maxFileCount: 10,
            mainClass: "input-group-lg",
            showCaption: true
        });

        $("#input-8").fileinput({
            mainClass: "input-group-md",
            showUpload: true,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"icon-picture\"></i> ",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"icon-upload\"></i> "
        });

        $("#input-9").fileinput({
            previewFileType: "text",
            allowedFileExtensions: ["txt", "md", "ini", "text"],
            previewClass: "bg-warning",
            browseClass: "btn btn-primary",
            removeClass: "btn btn-default",
            uploadClass: "btn btn-default",
        });

        $("#input-10").fileinput({
            showUpload: false,
            layoutTemplates: {
                main1: "{preview}\n" +
                "<div class=\'input-group {class}\'>\n" +
                "   <div class=\'input-group-btn\'>\n" +
                "       {browse}\n" +
                "       {upload}\n" +
                "       {remove}\n" +
                "   </div>\n" +
                "   {caption}\n" +
                "</div>"
            }
        });

        $("#input-11").fileinput({
            maxFileCount: 1,
            allowedFileTypes: ["image"],
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"icon-picture\"></i> ",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"icon-upload\"></i> "
        });

        $("#input-12").fileinput({
            showPreview: false,
            allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
            elErrorContainer: "#errorBlock"
        });
    });

</script>

</body>
</html>