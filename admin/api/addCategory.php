<?php
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    require_once "phpTools/phpTools.php";
    $sql = "insert into categories(name,slug) values ('$name','$slug') ";
    $row = mysqli_excute_zsg($sql);

    if($row>0){
        echo '{"msg":"ok","code":0}';
    }else {
        echo '{"msg":"fail","code":1}';
    }
