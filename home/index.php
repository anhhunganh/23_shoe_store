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
    <title>Trang chủ</title>
</head>

<body>
    <?php
    require '../admin/root/connect.php';

    $sql_new_arrival = "select * from products order by created_at desc limit 9";
    $result_new_arrival = mysqli_query($connect, $sql_new_arrival);

    ?>
    <div class="main">
        <?php require '../pages/header.php' ?>

        <div class="container">
            <a href="../collection/index.php" class="container-background__link">
                <div class="container-background__img" id="background__img"></div>
            </a>

            <div class="grid wide">
                <div class="row">
                    <div class="section-title col l-12">
                        <b></b>
                        <h2>Sản Phẩm Mới</h2>
                        <b></b>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($result_new_arrival as $each_new_arrival) { ?>
                        <div class="col l-4">
                            <div class="product-item">
                                <a class="product-item__link" href="./product_detail.php?id=<?php echo $each_new_arrival['id'] ?>">
                                    <img class="product-item__img" src="../admin/products/img/<?php echo $each_new_arrival['image'] ?>" alt="">
                                    <h3 class="product-item__name"><?php echo $each_new_arrival['name'] ?></h3>
                                    <span class="product-item__price"><?php echo number_format($each_new_arrival['price'], 0, 0, '.') . '₫' ?></span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col l-12">
                        <div class="container-btn">
                            <a href="../collection/index.php?sortby=date" class="container-btn__link">Xem tất cả ></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="section-title col l-12">
                        <b></b>
                        <h2>Sản Bán Chạy</h2>
                        <b></b>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($result_new_arrival as $each_new_arrival) { ?>
                        <div class="col l-4">
                            <div class="product-item">
                                <a class="product-item__link" href="./product_detail.php?id=<?php echo $each_new_arrival['id'] ?>">
                                    <img class="product-item__img" src="../admin/products/img/<?php echo $each_new_arrival['image'] ?>" alt="">
                                    <h3 class="product-item__name"><?php echo $each_new_arrival['name'] ?></h3>
                                    <span class="product-item__price"><?php echo number_format($each_new_arrival['price'], 0, 0, '.') . '₫' ?></span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col l-12">
                        <div class="container-btn">
                            <a href="" class="container-btn__link">Xem tất cả ></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="section-title col l-12">
                        <b></b>
                        <h2>Sản Phẩm Mới</h2>
                        <b></b>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($result_new_arrival as $each_new_arrival) { ?>
                        <div class="col l-4">
                            <div class="product-item">
                                <a class="product-item__link" href="./product_detail.php?id=<?php echo $each_new_arrival['id'] ?>">
                                    <img class="product-item__img" src="../admin/products/img/<?php echo $each_new_arrival['image'] ?>" alt="">
                                    <h3 class="product-item__name"><?php echo $each_new_arrival['name'] ?></h3>
                                    <span class="product-item__price"><?php echo number_format($each_new_arrival['price'], 0, 0, '.') . '₫' ?></span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col l-12">
                        <div class="container-btn">
                            <a href="" class="container-btn__link">Xem tất cả ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require '../pages/banner.php' ?>

        <?php require '../pages/footer.php' ?>
    </div>
</body>
<!-- <script>
    var i = 0;
    var images = [];
    var slideTime = 10000; // 3 seconds

    images[0] = 'https://sneakerholicvietnam.vn/wp-content/uploads/2023/02/dscf5622-2-1536x1536.jpg';
    images[1] = 'https://uproxx.com/wp-content/uploads/2021/03/Air_Jordan_3_Feat_R1-1.jpg?w=1600&h=510&crop=1';
    images[2] = 'https://uproxx.com/wp-content/uploads/2022/10/jordan-tf-uproxx.jpg?w=1600&h=500&crop=1https://uproxx.com/wp-content/uploads/2022/10/jordan-tf-uproxx.jpg?w=1600&h=500&crop=1';

    function changePicture() {
        var background__img = document.getElementById("background__img");
        background__img.style.backgroundImage = "url(" + images[i] + ")";
        // document.body.style.backgroundImage = "url(" + images[i] + ")";

        if (i < images.length - 1) {
            i++;
        } else {
            i = 0;
        }
        setTimeout(changePicture, slideTime);
    }

    window.onload = changePicture;
</script> -->

</html>