<?php
    //修改评论的逻辑代码
    //接收传递过来的数据
    $status = $_POST['status'];
    $ids = $_POST['ids'];
    require_once "phpTools/phpTools.php";
    //按照传递的对应status和id进行修改数据
    $sql = "update comments set status='$status' where id in ($ids)";
    // echo $sql;
    $row = mysqli_excute_zsg($sql);
    if($row>0){
        //成功返回ok
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回fail
        echo '{"msg":"fail","code":1}';
    }

    