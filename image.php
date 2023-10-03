<?php
require 'validation.php';
require 'create_image.php';
require 'download.php';
$error = validation($_POST);

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

if(empty($error) && !empty($_POST)){
    //画像を出力
    $image_name = create_image();
    download_image($image_name);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script type="text/javascript" src="./image.js"></script>
    <title>画像生成アプリ</title>
</head>
<body>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-3 bg-secondary">
            <span class="fs-4  text-white">画像生成アプリ</span>
    </header>
    <div class="container">
        <form action="" method="post">

            <div class="mb-3">
                <label class="form-label fw-bold">横幅(px)</label>
                <input type="number" class="form-control <?php if(!empty($error['width'])){echo h('is-invalid');}?> " name="width" value="<?php if(isset($_POST['width'])){echo h($_POST['width'],ENT_QUOTES);} ?>" required placeholder="1~9999" min="1" max="9999">
                <?php if(isset($error['width']) && $error['width'] === 'blank'):?>
                    <div class="invalid-feedback">
                        横幅を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['width']) && $error['width'] === 'number'):?>
                    <div class="invalid-feedback">
                        横幅には半角数字を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['width']) && $error['width'] === 'px'):?>
                    <div class="invalid-feedback">
                        横幅は1～9999の間で指定してください。
                    </div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">縦幅(px)</label>
                <input type="number" class="form-control <?php if(!empty($error['height'])){echo h('is-invalid');}?>" name="height" value="<?php if(isset($_POST['height'])){echo h($_POST['height'],ENT_QUOTES);} ?>" required placeholder="1~9999" min="1" max="9999">
                <?php if(isset($error['height']) && $error['height'] === 'blank'):?>
                    <div class="invalid-feedback">
                        縦幅を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['height']) && $error['height'] === 'number'):?>
                    <div class="invalid-feedback">
                        縦幅には半角数字を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['height']) && $error['height'] === 'px'):?>
                    <div class="invalid-feedback">
                        横幅は1～9999の間で指定してください。
                    </div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label class="form-label text-danger fw-bold">R(赤)  :  <span class="red"></span></label>
                <input type="range" class="form-range <?php if(!empty($error['red'])){echo h('is-invalid');}?>" name="red" value="<?php if(isset($_POST['red'])){echo h($_POST['red'],ENT_QUOTES);} ?>" id="red" name="red" min="0" max="255">
                <?php if(isset($error['red']) && $error['red'] === 'blank'):?>
                    <div class="invalid-feedback">
                        R(赤)を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['red']) && $error['red'] === 'number'):?>
                    <div class="invalid-feedback">
                        R(赤)には半角数字を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['red']) && $error['red'] === 'color_range'):?>
                    <div class="invalid-feedback">
                        R(赤)は0～255の間で指定してください。
                    </div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label class="form-label text-success fw-bold">G(緑)  :  <span class="green">0</span></label>
                <input type="range" class="form-range <?php if(!empty($error['green'])){echo h('is-invalid');}?>" name="green" value="<?php if(isset($_POST['green'])){echo h($_POST['green'],ENT_QUOTES);} ?>" id="green" name="green" min="0" max="255">
                <?php if(isset($error['green']) && $error['green'] === 'blank'):?>
                    <div class="invalid-feedback">
                        G(緑)を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['green']) && $error['green'] === 'number'):?>
                    <div class="invalid-feedback">
                        G(緑)には半角数字を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['green']) && $error['green'] === 'color_range'):?>
                    <div class="invalid-feedback">
                        G(緑)は0～255の間で指定してください。
                    </div>
                <?php endif ?>
            </div>

            <div class="mb-3">
                <label class="form-label text-primary fw-bold">B(青)  :  <span class="blue">0</span></label>
                <input type="range" class="form-range <?php if(!empty($error['blue'])){echo h('is-invalid');}?>" name="blue" value="<?php if(isset($_POST['blue'])){echo h($_POST['blue'],ENT_QUOTES);} ?>" id="blue" name="blue" min="0" max="255">
                <?php if(isset($error['blue']) && $error['blue'] === 'blank'):?>
                    <div class="invalid-feedback">
                        B(青)を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['blue']) && $error['blue'] === 'number'):?>
                    <div class="invalid-feedback">
                        B(青)には半角数字を入力してください。
                    </div>
                <?php endif ?>
                <?php if(isset($error['blue']) && $error['blue'] === 'color_range'):?>
                    <div class="invalid-feedback">
                        B(青)は0～255の間で指定してください。
                    </div>
                <?php endif ?>
            </div>

            <label class="form-label fw-bold">色サンプル</label>
            <div class="card mb-3" id="sample">
                <div class="card-body mb-3"></div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">画像を生成する</button>
            </div>

        </form>
    </div>
</body>
</html>
