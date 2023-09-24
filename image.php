<?php
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

function is_empty($int){
    if($int === ''){
        return true;
    }
}

function is_number($int){
    return preg_match('/^[0-9]+$/',$int);
}

function px_range_check($int) {
    if($int > 0 && $int <= 9999){
        return true;
    }
}

function color_range_check($int){
    if($int >= 0 && $int <= 255){
        return true;
    }
}

if(!empty($_POST)){
    if(!is_number($_POST['width'])){
        $error['width'] = 'number';
    }
    if(!px_range_check($_POST['width'])){
        $error['width'] = 'px';
    }
    if(is_empty($_POST['width'])){
        $error['width'] = 'blank';
    }


    if(!is_number($_POST['height'])){
        $error['height'] = 'number';
    }
    if(!px_range_check($_POST['height'])){
        $error['height'] = 'px';
    }
    if(is_empty($_POST['height'])){
        $error['height'] = 'blank';
    }


    if(!color_range_check($_POST['red'])){
        $error['red'] = 'color_range';
    }
    if(!is_number($_POST['red'])){
        $error['red'] = 'number';
    }
    if(is_empty($_POST['red'])){
        $error['red'] = 'blank';
    }


    if(!color_range_check($_POST['green'])){
        $error['green'] = 'color_range';
    }
    if(!is_number($_POST['green'])){
        $error['green'] = 'number';
    }
    if(is_empty($_POST['green'])){
        $error['green'] = 'blank';
    }


    if(!color_range_check($_POST['blue'])){
        $error['blue'] = 'color_range';
    }
    if(!is_number($_POST['blue'])){
        $error['blue'] = 'number';
    }
    if(is_empty($_POST['blue'])){
        $error['blue'] = 'blank';
    }


    if(empty($error)){
        $image_name = 'image.png';
        $image = imagecreate(h($_POST['width']),h($_POST['height']));
        imagecolorallocate($image,h($_POST['red']),h($_POST['green']),h($_POST['blue']));
        $created_image = imagepng($image, $image_name);

        header('Content-type: image/png');
        header('Content-Disposition:attachment;filename = "'.$image_name.'"');
        header('Content-Length: '. filesize($image_name));
        echo file_get_contents($image_name);
        exit();
    }
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
                <label class="form-label fw-bold">横幅(px)</label>
                <input type="number" class="form-control <?php if(!empty($error['width'])){echo h('is-invalid');}?>" name="width" value="<?php if(isset($_POST['width'])){echo h($_POST['width'],ENT_QUOTES);} ?>" required placeholder="1~9999" min="1" max="9999">
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
                <label class="form-label text-danger fw-bold">R(赤)</label>
                <input type="number" class="form-control <?php if(!empty($error['red'])){echo h('is-invalid');}?>" name="red" value="<?php if(isset($_POST['red'])){echo h($_POST['red'],ENT_QUOTES);} ?>" required placeholder="0~255" min="0" max="255">
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
                <label class="form-label text-success fw-bold">G(緑)</label>
                <input type="number" class="form-control <?php if(!empty($error['green'])){echo h('is-invalid');}?>" name="green" value="<?php if(isset($_POST['green'])){echo h($_POST['green'],ENT_QUOTES);} ?>" required placeholder="0~255" min="0" max="255">
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
                <label class="form-label text-primary fw-bold">B(青)</label>
                <input type="number" class="form-control <?php if(!empty($error['blue'])){echo h('is-invalid');}?>" name="blue" value="<?php if(isset($_POST['blue'])){echo h($_POST['blue'],ENT_QUOTES);} ?>" required placeholder="0~255" min="0" max="255">
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
