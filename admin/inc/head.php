<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?> - Administrations Panel</title>
    <!-- Bootstrap core CSS-->
    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
<!--    <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>-->
    <link href="./assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="./assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin.css" rel="stylesheet">

    <link href="./assets/custom.css">

    <script src="./assets/main.js"></script>
</head>