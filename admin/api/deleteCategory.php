<?php
    $ids = $_POST['ids'];

    require_once "phpTools/phpTools.php";
    $sql = "delete from categories where id in ($ids)";
    $row = mysqli_excute_zsg($sql);
    if($row>0){
        echo '{"msg":"ok","code":0}';
    }else {
        echo '{"msg":"fail","code":1}';
    }