<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require '../root/connect.php';
        $id = $_GET['id'];

        $sql = "select * from products 
                join order_product on products.id = order_product.product_id
                where order_product.order_id = '$id'";
        $result = mysqli_query($connect, $sql);
        $sum = 0;
    ?>
    <div>
        <?php if(mysqli_num_rows($result) !== 1) { ?>
            <h2>Không có sản phẩm nào của đơn hàng này</h2>
        <?php } else { ?>
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td>Ảnh sản phẩm</td>
                <td>Giá sản phẩm</td>
                <td>Số lượng sản phẩm</td>
            </tr>
            <?php foreach($result as $each) { ?>
            <tr>
                <td><?php echo $each['name'] ?></td>
                <td><img height="200" src="../products/img/<?php echo $each['image'] ?>" alt=""></td>
                <td><?php echo $each['price'] ?></td>
                <td><?php echo $each['quantity'] ?></td>
            </tr>    
            <?php $sum += $each['quantity'] * $each['price'] ?>
            <?php } ?>
        </table>
        <h1>Tổng tiền sản phẩm: <?php echo $sum ?></h1>
        <?php } ?>
    </div>
</body>
</html>