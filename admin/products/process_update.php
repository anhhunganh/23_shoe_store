<?php
    require '../check_admin_login.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $manufacturer_id = $_POST['manufacturer_id'];
    $image = $_FILES['image'];

    require '../root/connect.php';

    if ($image['size'] > 0) {
        $folder = 'img/';
        $file_extension = explode('.', $image['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;

        move_uploaded_file($image['tmp_name'], $path_file);
    } else {
        $file_name = $_POST['image_old'];
    }
    $sql = "update products
                    set
                        name = '$name',
                        price = '$price',
                        description = '$description',
                        manufacturer_id = '$manufacturer_id',
                        image = '$file_name'
                    where
                        id = '$id'";
    mysqli_query($connect, $sql);
    