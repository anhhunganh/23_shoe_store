<?php
session_start();
if (empty($_SESSION['customer_id'])) {
    $_SESSION['error_checkout'] = "Bạn cần đăng nhập để tiếp tục thanh toán!";
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
    <title>Document</title>
</head>

<body>
    <?php
    require '../admin/root/connect.php';
    $customer_id = $_SESSION['customer_id'];
    $sql = "select * from customers where id = '$customer_id'";
    $result = mysqli_query($connect, $sql);
    $customer = mysqli_fetch_array($result);

    $cart = $_SESSION['cart'];
    $total_price = 0;
    ?>
    <div class="main">
        <?php require '../pages/header.php'; ?>
        <div class="container">
            <div class="grid wide">
                <div class="row">
                    <form action="./process_checkout.php" method="post">
                        <div class="col l-7">
                            <div class="customer_details">
                                <h2 class="customer_details__heading">Thông tin thanh toán</h2>
                                <label>
                                    <span>Họ tên</span>
                                    <input type="text" class="name_receiver" name="name_receiver" id="" value="<?php echo $customer['name'] ?>">
                                </label><br>
                                <label>
                                    <span>Số điện thoại</span>
                                    <input type="text" class="phone_number_receiver" name="phone_number_receiver" id="" value="<?php echo $customer['phone_number'] ?>">
                                </label><br>
                                <label>
                                    <span>Địa chỉ</span>
                                    <input type="text" name="address_receiver" id="" value="<?php echo $customer['address'] ?>">
                                </label><br>
                                <label>
                                    <span>Ghi chú</span>
                                    <textarea name="note_receiver" id="" cols="30" rows="2"></textarea>
                                </label><br>
                            </div>
                        </div>
                        <div class="col l-5">
                            <div class="order-details">
                                <h2 class="order-details__heading">Đơn hàng của bạn</h2>
                                <div class="order-details__title">Sản phẩm</div>
                                <?php foreach ($cart as $id => $each) { ?>
                                    <div class="order-product__info">
                                        <div class="order-product__name">
                                            <?php echo $each['name'] ?> - Size <?php echo $each['size'] ?>
                                            <strong>x<?php echo $each['quantity'] ?></strong>
                                        </div>
                                        <div class="order-product__price">
                                            <?php
                                            $sum = $each['quantity'] * $each['price'];
                                            $total_price += $sum;
                                            ?>
                                            <?php echo number_format($sum, 0, 0, '.') ?>₫
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="order-details__shipping">
                                    <label for="">
                                        <input type="radio" name="shipping_method" value="local_pickup" id="">
                                        Nhận hàng tại cửa hàng
                                    </label>
                                    <label for="">
                                        <input type="radio" name="shipping_method" value="cod" id="" checked>
                                        Ship tận nơi
                                    </label>
                                </div>
                                <div class="order-details__total">
                                    Tổng tiền
                                    <span><?php echo number_format($total_price, 0, 0, '.') ?>₫</span>
                                </div>
                                <div class="order-details__payment">
                                    <label for="payment_method_bacs">
                                        <input type="radio" name="payment_method" value="bacs" id="payment_method_bacs" checked>
                                        <span>Chuyển khoản ngân hàng</span>
                                        <div class="payment-box">
                                            <p>Thanh toán qua tài khoản ngân hàng. Bạn hãy sử dụng Order ID dể làm nội dung chuyển khoản. Đơn hàng chỉ được thực hiện khi khoản thanh toán đã hoàn tất.</p>
                                        </div>
                                    </label>
                                    <input type="radio" name="payment_method" value="cod" id="payment_method_cod">
                                    <label for="payment_method_cod">
                                        <span>COD</span>
                                        <div class="payment-box">
                                            <p>Thanh toán khi nhận hàng.</p>
                                        </div>
                                    </label>
                                </div>
                                <button class="order-details__btn" onclick="showErrorToast()">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="toast"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // $(document).ready(function () {
        //     $('.order-details__btn').click(function() {
        //         let phone_number_receiver = 1;
        //         console.log(phone_number_receiver);
        //         $.ajax({
        //             type: "post",
        //             url: "./proccess_checkout.php",
        //             data: "data",
        //             dataType: {phone_number_receiver},
        //         });
        //     })
        // });
        function showErrorToast() {
            toast({
                title: "That bai!",
                msg: "<?php echo $_SESSION['error_checkout'] ?>",
                type: "error",
                duration: 3000,
            });
        }


        function toast({
            title = "",
            msg = "",
            type = "",
            duration = ""
        }) {
            const main = document.getElementById('toast');
            if (main) {
                const toast = document.createElement('div');

                // Auto remove toast
                const autoRemoveID = setTimeout(function() {
                    main.removeChild(toast);
                }, duration + 1000)

                // Remove toast when click
                toast.onclick = function(e) {
                    if (e.target.closest('.toast__close')) {
                        main.removeChild(toast);
                        clearTimeout(autoRemoveID);
                    }
                }

                const icons = {
                    success: 'fa-solid fa-circle-check',
                    info: 'fa-solid fa-circle-exclamation',
                    warning: 'fa-solid fa-triangle-exclamation',
                    error: 'fa-solid fa-circle-exclamation'
                };

                const icon = icons[type];
                const delay = (duration / 1000).toFixed(2);
                toast.classList.add('toast', `toast--${type}`);
                toast.style.animation = `slideInLeft ease 0.5s, fadeOut linear 1s ${delay}s forwards`;
                toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>
            <div class="toast__body">
                <h3 class="toast__title">
                    ${title}
                </h3>
                <div class="toast__desc">${msg}</div>
            </div>
            <div class="toast__close">
                <i class="fa-solid fa-xmark"></i>
            </div> `;
                main.appendChild(toast);
            }

        }
    </script>
</body>

</html>