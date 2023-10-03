<?php
function download_image($image_name){
    header('Content-type: image/png');
    header('Content-Disposition:attachment;filename = "'.$image_name.'"');
    header('Content-Length: '. filesize($image_name));
    echo file_get_contents($image_name);
    exit();
}
?>
