<?php
    require '../check_admin_login.php';

    $name = $_POST['name'];
    $price = $_POST['price'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $category_id = $_POST['category_id'];
    $sub_category_id = $_POST['sub_category_id'];
    $image = $_FILES['image'];
    
    if(empty($name) || empty($price) || empty($category_id) || empty($manufacturer_id) || empty($sub_category_id) ) {
        $_SESSION['error'] = "Thông tin không được để trống";
        header('location:./form_insert.php');
        exit;
    }

    // die(
    //     $image['size']
    // );

    if($image['size'] > 0) {
        $folder = 'img/';
        $file_extension = explode('.', $image['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;

        move_uploaded_file($image['tmp_name'], $path_file);
    } else {
        $_SESSION['error'] = "Thông tin không được để trống";
        header('location:./form_insert.php');
        exit;
    }

    require '../root/connect.php';

    $sql = "select products.name from products where products.name = '$name'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) === 1) {
        $_SESSION['error'] = 'Sản phẩm đã tồn tại, vui lòng kiểm tra lại thông tin.';
        header('location:./form_insert.php');
        exit;
    }


    $sql = "insert into products(name, price, image, sub_category_id)
            values('$name', '$price', '$file_name', '$sub_category_id')";
    mysqli_query($connect, $sql);

    $last_id_product = mysqli_insert_id($connect);
    $sub_image = $_FILES['sub_image'];

    $folder = 'sub_img/';
    
    for($i = 0; $i < count($sub_image['name']); $i++){
        if($sub_image['size'][$i] > 0) {
            $file_extention = explode('.',$sub_image['name'][$i])[1];
            $file_name = time() . $i . '.' . $file_extention;
            $path_file = $folder . $file_name;

            move_uploaded_file($sub_image['tmp_name'][$i], $path_file);
            $sql = "insert into product_sub_images(product_id, source) values ('$last_id_product', '$file_name')";
            mysqli_query($connect, $sql);
        }else {
            echo 22;
        }
    }
        // $sql_id_size = "select size.id as id from size";
        // $result_id_size = mysqli_query($connect, $sql_id_size);
        // $number_id_size = mysqli_num_rows($result_id_size);
        // $arr_id_size = [];

        // foreach ($result_id_size as $each_id_size) {
        //     $arr_id_size['size_id'] = $each_id_size['id'];
        //     for($i = 0; $i < $number_id_size; $i++) {
        //          $sql_product_size = "insert into product_size(product_id, size_id)
        //                              values('$last_id_product', '{$arr_id_size['size_id']}')";
        //     }
        //     mysqli_query($connect, $sql_product_size);
        // }
    // header('location:./index.php?success=Thêm sản phẩm thành công');
    // exit;