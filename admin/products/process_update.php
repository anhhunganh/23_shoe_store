<?php
require '../check_admin_login.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$manufacturer_id = $_POST['manufacturer_id'];
$category_id = $_POST['category_id'];
$sub_category_id = $_POST['sub_category_id'];
$image = $_FILES['image'];

require '../root/connect.php';

$sql = "select products.*, manufacturers.id as manufacturer_id, categories.id as category_id, sub_categories.id as sub_category_id
            from 
                products join sub_categories on products.sub_category_id = sub_categories.id
                join categories on sub_categories.category_id = categories.id
                join manufacturers on categories.manufacturer_id = manufacturers.id
            where
                products.id = '$id'and manufacturer_id = '$manufacturer_id'and category_id = '$category_id'and sub_category_id = '$sub_category_id'";
// die($sql);
$resul = mysqli_query($connect, $sql);
if (mysqli_num_rows($resul) != 1) {
    $_SESSION['error'] = "Sửa thông tin sản phẩm không thành công";
    header('location:./index.php');
    exit;
}
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
                        sub_category_id = '$sub_category_id',
                        image = '$file_name'
                    where
                        id = '$id'";
mysqli_query($connect, $sql);
