<?php
    //显示网站文章信息的逻辑代码
    require_once "phpTools/phpTools.php";
    //查出文章的数量
    $sql = "select * from posts where status != 'trashed'";
    $data = mysqli_excute_select($sql);
    $wenzhang = count($data);
    //查出草稿的数量
    $sql = "select * from posts where status = 'drafted'";
    $data = mysqli_excute_select($sql);
    $caogao = count($data);
    //查出分类的数量
    $sql = "select * from categories";
    $data = mysqli_excute_select($sql);
    $fenlei = count($data);
    //查出所以没被删除的评论数量
    $sql = "select * from comments where status != 'trashed'";
    $data = mysqli_excute_select($sql);
    $pinglun = count($data);
    //查出所有待审核的评论数量
    $sql = "select * from comments where status = 'held'";
    $data = mysqli_excute_select($sql);
    $daishenhe = count($data);
    //添加到数组中
    $array = array(
        "wenzhang" => $wenzhang,
        "caogao" => $caogao,
        "fenlei" => $fenlei,
        "pinglun" => $pinglun,
        "daishenhe" => $daishenhe
    );
    // 转成json并输出
    echo json_encode($array);
