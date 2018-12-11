<?php
    $text = $_POST['text'];
    $link = $_POST['link'];
    $image = $_FILES['image'];

    $name = $image['name'];
    $tmp = $image['tmp_name'];
    $gbkName = iconv('utf-8','gbk',$name);
    $path = "../../uploads/$gbkName";
    move_uploaded_file($tmp,$path);

    require_once "phpTools/phpTools.php";
    $path = "/uploads/$name";
    $sql = "insert into sliders(image,text,link) values('$path','$text','$link')";
    $row = mysqli_excute_zsg($sql);
    
    if($row>0){
        echo '{"msg":"ok","code":0}';
    }else {
        echo '{"msg":"fail","code":1}';
    }