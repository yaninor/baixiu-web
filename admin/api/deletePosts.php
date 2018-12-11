<?php
    //文章页面单行软删除逻辑代码
    //获取传递的id
    $ids = $_POST['ids'];
    require_once "phpTools/phpTools.php";
    //修改状态为trashed
    $sql = "update posts set status='trashed' where id in ($ids)";
    $row = mysqli_excute_zsg($sql);
    if($row>0){
        
        //成功返回
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回
        echo '{"msg":"fail","code":1}';
    }