<?php
    $old = $_POST['old'];
    $new = $_POST['new'];

    require_once "phpTools/phpTools.php";
    session_start();
    $id = $_SESSION['info']['id'];
    $password = $_SESSION['info']['password'];
    if($old == $password){
        $sql = "update users set password='$new' where id=$id";
        $row = mysqli_excute_zsg($sql);
        if($row>0){     
            //成功返回
            echo '{"msg":"ok","code":0}';
            // unset($_SESSION['info']);
        }else {
            //失败返回
            echo '{"msg":"fail","code":1}';
        }
    }else {
        echo '{"msg":"error","code":2}';
    }