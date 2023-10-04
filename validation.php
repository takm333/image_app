<?php
function validation($data){
    $error = [];

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

    function generate_range_check($int) {
        if($int > 0 && $int <= 100){
            return true;
        }
    }

    if(!empty($data)){
        //入力チェック
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

        if(!is_number($_POST['generate_quantity'])){
            $error['generate_quantity'] = 'number';
        }
        if(!generate_range_check($_POST['generate_quantity'])){
            $error['generate_quantity'] = 'generate';
        }
        if(is_empty($_POST['generate_quantity'])){
            $error['generate_quantity'] = 'blank';
        }
    }

    return $error;

}
?>
