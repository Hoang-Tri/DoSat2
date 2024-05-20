<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="./" class="logo-admin">
                <img src="<?php echo BASE_URL ?>/assets/icons/logo.svg" alt="grocerymart" class="logo__img top-bar__img" />
                <h1 class="logo-admin__title">cafegrocery</h1>
            </a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Admin Elements
            </li>

            <!-- Trang chủ -->
            <li class="sidebar-item">
                <a href="<?php echo BASE_URL ?>/admin_login/dashboard" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Trang chủ
                </a>
            </li>

            <!-- Trang thông tin website -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                <i class="fa-solid fa-info pe-2"></i>
                    Thông tin website
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#cate_post" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-file-pen pe-2"></i>
                    Danh mục bài viết
                </a>
                <ul id="cate_post" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/post" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/post/list_cate_post" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <!-- Trang bài viết -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#post" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-regular fa-pen-to-square pe-2"></i>
                    Bài viết
                </a>
                <ul id="post" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/post/add_post" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/post/list_post" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <!-- Trang danh mục sản phẩm -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#brand" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-rss pe-2"></i>
                    Thương hiệu
                </a>
                <ul id="brand" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/brand" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/brand/list_brand" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <!-- Trang sản phẩm -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#product" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                    Sản phẩm
                </a>
                <ul id="product" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/product/add_product" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/product/list_product" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <!-- Trang đơn hàng  -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#order" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-cart-plus pe-2"></i>
                    Đơn hàng
                </a>
                <ul id="order" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/order" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#fee" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <i class="fa-solid fa-truck-fast pe-2"></i>
                    Phí vận chuyển
                </a>
                <ul id="fee" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/fee/add_fee" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/fee/list_fee" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#coupon" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <i class="fa-solid fa-money-bill pe-2"></i>
                    Mã giảm giá
                </a>
                <ul id="coupon" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/coupon/add_coupon" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/coupon/list_coupon" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="<?php echo BASE_URL ?>/admin_login/logout" class="sidebar-link">
                <i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>
                    Đăng Xuất
                </a>
            </li>

            
            <!-- <li class="sidebar-header">
                Multi Level Menu
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-share-nodes pe-2"></i>
                    Multi Dropdown
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#level-1"
                            data-bs-toggle="collapse" aria-expanded="false">Level 1</a>
                        <ul id="level-1" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Level 1.1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Level 1.2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</aside>
<!-- navbar -->
<div class="main">
    <nav class="navbar navbar-expand px-3 border-bottom">
        <button class="btn" id="sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <main class="content px-3 py-2">
        <div class="container-fluid">