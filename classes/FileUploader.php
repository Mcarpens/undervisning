<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 26-01-2018
 * Time: 11:02
 */

class FileUploader {
    private $_errors = [
        1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        3 => "The uploaded file was only partially uploaded",
        4 => "No file was uploaded",
        6 => "Missing a temporary folder. Introduced in PHP 5.0.3",
        7 => "Failed to write file to disk. Introduced in PHP 5.1.0",
        8 => "A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help. Introduced in PHP 5.2.0."
    ];
    private $_fileFolder;
    private $_thumbFolder;
    public $mimetype = [
        'image/png',
        'image/jpeg',
        'image/jpg',
        'image/gif'
    ];
    protected $currentFile = NULL;
    public function __construct($fileFolder = "img/", $thumbFolder = null)
    {
        $this->_fileFolder = $fileFolder;
        if(!file_exists($this->_fileFolder)){
            mkdir($this->_fileFolder, 0777, true);
        }
        if($thumbFolder === null){
            $this->_thumbFolder = $fileFolder . 'thumb/';
        }
        if(!file_exists($this->_thumbFolder)){
            mkdir($this->_thumbFolder, 0777, true);
        }
    }
    /**
     * Undocumented function
     *
     * @param string $fileInput
     * @return array
     */
    public function fileUpload($fileInput, $maxWidth = null, $maxHeight = null, $quality = null)
    {
        if(isset($_FILES[$fileInput])){
            echo "<pre>",print_r($_FILES),"</pre>";
            $this->currentFile = $_FILES[$fileInput];
            // tjekker om at der er error kode som matcher vores fejlbeskeder
            if(array_key_exists($this->currentFile['error'], $this->_errors)){
                return [
                    'success' => false,
                    'msg' => $this->_errors[$this->currentFile['error']]
                ];
            }
            // tjekker om at mimetypen matcher det tilladte
            if(!in_array($this->currentFile['type'], $this->mimetype)){
                return [
                    'success' => false,
                    'msg' => "The uploaded file type is not allowed!"
                ];
            }
            $newName = time() . '_' . $this->currentFile['name'];
            if (move_uploaded_file($this->currentFile["tmp_name"], $this->_fileFolder . $newName)) {
                if($maxWidth !== null && $maxHeight !== null){
                    if(($this->currentFile['type'] === 'image/jpg') || ($this->currentFile['type'] === 'image/jpeg')){
                        if($quality !== null){
                            imagejpeg($this->resizeImage($this->_fileFolder . $newName, $this->currentFile['type'], $maxWidth, $maxHeight), $this->_thumbFolder . $newName, $quality);
                        } else {
                            imagejpeg($this->resizeImage($this->_fileFolder . $newName, $this->currentFile['type'], $maxWidth, $maxHeight), $this->_thumbFolder . $newName);
                        }
                    }
                    if($this->currentFile['type'] === 'image/png'){
                        if($quality !== null){
                            imagepng($this->resizeImage($this->_fileFolder . $newName, $this->currentFile['type'], $maxWidth, $maxHeight), $this->_thumbFolder . $newName, $quality);
                        } else {
                            imagepng($this->resizeImage($this->_fileFolder . $newName, $this->currentFile['type'], $maxWidth, $maxHeight), $this->_thumbFolder . $newName);
                        }
                    }
                    if($this->currentFile['type'] === 'image/gif'){
                        imagegif($this->resizeImage($this->_fileFolder . $newName, $this->currentFile['type'], $maxWidth, $maxHeight), $this->_thumbFolder . $newName);
                    }
                }
                return [
                    'success' => true,
                    'msg' => "The file ". basename($this->_fileFolder . $newName). " has been uploaded.",
                    'filename' => $newName
                ];
            } else {
                return [
                    'success' => false,
                    'msg' => "Sorry, there was an error uploading your file."
                ];
            }
        }
    }

    /**
     * @param $filename
     * @param $mime
     * @param $max_width
     * @param $max_height
     * @return resource
     */
    private function resizeImage($filename, $mime, $max_width, $max_height)
    {
        list($orig_width, $orig_height) = getimagesize($filename);
        $width = $orig_width;
        $height = $orig_height;
        # taller
        if ($height > $max_height) {
            $width = ($max_height / $height) * $width;
            $height = $max_height;
        }
        # wider
        if ($width > $max_width) {
            $height = ($max_width / $width) * $height;
            $width = $max_width;
        }
        $image_p = imagecreatetruecolor($width, $height);
        if(($mime === 'image/jpeg') || ($mime === 'image/jpg')){
            $image = imagecreatefromjpeg($filename);
        }
        if($mime === 'image/png'){
            $image = imagecreatefrompng($filename);
        }
        if($mime === 'image/gif'){
            $image = imagecreatefromgif($filename);
        }
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
        return $image_p;
    }
}