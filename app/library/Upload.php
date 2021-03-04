<?php
namespace App\library;


/**
 * This is a file upload class for processing file upload
 *
 */
class Upload
{
    /**
     * @var object
     */
    private $file;

//    public function __construct()
//    {
//
//    }

    /**
     * get file object from request
     *
     * @param string $file
     * @return $this
     */

    public function make($file) {
        $this->file = $_FILES[$file]['tmp_name'];
        return $this;
    }

    /**
     * Save the requested file to the given path
     *
     * @param string $upload_path
     * @return bool
     */
    public function save($upload_path) {
        return move_uploaded_file($this->file,$upload_path);
    }

    /**
     * check the requested file is exist
     *
     * @param string $fileName
     * @return bool
     */
    public function fileExists($fileName){
        if(isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] != UPLOAD_ERR_NO_FILE){
            return true;
        }
        return;
    }
}