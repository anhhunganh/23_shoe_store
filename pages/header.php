<?php
require '../admin/root/connect.php';
?>
<div class="header" id="header">
    <div class="header-top col l-12">
        <div class="grid wide">
            <div class="row">
                <div class="l-o-4"></div>
                <div class="col l-4">
                    <a class="header-logo__link" href="../home/">
                        <img class="header-logo__img" src="../assest/img/23sneaker.png" alt="">
                    </a>
                </div>
                <div class="col l-4">
                    <div class="header-wrap">
                        <div class="wrap-item">Search</div>
                        <div class="wrap-item">Acount</div>
                        <div class="wrap-item"><a href="../cart/">Giỏ hàng</a></div>
                        <div class="wrap-item"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom" id="myHeader">
        <div class="grid wide">
            <ul class="header-bottom__list">
                <li class="header-bottom__item"><a href="../collection/index.php?search=Air Jordan" class="header-bottom__item-link">Air Jordan</a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=Nike" class="header-bottom__item-link">Nike</a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=Adidas" class="header-bottom__item-link">Adidas</a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=" class="header-bottom__item-link">MBL</a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=New Balance" class="header-bottom__item-link">New Balance</a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=" class="header-bottom__item-link"></a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=" class="header-bottom__item-link"></a></li>
                <li class="header-bottom__item"><a href="../collection/index.php?search=" class="header-bottom__item-link"></a></li>
            </ul>
        </div>
    </div>
</div>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>