<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 27-02-2018
 * Time: 09:34
 */

class Update extends \Notifications
{
    public function runCheck()
    {
        $zip_filename = "master.zip"; /// The filename of the zip filename. Can be edited!
        $zip_path = "https://myfeed.dk/products/undervisning/archive/"; /// The path to the zip file. Can be edited!
        $filename = $zip_path . '/' .$zip_filename;

        if (file_exists('versions/')) {
            $stmt = "";
        } else {
            mkdir('versions/', 0755, true);
        }

        file_put_contents("versions/" . $zip_filename, fopen($filename, 'r'));
        $new_filename = 'versions/' . $zip_filename; // Only used to check the error handling

        $integrity_check = sha1_file($filename);
        $sha1file = sha1_file($new_filename); // Can be edited to the $testpath for checking the error handling. Default: $new_filename

        if($integrity_check === $sha1file) {

        } else {
            unlink("versions/" . $zip_filename);
            file_put_contents("versions/" . $zip_filename, fopen($filename, 'r'));
            $new_filename = 'versions/' . $zip_filename;
        }

        if($integrity_check === $sha1file) {

        } else {
            unlink("versions/" . $zip_filename);
            file_put_contents("versions/" . $zip_filename, fopen($filename, 'r'));
            $new_filename = 'versions/' . $zip_filename;
        }

        if($integrity_check === $sha1file) {

        } else {
            unlink("versions/" . $zip_filename);

        }

        if(file_exists($new_filename)) {
            $md5file = md5_file($new_filename);
            $sha1file = sha1_file($new_filename);
        }

        if($integrity_check === $sha1file) {
            $zip = new ZipArchive;
            $res = $zip->open($new_filename);
            if ($res === TRUE) {
                $zip->extractTo(__DIR__);
                $zip->close();
                $notification->setUpdateNotificationSuccess();
                echo "
                <div class='col-md-12' id='update-success'>
                    <h3><i class='ti-check'></i> Opdateret <i class='ti-check'></i></h3>
                    <p class='lead'>Projektet er blevet opdateret.</p>
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
                    <p><a href='./admin/index.php?side=forside' class='btn btn-success btn-md'><i class='fa fa-chevron-circle-left'></i> Gå tilbage</a></p>
                </div>";
            } else {
                $notification->setUpdateNotificationFailed();
                echo "<div class='col-md-12' id='update-error'>
                            <h3><i class='ti-na'></i> Opdaterings fejl <i class='ti-na'></i></h3>
                            <p>Der opstod en fejl med opdateringen. Prøv venligst igen.</p>
                            <p><a href='./index.php?side=opdater' id='try-again' class='btn btn-danger btn-md'><i class='fa fa-refresh'></i> Prøv igen</a> &nbsp; &nbsp; <a href='./admin/index.php?side=dashboard' class='btn btn-primary'><i class='fa fa-chevron-circle-left'></i> Gå tilbage</a></p>
                          </div>";}
        } else {
            $notification->setUpdateNotificationFailedIntegrity();
            echo "<div class='col-md-12' id='update-error'>
                            <h3><i class='ti-na'></i> Opdaterings fejl <i class='ti-na'></i></h3>
                            <p>Der opstod en fejl med integriteten af den nye opdatering.</p>
                            <p>Prøv venligst igen.</p>
                            <p><a href='./index.php?side=opdater' id='try-again' class='btn btn-danger btn-md'><i class='fa fa-refresh'></i> Prøv igen</a> &nbsp; &nbsp; <a href='./admin/index.php?side=dashboard' class='btn btn-primary'><i class='fa fa-chevron-circle-left'></i> Gå tilbage</a></p>
                          </div>";
        }
    }
}