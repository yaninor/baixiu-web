<?php
    require_once "phpTools/phpTools.php";
    $sql = "select * from users where status != 'trashed'";
    $data = mysqli_excute_select($sql);

    echo json_encode($data);