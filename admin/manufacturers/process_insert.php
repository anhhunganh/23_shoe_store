<?php
    require '../check_super_admin_login.php';

    $name = $_POST['name'];
    // $email = $_POST['email'];
    // $address = $_POST['address'];
    $image = $_FILES['image'];
    
    if(empty($name)) {
        header('location:./form_insert.php?error=Thông tin không được để trống123');
        exit;
    }

    if($image['size'] > 0) {
        $folder = 'img/';
        $file_extension = explode('.', $image['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;

        move_uploaded_file($image['tmp_name'], $path_file);
    } else {
        header('location:./form_insert.php?error=Thông tin không được để trống');
        exit;
    }

    require '../root/connect.php';

    $sql = "select manufacturers.name from manufacturers where manufacturers.name = '$name'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) === 1) {
        $_SESSION['error'] = 'Nhà sản xuất đã tồn tại, vui lòng kiểm tra lại thông tin.';
        header('location:./form_insert.php');
        exit;
    }


    $sql = "insert into manufacturers(name)
            values('$name')";
    mysqli_query($connect, $sql);

    $_SESSION['success'] = "Thêm sản phẩm thành công";
    header('location:./index.php');
    exit;

    mysqli_close($connect);