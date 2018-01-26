<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="./assets/style.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="./assets/css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/components/bs-filestyle.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="./assets/include/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./assets/include/rs-plugin/css/layers.css">
    <link rel="stylesheet" type="text/css" href="./assets/include/rs-plugin/css/navigation.css">

    <!-- Document Title
    ============================================= -->
    <title><?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?></title>

    <style>

        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

        .tp-video-play-button { display: none !important; }

        .tp-caption { white-space: nowrap; }

    </style>

</head>
