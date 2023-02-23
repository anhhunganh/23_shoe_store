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
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php
            require '../pages/header.php';
        ?>
        <div class="container" style="margin-top: 112px;">
            <div class="heading-cart">
                Giỏ hàng của bạn
            </div>
            <?php if(empty($_SESSION['cart'])) { ?>
            <div class="no-result">
                <div class="text">
                    Bạn chưa thêm sản phẩm nào vào giỏ hàng!!!
                </div>
            </div>
            <?php } else { ?>
                <div>
                    <div class="cart-info">
                    <?php 
                        $cart = $_SESSION['cart'];
                        $total_price = 0;
                        
                        foreach($cart as $id => $each) { ?>
                        <div>
                            <div class="product-detail">
                                <div class="product-image">
                                    <a href="../collection/product.php?id=<?php echo $id ?>"><img height="200" src="../admin/products/img/<?php echo $each['image'] ?>" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <div class="product-name">
                                        <a href="../collection/product.php?id=<?php echo $id ?>"><?php echo $each['name'] ?></a>
                                    </div>
                                    <div class="product-size">Size: 
                                    <?php 
                                        $size_id = $each['size'];
                                        $sql = "select size.value from size where id = '$size_id'";
                                        $result = mysqli_query($connect, $sql);
                                        $each_size = mysqli_fetch_array($result);
                                        echo $each_size['value'];
                                    ?>
                                    </div>
                                    <div class="product-quantity">
                                        <a href="./update_quantity.php?id=<?php echo $id ?>&type=decrease"> - </a>
                                        <span><?php echo $each['quantity'] ?></span>
                                        <a href="./update_quantity.php?id=<?php echo $id ?>&type=increase"> + </a>
                                    </div>
                                    <div class="product-price">
                                        <?php 
                                            $sum = $each['price'] * $each['quantity'];
                                            echo number_format($sum, 0, '.') 
                                        ?> 
                                        ₫
                                    </div>
                                    <?php $sum = $each['price'] * $each['quantity']; $total_price += $sum;?>
                                </div>
                                <div class="product-remove">
                                    <a href="./delete_product.php?id=<?php echo $id ?>">Xoá</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="total-price">
                 
                    <?php if(!empty($_SESSION['cart'])) { ?>
                        <h2>Tổng tiền: <?php echo number_format($total_price, 0, '.'); ?> ₫</h2>
                    <?php } else { ?>
                    
                    <?php } ?>
            </div>
            <div>
                <a href="../collection/index.php">Tiếp tục mua hàng</a>
                <?php 
                    if(!empty($_SESSION['cart'])) { ?>
                    <a href="./delete_cart.php">Xoá toàn bộ giỏ hàng</a>
                <?php } ?>
            </div>
            <div>
                <?php 
                    if(!empty($_SESSION['cart'])) { ?>
                    <a href="./checkout.php">Thanh toán</a>
                <?php } ?>
            </div>
        </div>
    </div>
    
</body>
</html>