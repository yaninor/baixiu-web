<?php
    //获取分类的逻辑代码
    require_once "phpTools/phpTools.php";
    $sql = "select * from categories";
    $data = mysqli_excute_select($sql);
    echo json_encode($data);