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

    <div class="main">
        <?php require '../pages/header.php' ?>

    </div>
    <?php
    require '../admin/root/connect.php';

    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $sql_number_items = "select count(*) from products 
            join sub_categories on products.sub_category_id = sub_categories.id
            join categories on categories.id = sub_categories.category_id 
            where categories.id = '$category_id' and products.name like '%$search%'";
        // die($sql_number_items);
    } else {
        $sql_number_items = "select count(*) from products where products.name like '%$search%'";
    }

    $number_items_of_page = 30;
    $result_arr_number_items = mysqli_query($connect, $sql_number_items);
    $number_items = mysqli_fetch_array($result_arr_number_items)['count(*)'];
    $number_of_page = ceil($number_items / $number_items_of_page);

    $skip_number_items = $number_items_of_page * ($page - 1);

    if (isset($_GET['category_id'])) {
        $sql = "select products.* from products 
            join sub_categories on products.sub_category_id = sub_categories.id
            join categories on categories.id = sub_categories.category_id
            where products.name like '%$search%' and categories.id = '$category_id' limit $number_items_of_page offset $skip_number_items";
        // die($sql);
    } else {
        if(isset($_GET['sortby']) AND $_GET['sortby'] == 'date'){ 
            $sql = "select * from products where products.name like '%$search%' order by products.created_at desc limit $number_items_of_page offset $skip_number_items";
        } else {
            
            $sql = "select * from products where products.name like '%$search%' limit $number_items_of_page offset $skip_number_items";
        }
    }

    
    $result = mysqli_query($connect, $sql);


    ?>
    <div class="container">
        <div class="grid wide">
            <div class="filter">
                <div class="filter-left"></div>
                <div class="filter-right">
                    <div class="filter-right__text">
                        Showing <?php echo $number_items_of_page * $page - 29 ?> - <?php if($number_items_of_page * $page > $number_items){ echo $number_items; }else {echo $number_items_of_page * $page;}  ?>
                        of <?php echo $number_items ?> results 
                    </div>
                    <form action="">
                        <select name="filter_by" id="" class="filter-right__select">
                            <option class="filter-right__option" value="popularity">Sắp xếp theo độ phổ biến</option>
                            <option class="filter-right__option" value="rating">Sắp xếp theo đánh giá</option>
                            <option class="filter-right__option" value="date" selected>Sắp xếp theo Mới nhất</option>
                            <option class="filter-right__option" value="price">Sắp xếp theo giá: thấp đến cao</option>
                            <option class="filter-right__option" value="price-desc">Sắp xếp theo giá: cao đến thấp</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col l-3">
                    <div class="navbar">
                        <form action="" method="get">
                            <input type="text" name="search"><br>
                            <span>Tìm kiếm theo Hãng</span><br>
                            <?php 
                                $sql_manufacturer = "select * from manufacturers";
                                $result_manufacturer = mysqli_query($connect, $sql_manufacturer);

                                foreach($result_manufacturer as $each_manufacturer) { ?> 
                                <input type="radio" name="manufacturer_id" id="" value="<?php echo $each_manufacturer['id'] ?>"> <?php echo $each_manufacturer['name'] ?><br>
                            <?php } ?>
                            <span>Tìm kiếm theo Danh mục sản phẩm</span><br>
                            <?php 
                                $sql_category = "select * from categories";
                                $result_category = mysqli_query($connect, $sql_category);

                                foreach($result_category as $each_category) { ?> 
                                <input type="radio" name="category_id" id="" value="<?php echo $each_category['id'] ?>"> <?php echo $each_category['name'] ?><br>
                            <?php } ?>

                            <button>LỌC</button>
                        </form>
                    </div>
                </div>
                <div class="col l-9">
                    <div class="row">
                        <?php foreach ($result as $each) { ?>
                            <div class="col l-4">
                                <div class="product-item">
                                    <a class="product-item__link" href="./product_detail.php?id=<?php echo $each['id'] ?>">
                                        <img class="product-item__img" src="../admin/products/img/<?php echo $each['image'] ?>" alt="">
                                        <h3 class="product-item__name"><?php echo $each['name'] ?></h3>
                                        <span class="product-item__price"><?php echo number_format($each['price'], 0, 0, '.') . '₫' ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>

            </div>
        </div>
        <div style="display: flex; justify-content: center; margin-top: 20px">
            <div class="page__item" style="margin: 0 12px;">
                <a href="./index.php?page=1&search=<?php echo $search ?>" class="page__item-link">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="page__item">
                <?php for ($i = 1; $i <= $number_of_page; $i++) { ?>
                    <a href="./index.php?page=<?php echo $i ?>&search=<?php echo $search ?>" class="page__item-link"><?php echo $i ?></a>
                <?php } ?>
            </div>
            <div class="page__item" style="margin: 0 12px;">
                <a href="./index.php?page=<?php echo $number_of_page ?>&search=<?php echo $search ?>" class="page__item-link">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <?php require '../pages/footer.php' ?>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $(".filter-right__select").change(function () {
            var  filter__select = $(".filter-right__select").val();
            $.ajax({
                type: "get",
                url: "./index.php",
                data: {
                    filter__select
                },
            });
        })
    });
</script>
</html>