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
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    require '../admin/root/connect.php';
    $sql = "select * from products where id = '$id'";
    // die($sql);
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) !== 1) {
        header('location:./index.php');
        exit;
    }
    $each = mysqli_fetch_array($result);
    ?>
    <div class="main">
        <?php require '../pages/header.php' ?>
        <div class="container">
            <div class="grid wide">
                <div class="product-detail">
                    <div class="row">
                        <div class="col l-6">
                            <div class="product-gallery">
                                <img class="product-gallery__img" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                <div class="product-gallery__list">
                                    <div class="row">
                                        <div class="col l-3">
                                            <div class="product-gallery__item" onclick="changeImage('../admin/products/img/<?php echo $each['image'] ?> ')">
                                                <img class="product-gallery__item-img" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col l-3">
                                            <div class="product-gallery__item" onclick="changeImage()">
                                                <img class="product-gallery__item-img" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col l-3">
                                            <div class="product-gallery__item" onclick="changeImage()">
                                                <img class="product-gallery__item-img" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col l-3">
                                            <div class="product-gallery__item" onclick="changeImage()">
                                                <img class="product-gallery__item-img" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col l-6">
                            <div class="product-info">
                                <h1 class="product-info__name"><?php echo $each['name'] ?></h1>
                                <div class="product-info__price"><?php echo number_format($each['price'], 0, 0, '.') ?>₫</div>
                                <div class="product-info__size">
                                    <i class="fa-solid fa-ruler-combined product-info__size-icon"></i>
                                    <a href="" class="product-info__size-link">Size chart</a>
                                </div>
                                <div class="product-installment">
                                    <div class="product-installment__price">
                                        Hoặc<span> trả trước <?php echo number_format($each['price'] / 3, 0, 0, '.') ?> ₫ x3 kỳ </span> với <a href=""><span>Fundiin</span> Tìm hiểu (?).</a>
                                    </div>
                                    <div class="product-installment__panel">
                                        <i class="fa-solid fa-percent product-installment__panel-icon"></i>
                                        Giảm đến <span>70k</span> cho ĐH từ <span>100k</span> khi thanh toán qua <span style="color: #24c3fd">Fundiin</span>
                                    </div>
                                </div>
                                <form action="../cart/add_to_cart.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                                    <div class="product-size">
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="36">
                                            <span class="product-size__span">36</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="37">
                                            <span class="product-size__span">37</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="38">
                                            <span class="product-size__span">38</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="39">
                                            <span class="product-size__span">39</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="40">
                                            <span class="product-size__span">40</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="41">
                                            <span class="product-size__span">41</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="42">
                                            <span class="product-size__span">42</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="43">
                                            <span class="product-size__span">43</span>
                                        </label>
                                        <label class="product-size__label">
                                            <input type="radio" name="size" class="product-size__input" id="" value="44">
                                            <span class="product-size__span">44</span>
                                        </label>
                                    </div>
                                        <button>Thêm vào giỏ hàng</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    function changeImage(src) {
        document.querySelector('.product-gallery__img').src = src;
    }
</script>

</html>