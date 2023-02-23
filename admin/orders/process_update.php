<?php
    require '../check_admin_login.php';

    $id = $_GET['id'];
    $status_id = $_GET['status_id'];

    require '../root/connect.php';
    $sql = "update orders
            set
                status_id = $status_id
            where id = '$id'";
    mysqli_query($connect, $sql);

    header('location:./index.php');

    