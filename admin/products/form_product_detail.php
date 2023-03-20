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
    <?php
    require '../root/connect.php';
    $sql = "select * from products";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <?php

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
    }
    ?>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="">
                <form action="./process_insert_product_detail.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                    <label>
                        <span>Ảnh 1: </span>
                        <input type="file" class="imgInput" name="image[]">
                        <img height="200" class="imgShow" src="" alt="">
                    </label><br>
                    <label>
                        <span>Ảnh 2: </span>
                        <input type="file" class="imgInput" name="image[]">
                        <img height="200" class="imgShow" src="" alt="">
                    </label><br>
                    <label>
                        <span>Ảnh 3: </span>
                        <input type="file" class="imgInput" name="image[]">
                        <img height="200" class="imgShow" src="" alt="">
                    </label><br>
                    <label>
                        <span>Ảnh 4: </span>
                        <input type="file" class="imgInput" name="image[]">
                        <img height="200" class="imgShow" src="" alt="">
                    </label><br>
                    <button>Thêm thông tin sản phẩm</button>
                </form>
            </div>
            <?php require '../root/footer.php' ?>
        </div>
    </div>
</body>
<script>
    imgInput = document.querySelectorAll(".imgInput")
    // console.log(imgInput)
    imgShow = document.querySelectorAll(".imgShow")
    for (let index = 0; index < imgInput.length; index++) {
        // console.log(index)
        imgInput[index].onchange = evt => {
            const [file] = imgInput[index].files
            console.log(file)
            if (file) {
                imgShow[index].src = URL.createObjectURL(file)
            }
        }
        // console.log(element);
    }
</script>

</html>