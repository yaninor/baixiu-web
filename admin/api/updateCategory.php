<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    require_once "phpTools/phpTools.php";
    $sql = "update categories set name='$name',slug='$slug' where id=$id";
    $row = mysqli_excute_zsg($sql);
    if($row>0){     
        //成功返回
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回
        echo '{"msg":"fail","code":1}';
    }