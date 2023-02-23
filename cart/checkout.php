<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div>
            <div>
                <form action="./process_checkout.php" method="post">
                    <label>
                        <span>Họ tên</span>
                        <input type="text" name="name_receiver" id="">
                    </label><br>
                    <label>
                        <span>Số điện thoại</span>
                        <input type="text" name="phone_number_receiver" id="">
                    </label><br>
                    <label>
                        <span>Địa chỉ</span>
                        <input type="text" name="address_receiver" id="">
                    </label><br>
                    <label>
                        <span>Ghi chú</span>
                        <textarea name="note_receiver" id="" cols="30" rows="2"></textarea>
                    </label><br>
                    <label>
                        <div>Phương thức vận chuyển</div>
                        <input type="radio" name="shipping_rate" id="" checked>
                        <span>Giao hàng tận nơi</span>
                        <span>40,000</span>
                    </label><br>
                    <div>
                        Phương thức thanh toán
                        <label>
                            <input type="radio" name="payment_method" id="" value="cod" checked>
                            <span>Thanh toán khi nhận hàng (COD)</span>
                        </label>
                        <label>
                            <input type="radio" name="payment_method" value="transfer " id="">
                            <span>Chuyển khoản qua ngân hàng</span>
                        </label>
                    </div><br>
                    <button>Hoàn tất đơn hàng</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>