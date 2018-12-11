<?php
    $ids = $_POST['ids'];
    require_once "phpTools/phpTools.php";
    $sql = "update users set status='trashed' where id in ($ids)";
    $row = mysqli_excute_zsg($sql);  
    if($row>0){     
        //成功返回
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回
        echo '{"msg":"fail","code":1}';
    }