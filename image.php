<?php
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

if(isset($_POST['width']) && isset($_POST['height'])){
    $image_name = 'image.png';
    $image = imagecreate(h($_POST['width']),h($_POST['height']));
    imagecolorallocate($image,255,0,0);
    imagepng($image, $image_name);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>画像生成アプリ</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label fw-bold">横幅</label>
                <input type="text" class="form-control" name="width" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">縦幅</label>
                <input type="text" class="form-control" name="height" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-danger fw-bold">R(赤)</label>
                <input type="text" class="form-control" name="red" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-success fw-bold">G(緑)</label>
                <input type="text" class="form-control" name="green" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-primary fw-bold">B(青)</label>
                <input type="text" class="form-control" name="blue" required>
            </div>
            <!--
            <input type="range" name="red" min="0" max="255">
            <input type="range" name="green" min="0" max="255">
            <input type="range" name="blue" min="0" max="255">
            -->
            <button type="submit" class="btn btn-primary">画像を生成する</button>
        </form>
    </div>
</body>
</html>
