<?php
    require_once "phpTools/phpTools.php";
    $sql = "select * from sliders";
    $data = mysqli_excute_select($sql);
    echo json_encode($data);