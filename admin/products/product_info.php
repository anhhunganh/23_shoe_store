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
    <title>Thông tin chi tiết sản phẩm |</title>
</head>

<body>
    <?php
    require '../root/connect.php';
    if (!isset($_GET['id'])) {
        header('location:./index.php');
        exit;
    } else {
        $id = $_GET['id'];
    }
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);

    $sql_product_sub_img = "select * from product_sub_images where product_id = '$id'";
    $result_sub_img = mysqli_query($connect, $sql_product_sub_img);

    ?>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="grid">
                <div class="row">
                    <div class="col l-o-2"></div>
                    <div class="col l-8">
                        <div class="row">
                            <div class="product">
                                <div class="col l-6">
                                    <div class="product-image">
                                        <img class="product-image__img" src="./img/<?php echo $each['image'] ?>" alt="">
                                        <div class="sub-image">
                                            <button id="image_prev" class="sub-image__btn prev"><i class="fa-solid fa-chevron-left fa-beat fa-2xs"></i></button>
                                            <button id="image_next" class="sub-image__btn next"><i class="fa-solid fa-chevron-right fa-beat fa-2xs"></i></button>
                                            <div class="sub-image__item" onclick="changeImage('./img/<?php echo $each['image'] ?>')">
                                                <img class="sub-image__item-img" src="./img/<?php echo $each['image'] ?>" alt="">
                                            </div>
                                            <?php foreach ($result_sub_img as $sub_img) { ?>
                                                <div class="sub-image__item" onclick="changeImage('./sub_img/<?php echo $sub_img['source'] ?>')">
                                                    <img class="sub-image__item-img" src="./sub_img/<?php echo $sub_img['source'] ?>" alt="">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col l-6">
                                    <div class="product-info__wrap">
                                        <h3 class="text-center">Thông tin chi tiết sản phẩm</h3>
                                        <a class="product-info__link" href="./form_product_detail.php?id=<?php echo $id ?>">Cập nhật ảnh phụ</a>
                                        <a class="product-info__link product-info__link-update" href="./form_update.php?id=<?php echo $id ?>">Update</a>
                                        <?php if ($_SESSION['admin_level'] == 1) { ?>
                                            <a class="product-info__link product-info__link-delete" href="./form_update.php?id=<?php echo $id ?>">Delete</a>
                                        <?php } ?>
                                        <h2 class="product-info__name"><?php echo $each['name'] ?></h2>
                                        <div class="product-info__price">Giá: <?php echo number_format($each['price'], 0, 0, '.') ?></div>
                                        <p class="product-info__description"><?php echo nl2br($each['description']) ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-o-2"></div>
                </div>
            </div>
            <?php require '../root/footer.php' ?>
        </div>
    </div>
</body>
<script>
    function changeImage(src) {
        document.querySelector('.product-image__img').src = src;
    }

    document.getElementById('image_next').onclick = function() {
        let lists = document.querySelectorAll('.sub-image__item');
        document.querySelector('.sub-image').appendChild(lists[0])
    }
    document.getElementById('image_prev').onclick = function() {
        let lists = document.querySelectorAll('.sub-image__item');
        document.querySelector('.sub-image').prepend(lists[lists.length - 1])
    }
</script>

</html>