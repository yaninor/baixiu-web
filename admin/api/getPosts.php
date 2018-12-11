<?php
    //获取文章功能的逻辑代码
    //获取页码和页容量
    $pageIndex = $_GET['pageIndex'];
    $pageSize = $_GET['pageSize'];
    $category = $_GET['category'];
    $status = $_GET['status'];
    //导入工具包
    require_once "phpTools/phpTools.php";
    //起始索引=(页码-1)*页容量
    $start = ($pageIndex-1)*$pageSize;
    $sql  = "select p.id,p.title,u.nickname,c.name,p.created,p.status 
            from posts p inner join users u on p.user_id=u.id 
            inner join categories c on 
            p.category_id=c.id where p.status!='trashed'";
    //判断没有选中所有分类 就添加条件
    if($category != "所有分类"){
        $sql .="and c.name='$category'";
    }
    //判断没有选中所有状态 就添加条件
    if($status != "所有状态"){
        $sql .="and p.status='$status'";
    }
    // 保存没有添加limit的语句 下面使用
    $sql2 = $sql;
    $sql .= "order by p.id desc limit $start,$pageSize";
    $data = mysqli_excute_select($sql);

    //取出查询数据的长度
    $count = count(mysqli_excute_select($sql2));
    //计算总页码的长度=ceil(总数据长度/页容量)
    $totalPages = ceil($count/$pageSize);
    //关联型数组 将分页信息数据和总页码长度添加到数组中
    $array = array(
        "data" => $data,
        "totalPages" =>$totalPages
    );
    //转成json输出
    echo json_encode($array);