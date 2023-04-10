<?php
require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../root/grid.css">
    <link rel="stylesheet" href="../root/style.css">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <?php
        require '../root/connect.php';

        $search = '';
        if (isset($_GET['search'])) {
            $search = addslashes($_GET['search']);
        }

        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } 

        $number_items_of_page = 20;
        $sql_number_items = "select count(*) from orders where orders.id like '%$search%'";
        $result_arr_number_items = mysqli_query($connect, $sql_number_items);
        $number_items = mysqli_fetch_array($result_arr_number_items)['count(*)'];
        $number_of_pages = ceil($number_items / $number_items_of_page);
        $skip_number_items = $number_items_of_page * ($page - 1);

        $sql = "select orders.*
                    from orders where orders.id like '%$search%' order by status_id limit $number_items_of_page offset $skip_number_items";
        $result = mysqli_query($connect, $sql);
        ?>
        <?php require '../root/menu.php' ?>

        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="content">
                <div class="grid">
                    <h2 class="row content__heading">Quản lý đơn hàng</h2>
                    <table>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Thông tin người nhận</th>
                            <th>Thông tin sản phẩm</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian tạo</th>
                            <th>Thanh toán</th>
                            <th>Giao hàng</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Thay đổi trạng thái đơn hàng</th>
                            <th>Huỷ đơn hàng</th>
                        </tr>
                        <?php foreach ($result as $each) { ?>
                            <tr>
                                <td><?php echo $each['id'] ?></td>
                                <td class="td-display-flex">
                                    <span>- <?php echo $each['name_receiver'] ?></span>
                                    <span>- <?php echo $each['phone_number_receiver'] ?></span>
                                    <span>- <?php echo $each['address_receiver'] ?></span>
                                </td>
                                <td class="">
                                    <?php
                                    $order_id = $each['id'];
                                    $sql_product = "select products.* 
                                                    from products join order_product on order_product.product_id = products.id 
                                                    where order_product.order_id = '$order_id'";
                                    // die($product);
                                    $result_product = mysqli_query($connect, $sql_product);
                                    ?>
                                    <?php foreach ($result_product as $product) { ?>

                                        <div style="display: flex;">
                                            <span><?php echo $product['name'] ?></span>
                                            <span>Giá: <?php echo number_format($product['price'], 0, 0, '.') ?>₫</span>
                                        </div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo number_format($each['total_price'], 0, 0, '.') ?>₫
                                </td>
                                <td>
                                    <?php echo $each['created_at'] ?>
                                </td>
                                <td>
                                    <?php if ($each['payment_method'] == 'bacs') {
                                        echo 'Chuyển khoản';
                                    }
                                    if ($each['payment_method'] == 'cod') {
                                        echo 'Thanh toán khi nhận hàng';
                                    }  ?>
                                </td>
                                <td>
                                    <?php if ($each['shipping_method'] == 'local_pickup') {
                                        echo 'Nhận hàng tại shop';
                                    }
                                    if ($each['shipping_method'] == 'cod') {
                                        echo 'Giao hàng tận nơi';
                                    }  ?>
                                </td>
                                <td>
                                    <?php if ($each['status_id'] == '1') {
                                        echo 'Đang chờ xác nhận';
                                    } elseif ($each['status_id'] == '2') {
                                        echo 'Đang chuẩn bị đơn hàng';
                                    } elseif ($each['status_id'] == '3') {
                                        echo 'Đang giao hàng';
                                    } elseif ($each['status_id'] == '3') {
                                        echo 'Đã giao hàng';
                                    } else {
                                        echo 'Đã huỷ';
                                    }  ?>
                                </td>
                                <td class="">
                                    <a href="./process_update.php?id=<?php echo $order_id ?>&status_id=2" <?php if ($each['status_id'] != 1) {
                                                                                                                echo 'hidden';
                                                                                                            } ?>>Xác nhận đơn</a>
                                    <a href="./process_update.php?id=<?php echo $order_id ?>&status_id=3" <?php if ($each['status_id'] != 2) {
                                                                                                                echo 'hidden';
                                                                                                            } ?>>Đơn hàng đã giao cho shipper</a>
                                </td>
                                <td <?php if ($each['status_id'] != '1') {
                                        echo 'hidden';
                                    } ?>><a href="./process_update.php?id=<?php echo $order_id ?>&status_id=4">Huỷ đơn</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php
                            $num_row = mysqli_num_rows($result);
                            
                            if($num_row == 0) { ?> 
                            <tr>
                                Không tìm thấy đơn hàng theo mã: <?php echo $search  ?>
                            </tr>
                        <?php } ?>
                    </table>
                    <div class="row">
                        <div class="pagination col l-12">
                            <div class="pagination__item">
                                <?php if ($number_of_pages != 0) { ?>
                                    <a href="./index.php?page=1&search=<?php echo $search ?>" class="pagination__item-link">
                                        <i class="pagination__item-icon fa-solid fa-arrow-left"></i>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                                <div class="pagination__item">
                                    <a href="./index.php?page=<?php echo $i ?>&search=<?php echo $search ?>" class="pagination__item-link"><?php echo $i ?></a>
                                </div>
                            <?php } ?>
                            <div class="pagination__item">
                                <?php if ($number_of_pages != 0) { ?>
                                    <a href="./index.php?page=<?php echo $number_of_pages ?>&search=<?php echo $search ?>" class="pagination__item-link">
                                        <i class="pagination__item-icon fa-solid fa-arrow-right"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php require '../root/footer.php' ?>
        </div>
    </div>
</body>
</html>