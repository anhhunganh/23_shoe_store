<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết sản phẩm |</title>
</head>
<body>
    <?php 
        require '../root/connect.php';
        $id = $_GET['id'];
        
        $sql = "select products.name as product_name, products.id as product_id, product_details.*
        from products join product_details on products.id = product_details.product_id
        where product_id = '$id'";
        
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);
        ?>
    <a href="./form_product_detail.php?id=<?php echo $id ?>">Theem thoong tin sanr pham</a>
    <div><?php echo $each['product_name'] ?></div>
    <div><?php echo $each['color'] ?></div>
    <div><?php echo $each['material'] ?></div>
    <div><?php echo $each['material_sole'] ?></div>
    <div><?php echo $each['elastic_gusset'] ?></div>
    <div><?php echo $each['socklining'] ?></div>
    <div><?php echo $each['height_heel'] ?></div>
    <div><?php echo $each['logo_signature'] ?></div>
    <div><?php echo $each['shoe_structure'] ?></div>
</body>
</html>