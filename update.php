<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 15-01-2018
 * Time: 10:39
 */

// Update Script
// -------------------------------
$zip_filename = "master.zip"; /// The filename of the zip filename. Can be edited!
$zip_path = "https://github.com/Mcarpens/undervisning/archive/"; /// The path to the zip file. Can be edited!
$filename = $zip_path . '/' .$zip_filename;

if (file_exists('versions/')) {
    $stmt = "";
} else {
    mkdir('versions/', 0755, true);
}

file_put_contents("versions/" . "/" . $zip_filename, fopen($filename, 'r'));
$new_filename = 'versions/' . "/" . $zip_filename; // Only used to check the error handling

$integrity_check = sha1_file($filename);
$sha1file = sha1_file($new_filename); // Can be edited to the $testpath for checking the error handling. Default: $new_filename

if($integrity_check === $sha1file) {

} else {
    unlink("versions/" . "/" . $zip_filename);
    file_put_contents("versions/" . "/" . $zip_filename, fopen($filename, 'r'));
    $new_filename = 'versions/' . "/" . $zip_filename;
}

if($integrity_check === $sha1file) {

} else {
    unlink("versions/" . "/" . $zip_filename);
    file_put_contents("versions/" . "/" . $zip_filename, fopen($filename, 'r'));
    $new_filename = 'versions/' . "/" . $zip_filename;
}

if($integrity_check === $sha1file) {

} else {
    unlink("versions/" . "/" . $zip_filename);

}

if(file_exists($new_filename)) {
    $md5file = md5_file($new_filename);
    $sha1file = sha1_file($new_filename);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Updater for the CSYS Indexer">
    <meta name="author" content="Carpens Systems, PMV">

    <title>Updating</title>

    <link rel="shortcut icon" href="resources/themes/bootstrap/img/folder.png">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

    <link rel="stylesheet" type="text/css" href="resources/themes/bootstrap/css/style.css">

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body id="update-body">

<div class="col-lg-12" id="form" align="center">
    <?php
    if($integrity_check === $sha1file) {
        $zip = new ZipArchive;
        $res = $zip->open($new_filename);
        if ($res === TRUE) {
            $zip->extractTo(__DIR__);
            $zip->close();
            echo "
                <div class='col-md-12' id='update-success'>
                    <h3><i class='fa fa-check-circle'></i> Update success <i class='fa fa-check-circle'></i></h3>
                    <p class='lead'>The project has been updated.</p>
                    <table class='table table-striped'>
                            <tr>
                                <td>MD5</td>
                                <td>$md5file</td>
                            </tr>
                            <tr>
                                <td>SHA1</td>
                                <td>$sha1file</td>
                            </tr>
                        </table>
                    <p><a href='../' class='btn btn-success btn-md'><i class='fa fa-chevron-circle-left'></i> Go back</a></p>
                </div>";
        } else {
            echo "<div class='col-md-12' id='update-error'>
                            <h3><i class='fa fa-exclamation-triangle'></i> Update error <i class='fa fa-exclamation-triangle'></i></h3>
                            <p>The updater encountered an critical error while trying to update.</p>
                            <p><a href='' id='try-again' class='btn btn-danger btn-md'><i class='fa fa-refresh'></i> Try again</a> &nbsp; &nbsp; <a href='../' class='btn btn-primary'><i class='fa fa-chevron-circle-left'></i> Go back</a></p>
                          </div>";}
    } else {
        echo "<div class='col-md-12' id='update-error'>
                            <h3><i class='fa fa-exclamation-triangle'></i> Update error <i class='fa fa-exclamation-triangle'></i></h3>
                            <p>The updater encountered an file integrity error while trying to update.</p>
                            <p>Please try again, and see if that dosen't fix the problem.</p>
                            <p><a href='' id='try-again' class='btn btn-danger btn-md'><i class='fa fa-refresh'></i> Try again</a> &nbsp; &nbsp; <a href='../' class='btn btn-primary'><i class='fa fa-chevron-circle-left'></i> Go back</a></p>
                          </div>";
    }
    ?>
</div>

</body>
</html>