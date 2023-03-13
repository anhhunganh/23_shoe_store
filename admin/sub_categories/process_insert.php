<?php
    require '../check_super_admin_login.php';

    $name = $_POST['name'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image'];

    if(empty($name) || empty($_POST['category_id'])){
        $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
        header('location:./form_insert.php');
        exit;
    }

    if($image['size'] == 0) {
        $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
        header('location:./form_insert.php');
        exit;
    }

    $folder = './img/';
    $file_extension = explode('.', $image['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;

    move_uploaded_file($image['tmp_name'], $path_file);

    require '../root/connect.php';

    $select_check_name = "select name from sub_categories where name like '$name'";
    $query_select_check_name = mysqli_query($connect, $select_check_name);
    $result = mysqli_fetch_array($query_select_check_name);
    if(isset($result)){
        $_SESSION['error'] = 'Danh mục sản phẩm đã tồn tại';
        header('location:./form_insert.php');
        exit;
    }

    $sql = "insert into sub_categories (name, category_id, image)
            values ('$name', '$category_id', '$file_name')";
    mysqli_query($connect, $sql);
    $error = mysqli_error($connect);
    mysqli_close($connect);
    if(!empty($error)) {
        $_SESSION['error'] = 'Lỗi truy vấn';
        header('location:./form_insert.php');
        exit;
    }
    $_SESSION['success'] = 'Xoá danh mục sản phẩm thành công';
    header('location:./index.php');
    exit;

