<?php

class Payments extends \PDO
{


    private $db = null;

    /**
     * Settings constructor.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function payPalConfig()
    {
        PayPal_Digital_Goods_Configuration::username( 'PAYPAL_API_USERNAME' );
        PayPal_Digital_Goods_Configuration::password( 'PAYPAL_API_PASSWORD' );
        PayPal_Digital_Goods_Configuration::signature( 'PAYPAL_API_SIGNATURE' );

        PayPal_Digital_Goods_Configuration::return_url( 'http://example.com/return.php?paypal=paid' );
        PayPal_Digital_Goods_Configuration::cancel_url( 'http://example.com/return.php?paypal=cancel' );
        PayPal_Digital_Goods_Configuration::notify_url( 'http://example.com/return.php?paypal=notify' );

        PayPal_Digital_Goods_Configuration::currency( 'DKK' ); // 3 char character code, must be one of the values here: https://developer.paypal.com/docs/classic/api/currency_codes/
    }
}