<div class="navbar">
    <div class="navbar-header">
        <div class="navbar-header__logo">
            <a href="../root/index.php">23 Sneaker.</a>
        </div>
        <div class="navbar-header__text">
            <?php if (isset($_SESSION['admin_level'])) { ?>
                <a href="../account/index.php"><?php echo $_SESSION['admin_name']; ?></a>
            <?php } ?>
        </div>
    </div>
    <ul class="navbar__list">
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="fa-solid fa-chart-simple navbar__item-icon"></i>
                <a class="navbar__item-link" href="../root/">Thống kê</a>
            </div>
        </li>
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="navbar__item-icon fa-solid fa-truck"></i>
                <a class="navbar__item-link" href="../orders/">Orders</a>
            </div>
        </li>
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="fa-solid fa-shop navbar__item-icon"></i>
                <a class="navbar__item-link" href="../manufacturers/">Hãng sản xuất</a>
            </div>
            <!-- <ul class="sublist">
                <li><a href="../manufacturers/form_insert.php">Thêm hãng sản xuất</a></li>
            </ul> -->
        </li>
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="navbar__item-icon fa-solid fa-shapes"></i>
                <a class="navbar__item-link" href="../categories/">Danh mục sản phẩm</a>
            </div>
            <!-- <ul class="sublist">
                <li><a href="../categories/form_insert.php">Thêm Danh mục sản phẩm</a></li>
            </ul> -->
        </li>
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="navbar__item-icon fa-solid fa-shapes"></i>
                <a class="navbar__item-link" href="../sub_categories/">Thể loại sản phẩm</a>
            </div>
            <!-- <ul class="sublist">
                <li><a href="../sub_categories/form_insert.php">Thêm Thể loại sản phẩm</a></li>
            </ul> -->
        </li>
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="navbar__item-icon fa-solid fa-box"></i>
                <a class="navbar__item-link" href="../products/">Sản phẩm</a>
            </div>
        </li>
        <?php
            if(isset($_SESSION['admin_level']) && $_SESSION['admin_level'] == 1) { ?> 
        <li class="navbar__item">
            <div class="navbar__item-wrap">
                <i class="navbar__item-icon fa-solid fa-user"></i>
                <a class="navbar__item-link" href="../customer/">Khách hàng</a>
            </div>
        </li>    
        <?php } ?>
    </ul>
</div>