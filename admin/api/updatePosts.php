<?php
    //编辑文章内容的逻辑代码

    // 获取传递的数据
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $created = $_POST['created'];
    $status = $_POST['status'];
    $feature = $_FILES['feature'];
    //获取文件名
    $name = $feature['name'];
    //获取文件临时地址
    $tmp = $feature['tmp_name'];
    //将utf-8格式文件名转为gbk
    $gbkName = iconv('utf-8', 'gbk', $name);
    //存储文件的目标地址
    $path = "../../uploads/$gbkName";
    //从临时地址移动到目标地址
    move_uploaded_file($tmp, $path);


    //数据库使用utf-8格式的文件地址
    $path = "/uploads/$name";
    require_once "phpTools/phpTools.php";
    $sql = "update posts set title='$title',content='$content',slug='$slug',
            category_id='$category',created='$created',status='$status'";
    //如果文件名不为空 就修改图像内容
    if ($name != "") {
        $sql .= ", feature='$path'";
    }
    $sql .= "where id='$id'";
    $row = mysqli_excute_zsg($sql);
    //根据受影响的行数判断修改状态
    if ($row > 0) {
        echo '{"msg":"ok","code":0}';
    } else {
        echo '{"msg":"fail","code":1}';
    }