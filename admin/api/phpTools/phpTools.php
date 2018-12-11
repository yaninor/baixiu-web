<?php
//封装php代码操作数据库增删改
function mysqli_excute_zsg($sql){
    //1.连接数据库
    $link = mysqli_connect('localhost','root','root','baixiu');
    //2.准备sql语句(参数传递过来的)执行
    $res = mysqli_query($link,$sql);
    $row = mysqli_affected_rows($link);
    //3.关闭数据库连接
    mysqli_close($link);
    //把执行是否成功的返回值给返回给函数调用者.
    return $row;
}
//封装php代码操作数据库 查
function mysqli_excute_select($sql){
   //1.连接数据库
   $link = mysqli_connect('localhost','root','root','baixiu');
   //2.准备sql语句(参数传递过来的)执行
   $res = mysqli_query($link,$sql);
   //3.处理返回的结果.
   $arr = mysqli_fetch_all($res,1);
   //4.关闭数据库连接
   mysqli_close($link);
   //返回查询结果.
   return $arr;
}
?>