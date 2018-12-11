<?php

    //根据id查询内容
    $id = $_GET['id'];

    require_once "phpTools/phpTools.php";
    $sql = "select * from posts where id=$id";
    $data = mysqli_excute_select($sql);
    // 将查询到的数组取0下标  只有一条记录 并转换为json输出
    echo json_encode($data[0]);