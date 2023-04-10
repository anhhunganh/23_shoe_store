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
    <title>Cập nhật thông tin sản phẩm</title>
</head>

<body>
    <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('location:./index.php?error=Loi id không tồn tại');
        exit;
    } ?>
    <?php require '../root/connect.php' ?>
    <?php 
        $sql = "select products.*, manufacturers.id as manufacturer_id, categories.id as category_id, sub_categories.id as sub_category_id
                from 
                    products join sub_categories on products.sub_category_id = sub_categories.id
                            join categories on sub_categories.category_id = categories.id
                            join manufacturers on categories.manufacturer_id = manufacturers.id
                where products.id = '$id'";
                // die($sql);
    $result = mysqli_query($connect, $sql);

    $sql_manufacturer = "select * from manufacturers";
    $manufacturer = mysqli_query($connect, $sql_manufacturer);

    $sql_category = "select categories.*, products.id as product_id
                    from 
                        categories join sub_categories on categories.id = sub_categories.category_id
                        join products on sub_categories.id = products.sub_category_id where products.id = '$id'";
                        // die($sql_category);
    $category = mysqli_query($connect, $sql_category);
    $each_category = mysqli_fetch_array($category);

    $sql_sub_category = "select sub_categories.*, products.id as product_id
                    from sub_categories join products on sub_categories.id = products.sub_category_id where products.id = '$id'";
                        // die($sql_sub_category);
    $sub_category = mysqli_query($connect, $sql_sub_category);
    $each_sub_category = mysqli_fetch_array($sub_category);

    $num_row = mysqli_num_rows($result);
    if ($num_row === 1) {
        $each = mysqli_fetch_array($result);
    ?>
        <div class="main">
            <?php require '../root/menu.php' ?>
            <div class="container">
                <?php require '../root/header.php' ?>
                <div class="content">
                    <form action="./process_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                        <label>
                            <span>Tên sản phẩm</span>
                            <input type="text" name="name" value="<?php echo $each['name'] ?>">
                        </label><br>
                        <label>
                            <span>Giá sản phẩm</span>
                            <input type="text" name="price" value="<?php echo $each['price'] ?>">
                        </label><br>
                        <label>
                            <span>Nhà sản xuất </span>
                            <select name="manufacturer_id" class="manufacturer_id" id="">
                                <option value="">Chọn nhà sản xuất</option>
                                <?php foreach ($manufacturer as $manufacturer) { ?>
                                    <option value="<?php echo $manufacturer['id'] ?>" <?php if ($manufacturer['id'] == $each['manufacturer_id']) { ?> selected <?php } ?>>
                                        <?php echo $manufacturer['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </label><br>
                        <label>
                            <span>Danh mục sản phẩm </span>
                            <select name="category_id" class="category_id" id="">
                                <option value="">Chọn Danh mục sản phẩm</option>
                                <option value="<?php echo $each_category['id'] ?>" <?php if($each_category['id'] == $each['category_id']) { ?> selected <?php } ?>>
                                    <?php echo $each_category['name'] ?>
                                </option>
                            </select>
                        </label><br>
                        <label>
                            <span>Thể loại sản phẩm </span>
                            <select name="sub_category_id" class="sub_category_id" id="">
                                <option value="">Chọn Thể loại sản phẩm</option>
                                <option value="<?php echo $each_sub_category['id'] ?>" <?php if($each_sub_category['id'] == $each['sub_category_id']) { ?> selected <?php } ?>>
                                    <?php echo $each_sub_category['name'] ?>
                                </option>
                            </select>
                        </label><br>
                        <label>
                            <span>Ảnh cũ sản phẩm</span>
                            <input type="hidden" name="image_old" value="<?php echo $each['image'] ?>">
                            <img height="200" src="img/<?php echo $each['image'] ?>" alt="">
                        </label><br>
                        <label>
                            <span>Thay ảnh mới: </span>
                            <input type="file" name="image">
                        </label><br>
                        <label>
                            <span>Thông tin chi tiết</span>
                            <a href="./form_product_detail.php?id=<?php echo $id ?>">Thêm ảnh phụ</a>
                        </label><br>
                        <button>Sửa thông tin sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } else {
        header('location:./index.php?error=Loi');
        exit;
    } ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $(".manufacturer_id").change(function () {
            var manufacturer_id = $(".manufacturer_id").val();
            $.ajax({
                type: "post",
                url: "./data.php",
                data: {
                    manufacturer_id
                },
            }).done(function (data) {
                $(".category_id").html(data);
            });
        });
        $(".category_id").change(function (){
            var category_id = $(".category_id").val();
            $.ajax({
                type: "post",
                url: "./data.php",
                data: {
                    category_id
                },
            }).done(function (data) {
                $(".sub_category_id").html(data);
            });
        })
    });
</script>

</html>