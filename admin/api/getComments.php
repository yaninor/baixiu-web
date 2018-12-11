<?php
//获取评论数量内容的逻辑代码
    //接受参数
    $pageIndex = $_GET['pageIndex'];
    $pageSize = $_GET['pageSize'];
    require_once "phpTools/phpTools.php";
    //(页码-1)*页容量
    $start = ($pageIndex-1)*$pageSize;
    //查询每一页的内容
    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status from comments c inner join posts p on c.post_id=p.id 
            where c.status != 'trashed' limit $start,$pageSize";
    $data = mysqli_excute_select($sql);
    //查询所以评论数量
    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status from comments c inner join posts p on c.post_id=p.id 
            where c.status != 'trashed'";
    $count = count(mysqli_excute_select($sql));
    //页码总数量=ceil(总评论数量/页容量)
    $totalPages = ceil($count/$pageSize);
    //添加到关系型数组中
    $array = array(
        "data" => $data,
        "totalPages" => $totalPages
    );
     //转为json对象输出
    echo json_encode($array);