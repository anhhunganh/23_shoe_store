<?php
    require '../check_super_admin_login.php';

if (!isset($_GET['id'])) {
    header('location:index.php?error=Xoá không thành công');
    exit;
} else {
    require '../root/connect.php';

    $id = $_GET['id'];

    $sql = "select id from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row !== 1) {
        header('location:index.php?error=Không tồn tại id');
        exit;
    } else {
        $sql = "delete from products where id = '$id'";
        mysqli_query($connect, $sql);
        header('location:index.php?success=Xoá thành công');
        exit;
    }
}
