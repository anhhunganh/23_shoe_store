<?php
    require '../check_super_admin_login.php';

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "Xoá không thành công";
    header('location:index.php');
    exit;
} else {
    require '../root/connect.php';

    $id = $_GET['id'];

    $sql = "select id from manufacturers where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    if ($num_row !== 1) {
        $_SESSION['error'] = "Xoá không thành công";
        header('location:index.php');
        exit;
    } else {
        $sql = "delete from manufacturers where id = '$id'";
        mysqli_query($connect, $sql);
        $_SESSION['success'] = "Xoá thành công";
        header('location:index.php?success=Xoá thành công');
        exit;
    }
}

mysqli_close($connect);