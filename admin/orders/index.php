<?php
    require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php 
        require '../root/connect.php';
        $sql = "select orders.*,
                customers.name as customer_name, customers.phone_number as customer_phone_number, customers.address as customer_address, status.name as status_name, status.id as stauus_id
                from 
                orders join customers on orders.customer_id = customers.id
                        join status on orders.status_id = status.id"; 
        $result = mysqli_query($connect, $sql);
        ?>
        <?php require '../root/menu.php' ?>

        <table>
            <tr>
                <td>ID</td>
                <td>Thời gian đặt</td>
                <td>Thông tin người nhận</td>
                <td>Thông tin người đặt</td>
                <td>Trạng thái</td>
                <td>Tổng tiền</td>
                <td>Xem chi tiết</td>
                <td>Thay đổi trạng thái</td>
                <!-- <td>Thay</td> -->
            </tr>
            <?php foreach($result as $each) { ?>
                <tr>
                    <td><?php echo $each['id'] ?></td>
                    <td><?php echo $each['created_at'] ?></td>
                    <td>
                        <?php echo $each['name_receiver'] ?><br>
                        <?php echo $each['phone_number_receiver'] ?><br>
                        <?php echo $each['address_receiver'] ?>
                    </td>
                    <td>
                        <?php echo $each['customer_name'] ?><br>
                        <?php echo $each['customer_phone_number'] ?><br>
                        <?php echo $each['customer_address'] ?>
                    </td>
                    <td><?php echo $each['status_name'] ?> </td>
                    <td><?php echo $each['total_price'] ?> </td>
                    <td><a href="./order_detail.php?id=<?php echo $each['id'] ?>">Xem chi tiết</a></td>
                    <?php 
                        if($each['status_id'] == 1) { ?>
                    <td>
                        <a href="./process_update.php?id=<?php echo $each['id'] ?>&status_id=2">Duyệt đơn</a><br>
                        <a href="./process_update.php?id=<?php echo $each['id'] ?>&status_id=5">Huỷ đơn</a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>