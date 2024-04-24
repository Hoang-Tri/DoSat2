<aside id="sidebar" class="js-sidebar collapsed">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="<?php echo BASE_URL ?>/login/dashboard" class="logo-admin">
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
                <a href="./" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Trang chủ
                </a>
            </li>

            <!-- Trang thông tin website -->
            <li class="sidebar-item">
                <a href="<?php echo BASE_URL ?>/login/dashboard" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Thông tin website
                </a>
            </li>

            <!-- Trang bài viết -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                    Bài viết
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <!-- Trang sản phẩm -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                    Sản phẩm
                </a>
                <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/product" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
            </li>

            <!-- Trang đơn hàng  -->
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-cart-plus pe-2"></i>
                    Đơn hàng
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Thêm</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo BASE_URL ?>/order" class="sidebar-link">Liệt kê</a>
                    </li>
                </ul>
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