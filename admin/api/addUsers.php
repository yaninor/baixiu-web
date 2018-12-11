<?php
    $email = $_POST['email'];
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'] ;
    $password = $_POST['password'];
    require_once "phpTools/phpTools.php";
    $sql = "insert into users(email,slug,nickname,password) values('$email','$slug','$nickname','$password')";
    $row = mysqli_excute_zsg($sql);
    if($row>0){     
        //成功返回
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回
        echo '{"msg":"fail","code":1}';
    }