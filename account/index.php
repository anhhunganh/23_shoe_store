<?php
session_start();
if (empty($_SESSION['customer_id'])) {
    header('location:../sign-in/index.php');
    exit;
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
    <link rel="stylesheet" href="../assest/css/grid.css">
    <link rel="stylesheet" href="../assest/css/main.css">
    <link rel="stylesheet" href="../assest/css/style.css">
    <title>Thông tin tài khoản</title>
</head>

<body>
    <div class="main">
        <?php
        require '../pages/header.php';

        if (empty($_GET['view'])) {
            header('location:./index.php?view=main');
            exit;
        }

        $id_user = $_SESSION['customer_id'];
        $sql_user = "select * from customers where id = '$id_user'";
        $result_user = mysqli_query($connect, $sql_user);
        $each_user = mysqli_fetch_array($result_user);
        ?>

        <div class="container">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-3">
                        <div class="user-navbar">
                            <a href="./index.php?view=main" class="user-navbar__title">Trung tâm cá nhân</a>
                            <span class="user-navbar__list-title">Tài khoản của tôi</span>
                            <ul class="user-navbar__list">
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=info">Thông tin của tôi</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=address">Địa chỉ</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=doluong">Đo lường size</a>
                                </li>
                            </ul>
                            <span class="user-navbar__list-title">Tài sản của tôi</span>
                            <ul class="user-navbar__list">
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=coupon">Phiếu giảm giá</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=diemthuong">Điểm thưởng</a>
                                </li>
                            </ul>
                            <span class="user-navbar__list-title">Đơn hàng của tôi</span>
                            <ul class="user-navbar__list">
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=all">Tất cả đơn hàng</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=processing">Đơn hàng đang xử lý</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=shipping">Đơn hàng đang giao hàng</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=shipped">Đơn hàng đã giao hàng</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=rate-not">Đơn hàng chưa đánh giá</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=rate-done">Đơn hàng đã đánh giá</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=cancelled">Đơn hàng đã huỷ</a>
                                </li>
                                <li class="user-navbar__item">
                                    <a class="user-navbar__item-link" href="./index.php?view=order&type=refund">Đơn hàng trả lại</a>
                                </li>
                            </ul>
                            <a href="../sign-in/process_signout.php" class="user-navbar__logout user-navbar__title">Đăng xuất</a>
                        </div>
                    </div>
                    <div class="col l-9">
                        <div class="user-content">
                            <div class="row">
                                <div class="col l-10">
                                    <div class="account-box <?php if (isset($_GET['view']) && $_GET['view'] != 'main') { ?>
                                                                        hidden
                                                            <?php } ?>">
                                        <div class="name-account">
                                            <h2>Chào, <?php echo $_SESSION['customer_name'] ?></h2>
                                            <a href="./index.php?view=info" class="account-name-link">Thông tin của tôi ></a>
                                        </div>
                                        <div class="account-nav">
                                            <ul class="account-nav-list">
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <span class="account-nav-item-span">0</span>
                                                        </div>
                                                        <div class="account-nav-item-title">Phiếu giảm giá</div>
                                                    </a>
                                                </li>
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <span class="account-nav-item-span">0</span>
                                                        </div>
                                                        <div class="account-nav-item-title">Điểm thưởng</div>
                                                    </a>
                                                </li>
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <i class="fa-solid fa-crown"></i>
                                                            <span class="account-nav-item-span"></span>
                                                        </div>
                                                        <div class="account-nav-item-title">Member</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="account-box <?php if (isset($_GET['view']) && $_GET['view'] != 'main') { ?>
                                                                    hidden
                                                            <?php } ?>">
                                        <div class="name-account">
                                            <h2>Đơn hàng của tôi</h2>
                                            <a href="./index.php?view=order&type=all" class="account-name-link">Xem tất cả ></a>
                                        </div>
                                        <div class="account-nav">
                                            <ul class="account-nav-list">
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <i class="fa-regular fa-credit-card"></i>
                                                        </div>
                                                        <div class="account-nav-item-title">Chờ xác nhận</div>
                                                    </a>
                                                </li>
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <i class="fa-solid fa-box"></i>
                                                        </div>
                                                        <div class="account-nav-item-title">Chờ lấy hàng</div>
                                                    </a>
                                                </li>
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <i class="fa-solid fa-truck-fast"></i>
                                                        </div>
                                                        <div class="account-nav-item-title">Đang giao hàng</div>
                                                    </a>
                                                </li>
                                                <li class="account-nav-item">
                                                    <a href="" class="account-nav-itme-link">
                                                        <div class="account-nav-item-icon">
                                                            <i class="fa-solid fa-ranking-star"></i>
                                                        </div>
                                                        <div class="account-nav-item-title">Đánh giá</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="account-info <?php if (isset($_GET['view']) && $_GET['view'] != 'info') { ?>
                                                                        hidden
                                                             <?php } ?>">
                                        <h2 class="account-title">Thông tin của tôi</h2>
                                        <form class="account-info-form" action="./update-info.php" method="post">
                                            <span class="account-info-title">Thông tin</span>
                                            <label class="account-info-label">
                                                <span class="account-info-text">Họ Tên</span>
                                                <span class="error-name-form">
                                                    <?php 
                                                    if (isset($_SESSION['error_name'])) {
                                                        echo $_SESSION['error_name'];
                                                        unset($_SESSION['error_name']);
                                                    }
                                                    if (isset($_SESSION['empty_value'])) {
                                                        echo $_SESSION['empty_value'];
                                                    }
                                                    ?>
                                                </span>
                                                <input class="account-info-input" type="text" name="name" value="<?php echo $each_user['name'] ?>">
                                            </label>
                                            <label class="account-info-label">
                                                <span class="account-info-text">Ngày sinh</span>
                                                <input class="account-info-input" type="date" name="birthday" value="<?php if (isset($each_user['birthday'])) {
                                                                                                                            echo $each_user['birthday'];
                                                                                                                        } ?>">
                                            </label>
                                            <label class="account-info-label">
                                                <span class="account-info-text">Số điện thoại</span>
                                                <span class="error-name-form">
                                                    <?php 
                                                    if (isset($_SESSION['error_phone_number'])) {
                                                        echo $_SESSION['error_phone_number'];
                                                        unset($_SESSION['error_phone_number']);
                                                    }
                                                    if (isset($_SESSION['empty_value'])) {
                                                        echo $_SESSION['empty_value'];
                                                        unset($_SESSION['empty_value']);
                                                    }
                                                    ?>
                                                </span>
                                                <input class="account-info-input" type="text" name="phone_number" value="<?php echo $each_user['phone_number'] ?>">
                                            </label>
                                            <button class="account-info-btn">Lưu</button>
                                        </form>
                                    </div>

                                    <div class="account-content <?php if (isset($_GET['view']) && $_GET['view'] != 'address') { ?>hidden<?php } ?>">
                                        <h2 class="account-title">Địa chỉ của tôi</h2>
                                        <a href="" class="address-add-new">+ Thêm địa chỉ mới</a>
                                        <div class="address-list">
                                            <div class="address-item">
                                                <div class="address-item-name"><?php echo $each_user['name'] ?></div>
                                                <div class="address-item-address"><?php echo $each_user['address'] ?></div>
                                                <div class="address-action">
                                                    <div class="address-action-left">Địa chỉ mặc định</div>
                                                    <div class="address-action-right">
                                                        <a class="address-action-right-link" href="">Xoá</a>
                                                        <a class="address-action-right-link" href="">Chỉnh sửa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="account-content <?php if (isset($_GET['view']) && $_GET['view'] != 'doluong') { ?>
                                                                        hidden
                                                                <?php } ?>">
                                        <h2 class="account-title">Đo lường của tôi</h2>

                                    </div>

                                    <div class="account-content <?php if (isset($_GET['view']) && $_GET['view'] != 'coupon') { ?>
                                                                        hidden
                                                                <?php } ?>">
                                        <h2 class="account-title">Thẻ giảm giá của tôi</h2>
                                        <div class="account-coupon">
                                            <a href="">Coupon có thể sử dụng</a>
                                            <a href="">Coupon không thể sử dụng</a>
                                        </div>
                                        <div class="coupon-empty">
                                            <p>Không có mã giảm giá</p>
                                        </div>
                                    </div>

                                    <div class="account-content <?php if (isset($_GET['view']) && $_GET['view'] != 'diemthuong') { ?>
                                                                        hidden
                                                                <?php } ?>">
                                        <h2 class="account-title">Điểm thưởng của tôi</h2>
                                        <div class="point-exchange">
                                            <div class="point-exchange__wrap">
                                                <p>0</p>
                                                <a href="" class="btn-rule-point"><i class="fa-solid fa-circle-question"></i></a>
                                            </div>
                                            <a href="" class="btn-paidcoupon">Đổi coupon</a>
                                        </div>
                                        <div class="point-tablist">
                                            <a href="" class="point-tablist-link">Tất cả</a>
                                            <a href="" class="point-tablist-link">Kiếm được</a>
                                            <a href="" class="point-tablist-link">Đã sử dụng</a>
                                        </div>
                                        <div class="point-tablist-content">
                                            <h3>Tính năng này sẽ sớm được cập nhất</h3>
                                        </div>

                                    </div>

                                    <div class="account-content <?php if (isset($_GET['view']) && $_GET['view'] != 'order') { ?>
                                                                        hidden
                                                                <?php } ?>">
                                        <h2 class="account-title">Đơn hàng của tôi</h2>
                                        <div class="order-tablist">
                                            <a href="./index.php?view=order&type=all" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'all') { ?>order-tablist-link-decoration<?php } ?>">Tất cả đơn hàng</a>
                                            <a href="./index.php?view=order&type=processing" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'processing') { ?>order-tablist-link-decoration<?php } ?>">Chờ xử lý</a>
                                            <a href="./index.php?view=order&type=shipping" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'shipping') { ?>order-tablist-link-decoration<?php } ?>">Đang giao</a>
                                            <a href="./index.php?view=order&type=shipped" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'shipped') { ?>order-tablist-link-decoration<?php } ?>">Đã giao</a>
                                            <a href="./index.php?view=order&type=rate-done" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'rate-done') { ?>order-tablist-link-decoration<?php } ?>">Đã đánh giá</a>
                                            <a href="./index.php?view=order&type=rate-not" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'rate-not') { ?>order-tablist-link-decoration<?php } ?>">Chưa đánh giá</a>
                                            <a href="./index.php?view=order&type=cancelled" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'cancelled') { ?>order-tablist-link-decoration<?php } ?>">Đã huỷ</a>
                                            <a href="./index.php?view=order&type=refund" class="order-tablist-link <?php if (isset($_GET['type']) && $_GET['type'] == 'refund') { ?>order-tablist-link-decoration<?php } ?>">Trả lại</a>
                                        </div>
                                        <?php
                                        $sql_order = "select products.name AS product_name, products.image AS product_image, products.price AS product_price, orders.total_price AS total_price, order_product.*
                                                            from 
                                                                products join order_product on order_product.product_id = products.id
                                                                join orders on orders.id = order_product.order_id
                                                            where                                                            
                                                                orders.customer_id = '$id_user'";
                                        ?>
                                        <div class="order-detals ">
                                            <?php //foreach($a as $a) {} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require '../pages/footer.php' ?>
    </div>
</body>

</html>