<?php
$users = $user->getOne($_SESSION['user_id']);

$webset = $setting->getAllWebshopSettings();

PayPal_Digital_Goods_Configuration::username( 'PAYPAL_API_USERNAME' );
PayPal_Digital_Goods_Configuration::password( 'PAYPAL_API_PASSWORD' );
PayPal_Digital_Goods_Configuration::signature( 'PAYPAL_API_SIGNATURE' );

PayPal_Digital_Goods_Configuration::return_url( 'http://example.com/return.php?paypal=paid' );
PayPal_Digital_Goods_Configuration::cancel_url( 'http://example.com/return.php?paypal=cancel' );
PayPal_Digital_Goods_Configuration::notify_url( 'http://example.com/return.php?paypal=notify' );

PayPal_Digital_Goods_Configuration::currency( 'USD' ); // 3 char character code, must be one of the values here: https://developer.paypal.com/docs/classic/api/currency_codes

?>

<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Checkud</h1>
        <ol class="breadcrumb">
            <li><a href="#">Forside</a></li>
            <li><a href="#">Webshop</a></li>
            <li class="active">Checkud</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="col_half">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php if($_SESSION['user_id'] == false) { ?>
                        Allerede kunde? <a href="?side=logind">Klik her for at logge ind</a>
                        <?php } else { ?>
                        Du er logget ind som <u><?= $users->username ?></u>!
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col_half col_last">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Har du en kupon kode? <a href="login-register.html">Klik her for at indtaste din kupon kode</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-6">
                    <h3>Faktura Adresse</h3>

                    <p>Tekst 1</p>

                    <form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">

                        <div class="col_half">
                            <label for="billing-form-name">Fornavn:</label>
                            <input type="text" id="billing-form-name" name="billing-form-name" value="<?= @$users->firstname ?>" class="sm-form-control" />
                        </div>

                        <div class="col_half col_last">
                            <label for="billing-form-lname">Efternavn:</label>
                            <input type="text" id="billing-form-lname" name="billing-form-lname" value="<?= @$users->lastname ?>" class="sm-form-control" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_full">
                            <label for="billing-form-companyname">Firmanavn:</label>
                            <input type="text" id="billing-form-companyname" name="billing-form-companyname" value="" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="billing-form-address">Adresse:</label>
                            <input type="text" id="billing-form-address" name="billing-form-address" value="<?= @$users->address ?>" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="billing-form-address2">Alternativ Adresse:</label>
                            <input type="text" id="billing-form-address2" name="billing-form-adress" value="" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="billing-form-city">By</label>
                            <input type="text" id="billing-form-city" name="billing-form-city" value="<?= @$users->city ?>" class="sm-form-control" />
                        </div>

                        <div class="col_half">
                            <label for="billing-form-email">Email Adresse:</label>
                            <input type="email" id="billing-form-email" name="billing-form-email" value="<?= @$users->email ?>" class="sm-form-control" />
                        </div>

                        <div class="col_half col_last">
                            <label for="billing-form-phone">Telefon nr:</label>
                            <input type="text" id="billing-form-phone" name="billing-form-phone" value="<?= @$users->phone ?>" class="sm-form-control" />
                        </div>

                    </form>
                </div>
                <div class="col-md-6">
                    <h3 class="">Forsendelse Adresse</h3>

                    <form id="shipping-form" name="shipping-form" class="nobottommargin" action="#" method="post">

                        <div class="col_half">
                            <label for="shipping-form-name">Fornavn:</label>
                            <input type="text" id="shipping-form-name" name="shipping-form-name" value="<?= @$users->firstname ?>" class="sm-form-control" />
                        </div>

                        <div class="col_half col_last">
                            <label for="shipping-form-lname">Efternavn:</label>
                            <input type="text" id="shipping-form-lname" name="shipping-form-lname" value="<?= @$users->lastname ?>" class="sm-form-control" />
                        </div>

                        <div class="clear"></div>

                        <div class="col_full">
                            <label for="shipping-form-companyname">Firmanavn:</label>
                            <input type="text" id="shipping-form-companyname" name="shipping-form-companyname" value="" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="shipping-form-address">Adresse:</label>
                            <input type="text" id="shipping-form-address" name="shipping-form-address" value="<?= @$users->address ?>" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="shipping-form-address2">Alternativ Adresse:</label>
                            <input type="text" id="shipping-form-address2" name="shipping-form-adress" value="" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="shipping-form-city">By</label>
                            <input type="text" id="shipping-form-city" name="shipping-form-city" value="<?= @$users->city ?>" class="sm-form-control" />
                        </div>

                        <div class="col_full">
                            <label for="shipping-form-message">Besked <small>*</small></label>
                            <textarea class="sm-form-control" id="mytextarea6" name="shipping-form-message" rows="6" cols="30"></textarea>
                        </div>

                    </form>
                </div>
                <div class="clear bottommargin"></div>
                <div class="col-md-6">
                    <div class="table-responsive clearfix">
                        <h4>Din Indkøbskurv</h4>

                        <table class="table cart">
                            <thead>
                            <tr>
                                <th class="cart-product-thumbnail">&nbsp;</th>
                                <th class="cart-product-name">Produkt</th>
                                <th class="cart-product-quantity">Antal</th>
                                <th class="cart-product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $pris = 0;
                            $moms = 0;
                            $total = 0;

                            foreach ($minKurv->VisKurv() as $key => $value){
                            if ($_SESSION['kurv'] == true) {
                            $pris = $pris + ($value['antal'] * $value['pris']);
                            $moms = $pris * 0.25;
                            $total = $pris + $moms;
                            ?>
                            <tr class="cart_item">
                                <td class="cart-product-thumbnail">
                                    <a href="#"><img width="64" height="64" src="./assets/img/produkter/<?= $value['billede'] ?>" alt="<?= $value['navn'] ?>"></a>
                                </td>

                                <td class="cart-product-name">
                                    <a href="#"><?= $value['navn'] ?></a>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity clearfix">
                                        <?= $value['antal'] ?>
                                    </div>
                                </td>

                                <td class="cart-product-subtotal">
                                    <span class="amount"><?php $formatted_total = $value['antal' ] * $value['pris']; echo number_format($formatted_total, 2, ',', '.') ?> DKK</span>
                                </td>
                            </tr>
                            <?php } } ?>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <h4>Cart Totals</h4>

                        <table class="table cart">
                            <tbody>
                            <tr class="cart_item">
                                <td class="notopborder cart-product-name">
                                    <strong>Kurv Subtotal</strong>
                                </td>

                                <td class="notopborder cart-product-name">
                                    <span class="amount"><?= $formatted_subtotal = number_format($pris, 2, ',', '.'); ?> DKK</span>
                                </td>
                            </tr>

                            <tr class="cart_item">
                                <td class="notopborder cart-product-name">
                                    <strong>Moms af beløbet</strong>
                                </td>

                                <td class="notopborder cart-product-name">
                                    <span class="amount"><?= $formatted_momstotal = number_format($moms, 2, ',', '.'); ?> DKK</span>
                                </td>
                            </tr>

                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Forsendelse</strong>
                                </td>

                                <td class="cart-product-name">
                                    <span class="amount">Free Delivery</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Total</strong>
                                </td>

                                <td class="cart-product-name">
                                    <span class="amount color lead"><strong><?php echo $formatted_total = number_format($total, 2, ',', '.'); ?> DKK</strong></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <?php var_dump($webset) ?>
                    <div class="accordion clearfix">
                        <div class="acctitle"><i class="acc-closed icon-remove-circle"></i><i class="acc-open icon-ok-circle"></i>PayPal</div>
                        <div class="acc_content clearfix">Betal med PayPal</div>
                        <form action="<?= $webset->paypal_url ?>" method="post">
                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business" value="<?php echo $webset->paypal_id; ?>">

                            <!-- Specify a Buy Now button. -->
                            <input type="hidden" name="cmd" value="_xclick">

                            <!-- Specify details about the item that buyers will purchase. -->
                            <input type="hidden" name="item_name" value="<?php echo $value['navn']; ?>">
                            <input type="hidden" name="item_number" value="<?php echo $key; ?>">
                            <input type="hidden" name="amount" value="<?php echo $value['pris']; ?>">
                            <input type="hidden" name="currency_code" value="DKK">

                            <!-- Specify URLs -->
                            <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
                            <input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>

                            <!-- Display the payment button. -->
                            <input type="image" name="submit" border="0"
                                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
                            <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                        </form>

                        <div class="acctitle"><i class="acc-closed icon-remove-circle"></i><i class="acc-open icon-ok-circle"></i>MobilePay</div>
                        <div class="acc_content clearfix">Betal med MobilePay</div>
                    </div>
                    <a href="#" class="button button-3d fright">Gennemfør Ordre</a>

                </div>
            </div>
        </div>

    </div>

</section><!-- #content end -->