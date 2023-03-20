<?php
    require '../check_admin_login.php';
    
    $product_id = $_POST['product_id'];
    $image = $_FILES['image'];
    // echo json_encode($image);
    // die;
    
    require '../root/connect.php';
    $folder = 'sub_img/';
    
    for($i = 0; $i < count($image['name']); $i++){
        if($image['size'][$i] > 0) {
            $file_extention = explode('.',$image['name'][$i])[1];
            $file_name = time() . $i . '.' . $file_extention;
            $path_file = $folder . $file_name;

            move_uploaded_file($image['tmp_name'][$i], $path_file);
            $sql = "insert into product_sub_images(product_id, source) values ('$product_id', '$file_name')";
            mysqli_query($connect, $sql);
        }else {
            echo 22;
        }
    }
    // die($sql);



    $error = mysqli_error($connect);
    if(empty($error)){
        // header('location:./index.php');
        exit;
    } else {
        // header('location:form_product_detail.php?error=2');
        exit;
    }