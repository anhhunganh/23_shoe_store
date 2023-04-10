<?php session_start(); ?>
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
    require '../admin/root/connect.php';

    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $sort = '';

    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        if ($sort == 'asc') {
            if (isset($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
                $sql_number_items = "select count(*) from products 
            join sub_categories on products.sub_category_id = sub_categories.id
            join categories on categories.id = sub_categories.category_id 
            where categories.id = '$category_id' and products.name like '%$search%' order by price asc";
            } else {
                $sql_number_items = "select count(*) from products where products.name like '%$search%' order by price asc";
                // die($sql_number_items);
            }
        } else {
        }
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

    if ($sort == 'asc') {
        if (isset($_GET['category_id'])) {
            $sql = "select products.* from products 
                join sub_categories on products.sub_category_id = sub_categories.id
                join categories on categories.id = sub_categories.category_id
                where products.name like '%$search%' and categories.id = '$category_id' order by products.price asc limit $number_items_of_page offset $skip_number_items";
            // die($sql);
        } else {
            $sql = "select * from products where products.name like '%$search%' order by products.price asc limit $number_items_of_page offset $skip_number_items";
        }
    } elseif ($sort == 'desc') {
        if (isset($_GET['category_id'])) {
            $sql = "select products.* from products 
                join sub_categories on products.sub_category_id = sub_categories.id
                join categories on categories.id = sub_categories.category_id
                where products.name like '%$search%' and categories.id = '$category_id' order by products.price desc limit $number_items_of_page offset $skip_number_items";
            // die($sql);
        } else {
            $sql = "select * from products where products.name like '%$search%' order by products.price desc limit $number_items_of_page offset $skip_number_items";
        }
    } else {
        if (isset($_GET['category_id'])) {
            $sql = "select products.* from products 
                join sub_categories on products.sub_category_id = sub_categories.id
                join categories on categories.id = sub_categories.category_id
                where products.name like '%$search%' and categories.id = '$category_id' limit $number_items_of_page offset $skip_number_items";
            // die($sql);
        } else {
            $sql = "select * from products where products.name like '%$search%' limit $number_items_of_page offset $skip_number_items";
        }
    }


    $result = mysqli_query($connect, $sql);


    ?>
    <div class="main">
        <?php require '../pages/header.php' ?>

        <div class="container">
            <div class="grid wide">
                <div class="filter">
                    <div class="filter-left"></div>
                    <div class="filter-right">
                        <div class="filter-right__text">
                            Showing <?php echo $number_items_of_page * $page - 29 ?> - <?php if ($number_items_of_page * $page > $number_items) {
                                                                                            echo $number_items;
                                                                                        } else {
                                                                                            echo $number_items_of_page * $page;
                                                                                        }  ?>
                            of <?php echo $number_items ?> results
                        </div>
                        <form action="">
                            <select name="filter_by" id="select_sort_by" class="filter-right__select">
                                <option class="filter-right__option" value="date" <?php if ($sort == 'date') { ?>selected<?php } ?>>Sắp xếp theo Mới nhất</option>
                                <option class="filter-right__option" value="popularity" <?php if ($sort == 'popularity') { ?>selected<?php } ?>>Sắp xếp theo độ phổ biến</option>
                                <option class="filter-right__option" value="rating" <?php if ($sort == 'rating') { ?>selected<?php } ?>>Sắp xếp theo đánh giá</option>
                                <option class="filter-right__option" value="asc" <?php if ($sort == 'asc') { ?>selected<?php } ?>>Sắp xếp theo giá: thấp đến cao</option>
                                <option class="filter-right__option" value="desc" <?php if ($sort == 'desc') { ?>selected<?php } ?>>Sắp xếp theo giá: cao đến thấp</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col l-3">
                        <div class="navbar">
                            <form action="" method="get" class="navbar-form">
                                <div class="navbar-item-separator"></div>
                                <span class="navbar-title">Danh mục sản phẩm</span>
                                <div class="navbar-list">
                                    <?php
                                    $sql_manufacturer = "select * from manufacturers";
                                    $result_manufacturer = mysqli_query($connect, $sql_manufacturer);

                                    foreach ($result_manufacturer as $each_manufacturer) { ?>
                                        <label class="navbar-item">
                                            <input type="radio" name="search" id="input_manufacuturer" value="<?php echo $each_manufacturer['name'] ?>"> <?php echo $each_manufacturer['name'] ?><br>
                                        </label>
                                    <?php } ?>
                                </div>

                                <div class="navbar-item-separator"></div>

                                <div class="range-wrap">
                                    <?php
                                    $sql_min_price = "select price from products order by price asc limit 1";
                                    $result_min_price = mysqli_query($connect, $sql_min_price);
                                    $min_price = mysqli_fetch_array($result_min_price)['price'];

                                    $sql_max_price = "select price from products order by price desc limit 1";
                                    $result_max_price = mysqli_query($connect, $sql_max_price);
                                    $max_price = mysqli_fetch_array($result_max_price)['price'];
                                    ?>

                                    <div class="range-input">
                                        <div class="range-field">
                                            <input type="number" class="range-input-value range-input-value-min" name="range-min-input" id="" value="<?php echo $min_price ?>" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" step="10000">
                                        </div>
                                        <div class="range-separator">-</div>
                                        <div class="range-field">
                                            <input type="number" class="range-input-value range-input-value-max" name="range-max-input" id="" value="<?php echo $max_price ?>" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" step="10000">
                                        </div>
                                    </div>
                                    <div class="range-slider">
                                        <div class="range-slider-progress">
                                        </div>
                                    </div>
                                    <div class="range-change">
                                        <input type="range" class="range-input-change range-input-change-min" name="range-max-input" id="" value="<?php echo $min_price ?>" min="0" max="<?php echo $max_price ?>" step="10000">
                                        <input type="range" class="range-input-change range-input-change-max" name="range-max-input" id="" value="<?php echo $max_price ?>" min="0" max="<?php echo $max_price ?>" step="10000">
                                    </div>
                                </div>

                                <div class="navbar-item-separator"></div>

                                <button class="navbar-btn">Tìm kiếm</button>
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
                    <a href="./index.php?page=1<?php if ($search != '') {
                                                    echo "&search=" . $search;
                                                } ?><?php if (isset($_GET['sort'])) {
                                                        echo "&sort=" . $sort;
                                                    } ?>" class="page__item-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
                <div class="page__item">
                    <?php for ($i = 1; $i <= $number_of_page; $i++) { ?>
                        <a href="./index.php?page=<?php echo $i ?><?php if ($search != '') {
                                                                        echo "&search=" . $search;
                                                                    } ?><?php if (isset($_GET['sort'])) {
                                                                            echo "&sort=" . $sort;
                                                                        } ?>" class="page__item-link"><?php echo $i ?></a>
                    <?php } ?>
                </div>
                <div class="page__item" style="margin: 0 12px;">
                    <a href="./index.php?page=<?php echo $number_of_page ?><?php if ($search != '') {
                                                                                echo "&search=" . $search;
                                                                            } ?>" class="page__item-link">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require '../pages/footer.php' ?>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $("#select_sort_by").change(function() {
            var conceptName = $('#select_sort_by').find(":selected").val();
            window.location.href = 'index.php?search=<?php echo $search ?>&sort=' + conceptName;
        });
    });

    function searchInputRadio() {
        // var 
    }
</script>
<script src="./priceRange.js"></script>

</html>