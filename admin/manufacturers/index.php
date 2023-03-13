<?php
require '../check_super_admin_login.php';
if (isset($_GET['page'])) {
    $check_page = (int) $_GET['page'];
    if ($check_page < 1) {
        header('location:./index.php');
        exit;
    }
}

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

    <div class="main">
        <?php require '../root/menu.php' ?>
        <div class="container">
            <?php require '../root/header.php' ?>
            <div class="content">
                <div class="grid">
                    <h2 class="row content__heading">
                        Quản lý Hãng sản xuất
                    </h2>
                    <div class="row statistic">
                        <div class="col l-o-3"></div>
                        <div class="col l-3">
                            <div class="statistic__item">
                                <i class="fa-solid fa-shop statistic__icon"></i>
                                <div class="statistic__wrap">
                                    <div class="statistic__text">Tổng số Hãng sản xuất</div>
                                    <?php
                                    $sql = "select id from manufacturers";
                                    $result = mysqli_query($connect, $sql);
                                    $num_row = mysqli_num_rows($result);
                                    ?>
                                    <div class="statistic__number"><?php echo $num_row ?></div>
                                </div>
                            </div>

                        </div>
                        <div class="col l-3">
                            <div class="statistic__item">
                                <div class="statistic__wrap">
                                    <div class="statistic__text">Hãng được yêu thích</div>
                                </div>
                            </div>

                        </div>
                        <div class="col l-o-3"></div>
                    </div>
                    <div><a href="./form_insert.php">Thêm hãng sản xuất</a></div>
                    <div>
                        <?php
                        $search = '';
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                        }
                        $page = 1;
                        if (isset($_GET['page'])) {
                            $page = (int) $_GET['page'];
                        }

                        $sql = "select * from manufacturers";
                        $result = mysqli_query($connect, $sql);

                        $number_items_of_page = 10; //Số item trên 1 trang

                        $sql_number_items = "select count(*) from manufacturers where name like '%$search%'";
                        $result_arr_number_items = mysqli_query($connect, $sql_number_items);
                        $number_items = mysqli_fetch_array($result_arr_number_items)['count(*)'];
                        $skip_number_items = $number_items_of_page * ($page - 1); //

                        $number_of_pages = ceil($number_items / $number_items_of_page);


                        $sql = "select manufacturers.* from manufacturers
                                limit $number_items_of_page offset $skip_number_items";
                        $result = mysqli_query($connect, $sql);
                        $num_row = mysqli_num_rows($result);
                        ?>
                        <form action="">
                            <input type="text" name="search" placeholder="Tìm kiếm Nhà sản xuất">
                            <button>Search</button>
                        </form>
                    </div>
                    <table>
                        <tr>
                            <td>Tên</td>
                            <td>Update</td>
                            <?php if ($_SESSION['admin_level'] == 1) { ?>
                                <td>Delelte</td>
                            <?php } ?>
                        </tr>
                        <?php foreach ($result as $each) { ?>
                            <tr>
                                <td><a href="./product_info.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a></td>
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
            </div>
        </div>
    </div>
</body>

</html>