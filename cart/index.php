<?php
session_start();
require '../admin/root/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assest/css/grid.css">
    <link rel="stylesheet" href="../assest/css/main.css">
    <link rel="stylesheet" href="../assest/css/style.css">
    <title>Document</title>
    <style>
        .text-no-result {
            display: none;
        }

        .text-no-result.hide {
            display: block;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php
        require '../pages/header.php';
        ?>
        <div class="container">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-7">
                        <div class="text-no-result">
                            Bạn chưa thêm sản phẩm nào vào giỏ hàng!!!
                        </div>
                        <?php if (empty($_SESSION['cart'])) { ?>
                            <div class="no-result">
                                <div class="text">
                                    Bạn chưa thêm sản phẩm nào vào giỏ hàng!!!
                                </div>
                            </div>
                        <?php } else { ?>
                            <table class="cart-list">
                                <tr>
                                    <th colspan="2">Sản phẩm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                <?php
                                $cart = $_SESSION['cart'];
                                $total_price = 0;

                                foreach ($cart as $id => $each) { ?>
                                    <tr>
                                        <td>
                                            <a href="../collection/product.php?id=<?php echo $id ?>" style="display:flex; align-items:center;">
                                                <img height="100" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="../collection/product.php?id=<?php echo $id ?>" style="display:flex; align-items:center;">
                                                <?php echo $each['name'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $each['size'] ?>
                                        </td>
                                        <td>
                                            <a href="./update_quantity.php?id=<?php echo $id ?>&type=decrease"> - </a>
                                            <span><?php echo $each['quantity'] ?></span>
                                            <a href="./update_quantity.php?id=<?php echo $id ?>&type=increase"> + </a>
                                        </td>
                                        <td>
                                            <?php
                                            $sum = $each['price'] * $each['quantity'];
                                            echo number_format($sum, 0, 0, '.');
                                            $total_price += $sum;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        <?php } ?>
                        <div class="total-price">

                            <?php if (!empty($_SESSION['cart'])) { ?>
                                <h2>Tổng tiền: <?php echo number_format($total_price, 0, '.'); ?> ₫</h2>
                            <?php } else { ?>

                            <?php } ?>
                        </div>
                        <div>
                            <a href="../collection/index.php">Tiếp tục mua hàng</a>
                            <?php
                            if (!empty($_SESSION['cart'])) { ?>
                                <a class="delete-all-products" href="./delete_cart.php">Xoá toàn bộ giỏ hàng</a>
                            <?php } ?>
                        </div>
                        <div class="checkout">
                            <?php
                            if (!empty($_SESSION['cart'])) { ?>
                                <a href="./checkout.php">Thanh toán</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // $(document).ready(function() {
    //     $(".product__remove-link").click(function() {
    //         let id = $(this).data('id');
    //         $.ajax({
    //             type: "POST",
    //             url: "./delete_product.php",
    //             data: {
    //                 id
    //             }
    //         }).done(function(respone) {
    //             if (respone == 1) {
    //                 $(".product-detail").remove();
    //                 $(".total-price").remove();
    //                 $(".checkout").remove();
    //                 $(".delete-all-products").remove();
    //                 $(".text-no-result").addClass('hide');
    //                 // alert('Xoa san pham thanh cong');
    //             } else {
    //                 alert('Xoa san pham khong thanh cong');
    //             }
    //         })
    //     })
    // });
</script>

</html>