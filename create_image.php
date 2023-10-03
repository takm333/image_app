<?php
function create_image(){
    $image_name = 'image.png';
    $image = imagecreate(h($_POST['width']),h($_POST['height']));
    imagecolorallocate($image,h($_POST['red']),h($_POST['green']),h($_POST['blue']));
    imagepng($image, $image_name);
    return $image_name;
}
?>
