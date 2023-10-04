<?php
function create_image(){
    $folder_path = __DIR__ . '/tmp' . '/' . date("Y-m-d_His");
    mkdir($folder_path);

    $image = imagecreate(h($_POST['width']),h($_POST['height']));
    imagecolorallocate($image,h($_POST['red']),h($_POST['green']),h($_POST['blue']));
    for($i = 1; $i <= h($_POST['generate_quantity']); $i++){
        $image_name = 'image' . $i . '.png';
        imagepng($image, $image_name);
        $move_folder_path =  $folder_path . '/' . $image_name;
        rename($image_name, $move_folder_path);
    }

    return $folder_path;
}
?>
