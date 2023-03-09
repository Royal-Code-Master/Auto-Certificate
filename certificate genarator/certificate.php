<?php
require 'connection.php';
if (isset($_GET['id'])) {
    $filename = basename($_GET['id']);
    $filePath = "demo/" . $filename;

    if (file_exists($filePath)) {
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        //read file 
        readfile($filePath);
        exit;
    } else {
        echo "file not exit";
    }
}
