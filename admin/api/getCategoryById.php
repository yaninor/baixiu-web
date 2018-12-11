<?php
    $id = $_GET['id'];
    require_once "phpTools/phpTools.php";
    $sql = "select * from categories where id=$id";
    $data = mysqli_excute_select($sql);
    echo json_encode($data[0]);