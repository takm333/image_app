<?php

function download_image($filepath){
    header('Content-type: image/png');
    header('Content-Disposition:attachment;filename = "'. basename($filepath) .'"');
    header('Content-Length: '. filesize($filepath));
    echo file_get_contents($filepath);
    exit();
}


function download_zip($folder_path){
    $zip = new ZipArchive;
    $files = glob($folder_path . '/*');
    $zip_file_name = $folder_path . '_image.zip';
    $zip->open($zip_file_name, ZipArchive::CREATE);
    foreach($files as $file){
        $zip->addFile($file,basename($file));
    }
    $zip->close();

    header('Content-type: image/png');
    header('Content-Disposition:attachment;filename = "'. basename($zip_file_name) .'"');
    header('Content-Length: '. filesize($zip_file_name));
    echo file_get_contents($zip_file_name);
    exit();
}
?>
