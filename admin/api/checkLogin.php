<?php
    //判断是否用户是否登录 逻辑代码
    
    //开启session
    session_start();
    //判断session里面是否有值
    if(isset($_SESSION['info'])){
        //成功返回ok
        echo '{"msg":"ok","code":0}';
    }else {
        //失败返回fail
        echo '{"msg":"fail","code":1}';
    }