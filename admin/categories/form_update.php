<?php
require '../check_super_admin_login.php';
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
    <title>Cập nhật nhà sản xuất</title>
</head>

<body>
    <?php require '../root/connect.php' ?>
    <?php require '../root/menu.php' ?>
    <?php

    if (!isset($_GET['id'])) {
        header('location:./index.php');
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from categories where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    $each = mysqli_fetch_array($result);
    // die($each['manufacturer_id']);
    if ($num_row === 1) {
    ?>
        <div class="main">
            <?php require '../root/menu.php' ?>
            <div class="container">
                <?php require '../root/header.php' ?>
                <div class="content">
                    <form action="./process_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                        <label>
                            <span>Tên loại sản phẩm: </span>
                            <input type="text" name="name" id="" value="<?php echo $each['name'] ?>">
                        </label><br>
                        <label>
                            Chọn thương hiệu
                            <select name="manufacturer_id" id="">
                                <?php
                                $sql_manufacturer = "select * from manufacturers";
                                $manufacturer = mysqli_query($connect, $sql_manufacturer);
                                ?>
                                <?php foreach ($manufacturer as $manufacturer) { ?>
                                    <!-- <option value="<?php echo $manufacturer['id'] ?>" <?php if ($manufacturer['id'] == $each['manufacturer_id']) { ?> selected <?php } ?>> -->
                                    <option value="<?php echo $manufacturer['id'] ?>" <?php if ($manufacturer['id'] == $each['manufacturer_id']) { ?> selected <?php } ?>><?php echo $manufacturer['name'] ?></option>
                                    <?php echo $manufacturer['name'];
                                    echo $manufacturer['id'];
                                    echo $each['manufacturer_id'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </label>
                        <!-- <label>
                            <span>Ảnh cũ loại sản phẩm: </span>
                            <img height="200" src="img/<?php //echo $each['image'] 
                                                        ?>" alt="">
                            <input type="hidden" name="image_old" value="<?php //echo $each['image'] 
                                                                            ?>">
                        </label><br>
                        <label>
                            <span>Thay ảnh loại sản phẩm: </span>
                            <input type="file" name="image" id="">
                        </label><br> -->
                        <button>Sửa loại sản phẩm</button>
                    </form>
                </div>

            </div>
        </div>
    <?php } else {
        header('location:./index.php');
    } ?>
</body>

</html>