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
    <title>Document</title>
</head>

<body>
    <?php
    require '../root/connect.php';

    $search = '';
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $number_items_of_page = 15;

    $sql_number_items = "select count(sub_categories.id) 
                        from 
                            sub_categories join categories on sub_categories.category_id = categories.id
                                            join manufacturers on categories.manufacturer_id = manufacturers.id
                        where 
                            sub_categories.name like '%$search%' or manufacturers.name like '%$search%'";
    $result_arr_number_items = mysqli_query($connect, $sql_number_items);
    $number_items = mysqli_fetch_array($result_arr_number_items)['count(sub_categories.id)'];
    $skip_number_items = $number_items_of_page * ($page - 1);

    $number_of_pages = ceil($number_items / $number_items_of_page);

    $sql = "select sub_categories.*, manufacturers.name as manufacturer_name, categories.name as category_name
                from 
                    sub_categories join categories on sub_categories.category_id = categories.id
                                    join manufacturers on categories.manufacturer_id = manufacturers.id
                where
                    sub_categories.name like '%$search%' or manufacturers.name like '%$search%' limit $number_items_of_page offset $skip_number_items";
    // die($sql);
    $result = mysqli_query($connect, $sql);

    // die($number_items);
    ?>
    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="content">
                <div class="grid">
                    <h2 class="row content__heading">Quản lý Thể Loại sản phẩm</h2>
                    <div class="row">
                        <div class="col l-o-1"></div>
                        <div class="col l-10"><a class="add-item__link" href="./form_insert.php">
                                <i class="fa-solid fa-plus"></i>
                                ADD
                            </a>
                            <table>
                                <tr>
                                    <td>Name</td>
                                    <td>Thương hiệu</td>
                                    <td>Loại sản phẩm</td>
                                    <td>Ảnh</td>
                                    <td>Update</td>
                                    <td>Delete</td>
                                </tr>
                                <?php foreach ($result as $each) { ?>
                                    <tr>
                                        <td class="td-item__name"><?php echo $each['name'] ?></td>
                                        <td class="text-center"><?php echo $each['manufacturer_name'] ?></td>
                                        <td class="text-center"><?php echo $each['category_name'] ?></td>
                                        <td style="text-align: center;"><img height="100" src="./img/<?php echo $each['image'] ?>" alt=""></td>
                                        <!-- <td><img height="200" src="img/<?php //echo $each['image'] 
                                                                            ?>" alt=""></td> -->
                                        <td class="td-item__update text-center"><a href="./form_update.php?id=<?php echo $each['id'] ?>">Update</a></td>
                                        <td class="td-item__delete text-center"><a href="./process_delete.php?id=<?php echo $each['id'] ?>">Delete</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="col l-o-1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="pagination col l-12">
                        <div class="pagination__item">
                            <?php if ($page > 1) { ?>
                                <a href="./index.php?page=<?php echo $page - 1 ?>&search=<?php echo $search ?>" class="pagination__item-link">
                                    <i class="pagination__item-icon fa-solid fa-arrow-left"></i>
                                </a>
                            <?php } ?>
                        </div>
                        <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                            <div class="pagination__item">
                                <a href="./index.php?page=<?php echo $i ?>&search=<?php echo $search ?>" class="pagination__item-link">
                                    <?php echo $i ?>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="pagination__item">
                            <?php if ($page < $number_of_pages) { ?>
                                <a href="./index.php?page=<?php echo ($page + 1) ?>&search=<?php echo $search ?>" class="pagination__item-link">
                                    <i class="pagination__item-icon fa-solid fa-arrow-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php require '../root/footer.php' ?>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>