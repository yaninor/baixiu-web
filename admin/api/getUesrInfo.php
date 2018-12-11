<?php

    //获取session中存储的登录用户信息
    //开启session
    session_start();
    //将session中的数据转换成json并输出
    echo json_encode($_SESSION['info']);
