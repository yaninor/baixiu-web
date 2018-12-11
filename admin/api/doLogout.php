<?php
    //退出登录 逻辑代码

    
    //开启session
    session_start();
    //删除存储的sesssion
    unset($_SESSION['info']);
    //跳转回登录页面
    header('location:../login.html');