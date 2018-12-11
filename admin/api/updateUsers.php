<?php
     $id = $_POST['id'];
     $email = $_POST['email'];
     $slug = $_POST['slug'];
     $nickname = $_POST['nickname'] ;
     $password = $_POST['password'];
     require_once "phpTools/phpTools.php";
     $sql  = "update users set email='$email',slug='$slug',nickname='$nickname',password='$password' where id=$id";
     $row = mysqli_excute_zsg($sql);

     if($row>0){     
        //成功返回
        echo '{"msg":"ok","code":0}';
        
    }else {
        //失败返回
        echo '{"msg":"fail","code":1}';
    }