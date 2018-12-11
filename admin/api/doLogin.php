<?php
    //用户登录逻辑代码
    
    //获取传递来数据
    $email = $_POST['email'];
    $password = $_POST['password'];
    //根据数据查询数据库里的信息
    $link = mysqli_connect('localhost','root','root','baixiu');
    $sql = "select * from users where email='$email' and password='$password'";
    $res = mysqli_query($link,$sql);
    $data = mysqli_fetch_all($res,1);
    mysqli_close($link);
    //根据查询数据的长度来判断是否有查询到数据
    if(count($data)>0){
        echo '{"msg":"ok","code":0}';
        //开启session  并将登录信息存储进去
        session_start();
        //将登录信息存储到session中
        $_SESSION['info']=$data[0];
    }else {
        echo '{"msg":"fail","code":1}';
    }