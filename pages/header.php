<?php 
    require '../admin/root/connect.php';
    $sql = "select * from style";
    $result = mysqli_query($connect, $sql);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="header">
    <div class="site-header">
        <div class="logo-header">
            <a href="../home/index.php"><img class="img-logo" src="https://file.hstatic.net/200000033444/file/thewolf_logo-02_2dc5965c18574fc385769c4781e90d28.png" alt=""></a>
        </div>
        <div class="header-wrap-icon">
            <span class="icon-account">
                <a href="../account/index.php"><i class="fa-solid fa-user"></i></a>
            </span>
            <span class="icon-search">
                <a href="./account.php"><i class="fa-solid fa-magnifying-glass"></i></a>
            </span>
            <span class="icon-cart">
                <a href="../cart/index.php"><i class="fa-solid fa-bag-shopping"></i></a>
            </span>
        </div>
    </div>
    <div class="header-navbar">
        <ul class="navbar-list">
            <li class="navbar-item">
                <a href="../collection/index.php?type=for-men">
                    Giày nam
                    <i class="fa-solid fa-chevron-down"></i>
                </a>

                <ul class="subnav">
                    <?php foreach($result as $each) { ?>
                    <li class="subnav-item">
                        <a href="../collection/index.php?type=for-men&style_id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="navbar-item">
                <a href="../collection/index.php?type=for-women">Giày nữ 
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                <ul class="subnav">
                    <li class="subnav-item"><a href="">CHELSEA BOOT</a></li>
                    <li class="subnav-item"><a href="">DERBY</a></li>
                    <li class="subnav-item"><a href="">LOAFER</a></li>
                    <li class="subnav-item"><a href="">SLIPPER</a></li>
                    <li class="subnav-item"><a href="">COMBAT BOOT</a></li>
                    <li class="subnav-item"><a href="">SLIDE SANDAL</a></li>
                </ul>
            </li>
            <li class="navbar-item"><a href="">THE MARS WOLF COLLECTION</a></li>
            <li class="navbar-item">
                <a href="../collection/index.php?type=accessories">Phụ kiện 
                    <i class="fa-solid fa-chevron-down"></i>
                </a>
                
                <ul class="subnav">
                    <li class="subnav-item"><a href="">BELT</a></li>
                    <li class="subnav-item"><a href="">SOCK</a></li>
                    <li class="subnav-item"><a href="">CHAIN</a></li>
                    <li class="subnav-item"><a href="">MASK</a></li>
                    <li class="subnav-item"><a href="">CART HOLDER</a></li>
                    <li class="subnav-item"><a href="">SPRAYER</a></li>
                </ul>
            </li>
            <li class="navbar-item">
                <a href="../collection/index.php?type=tote-bag">ToTeBag <i class="fa-solid fa-chevron-down"></i></a>
                <ul class="subnav">
                    <li class="subnav-item"><a href="">THE AMANO COLLECTION</a></li>
                    <li class="subnav-item"><a href="">THE S-WOLF COLLECTION</a></li>
                </ul>
            </li>
            <li class="navbar-item"><a href="">Jacket</a></li>
            <li class="navbar-item"><a href="">Shoe for decor</a></li>
            <li class="navbar-item">
                <a href="">Lối sống đẹp <i class="fa-solid fa-chevron-down"></i></a>

                <ul class="subnav">
                    <li class="subnav-item"><a href="">THE COLLECTIONS - CAMPAIGN</a></li>
                    <li class="subnav-item"><a href="">BEAUTIFUL LIFESTYLE</a></li>
                    <li class="subnav-item"><a href="">CÁC TIPS VỀ THỜI TRANG</a></li>
                    <li class="subnav-item"><a href="">WE ARE WOLFER</a></li>
                </ul>
            </li>
            <li class="navbar-item"><a href="">Liên hệ</a></li>
        </ul>
    </div>
</div>