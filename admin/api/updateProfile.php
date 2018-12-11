<?php
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];
    $avatar = $_FILES['avatar'];

    $name = $avatar['name'];
    $tmp = $avatar['tmp_name'];
    $gbkName = iconv('utf-8','gbk',$name);
    $path = "../../uploads/$gbkName";
    move_uploaded_file($tmp,$path);

    $path = "/uploads/$name";
    session_start();
    $id = $_SESSION['info']['id'];
    require_once "phpTools/phpTools.php";
    $sql = "update users set slug='$slug',nickname='$nickname',bio='$bio'";
    if($name != ""){
        $sql .=",avatar='$path'";
    }
    $sql .="where id=$id";
    $row = mysqli_excute_zsg($sql); 
    if($row>0){           
        $sql = "select * from users where id=$id";
        $data = mysqli_excute_select($sql);
        $_SESSION['info']=$data[0];
        //成功返回
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回
        echo '{"msg":"fail","code":1}';
    }