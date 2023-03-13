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
    <title>Sản phẩm</title>
</head>

<body>
    <?php require '../root/connect.php' ?>
    <?php
    $category_id = '';
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
    }

    $manufacturer_id = '';
    if (isset($_GET['manufacturer_id'])) {
        $manufacturer_id = $_GET['manufacturer_id'];
    }

    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $number_items_of_page = 20; //Số item trên 1 trang

    $sql_number_items = "select count(*) from products where name like '%$search%'";
    $result_arr_number_items = mysqli_query($connect, $sql_number_items);
    $number_items = mysqli_fetch_array($result_arr_number_items)['count(*)'];
    $number_of_pages = ceil($number_items / $number_items_of_page);

    $skip_number_items = $number_items_of_page * ($page - 1); //

    $sql = "select products.*, categories.name as category_name, manufacturers.name as manufacturer_name 
                from 
                    products join sub_categories on products.sub_category_id = sub_categories.id
                            join categories on categories.id = sub_categories.category_id
                            join manufacturers on categories.manufacturer_id = manufacturers.id 
                where 
                    products.name like '%$search%'
                limit $number_items_of_page offset $skip_number_items";
    // die($sql);
    $result = mysqli_query($connect, $sql);
    $num_row = mysqli_num_rows($result);
    ?>

    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="content">
                <div class="grid">
                    <h2 class="row content__heading">Quản lý Sản phẩm</h2>
                    <div class="row statistic">
                        <div class="col l-4">
                            <div class="statistic__item">

                                <div class="statistic__wrap"></div>
                            </div>
                        </div>
                        <div class="col l-4">
                            <div class="statistic__item">

                                <div class="statistic__wrap"></div>
                            </div>
                        </div>
                        <div class="col l-4">
                            <div class="statistic__item">

                                <div class="statistic__wrap"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div><a href="./form_insert.php">Thêm sản phẩm</a></div>
                <h2><?php 
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?></h2>
                <div>
                    <?php
                    $sql_manufacturer = "select * from manufacturers";
                    $result_manufacturer = mysqli_query($connect, $sql_manufacturer);

                    $sql_category = "select * from categories";
                    $result_category = mysqli_query($connect, $sql_category);
                    ?>
                    <form action="">
                        <span>Tìm kiếm theo Hãng</span>
                        <select name="manufacturer_id" class="manufacturer_id" id="">
                            <option value="">Chọn hãng sản xuất</option>
                            <?php foreach ($result_manufacturer as $each_manufacturer) { ?>
                                <option value="<?php echo $each_manufacturer['id'] ?>"><?php echo $each_manufacturer['name'] ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <span>Tìm kiếm theo danh mục sản phẩm</span>
                        <select name="category_id" class="category_id" id="">
                            <option value="">Chọn loại giày</option>
                        </select>
                        <br>
                        <span>Tìm kiếm theo loại sản phẩm</span>
                        <select name="sub_category_id" class="sub_category_id" id="">
                            <option value="">Chọn Thể loại giày</option>
                        </select>
                        <br>
                        <button>Search</button>
                    </form>
                </div>
                <table>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Loại sản phẩm</td>
                        <td>Danh mục sản phẩm</td>
                        <td>Ảnh sản phẩm</td>
                        <td>Update</td>
                        <?php if ($_SESSION['admin_level'] == 1) { ?>
                            <td>Delelte</td>
                        <?php } ?>
                    </tr>
                    <?php foreach ($result as $each) { ?>
                        <tr>
                            <td><a href="./product_info.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a></td>
                            <td><?php echo $each['price'] ?></td>
                            <td><?php echo $each['manufacturer_name'] ?></td>
                            <td><?php echo $each['category_name'] ?></td>
                            <td><img height="100" src="./img/<?php echo $each['image'] ?>" alt=""></td>
                            <td><a href="./form_update.php?id=<?php echo $each['id'] ?>">Update</a></td>
                            <?php if ($_SESSION['admin_level'] == 1) { ?>
                                <td><a href="./process_delete.php?id=<?php echo $each['id'] ?>">Delete</a></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
                <div class="row">
                <div class="pagination col l-12">
                    <div class="pagination__item">
                        <a href="./index.php?page=1&search=<?php echo $search ?>" class="pagination__item-link">
                            <i class="pagination__item-icon fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                    <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                        <div class="pagination__item">
                            <a href="./index.php?page=<?php echo $i ?>&search=<?php echo $search ?>" class="pagination__item-link"><?php echo $i ?></a>
                        </div>
                    <?php } ?>
                    <div class="pagination__item">
                        <a href="./index.php?page=<?php echo $number_of_pages ?>&search=<?php echo $search ?>" class="page__item-link">
                            <i class="pagination__item-icon fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
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