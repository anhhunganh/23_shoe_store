<?php
    require '../check_super_admin_login.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image'];

    if(empty($name)) {
            $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
        header("location:./form_update.php?id=$id");
        exit;
    }

    if($image['size'] > 0) {
        $folder = 'img/';
        $file_extension = explode('.', $image['name'])[1];
        $file_name =  time() . '.' . $file_extension;
        $path_file = $folder . $file_name;

        if($file_extension != 'jpg' && $file_extension != 'png' && $file_extension != 'jpeg' && $file_extension != 'gif'){
            echo 'File ko đúng định dạng';
        }
        move_uploaded_file($image['tmp_ name'], $path_file);
    } else {
        $file_name = $_POST['image_old'];
    }

    require '../root/connect.php';
    $sql = "update style
            set
                name = '$name',
                image = '$file_name'
            where
                id = '$id'";
    mysqli_query($connect, $sql);

    $error = mysqli_error($connect);
    if(empty($error)) {
        $_SESSION['success'] = "Cập nhật Kiểu dáng sản phẩm thành công";
        header('location:./index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Lỗi truy vấn';
        header("location:./form_update.php?id=$id");
    }

mysqli_close($connect);