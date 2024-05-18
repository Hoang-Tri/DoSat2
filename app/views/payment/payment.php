<main class="checkout">
    <div class="container">
        <!-- Search -->
        <div class="checkout__container">
            <div class="search d-none d-md-flex">
                <input type="text" name="" placeholder="Search for item" id="" class="search__input" />
                <button class="search__btn">
                    <img src="<?php echo BASE_URL?>/assets/icons/search.svg" alt="" class="search__icon icon" />
                </button>
            </div>
        </div>
        <!-- Breadcrumb -->
        <div class="checkout__container">
            <div class="breadcrumb checkout__breadcrumb">
                <ul class="breadcrumb__list">
                    <li>
                        <a href="<?php echo BASE_URL?>" class="breadcrumb__item">
                            Trang chủ
                            <img src="<?php echo BASE_URL?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL?>/cart_user" class="breadcrumb__item">
                            Giỏ hàng
                            <img src="<?php echo BASE_URL?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL?>/shipping_user" class="breadcrumb__item">
                            Vận chuyển
                            <img src="<?php echo BASE_URL?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="#!" class="breadcrumb__item breadcrumb__item--active">
                            Thanh toán
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- cart info address user -->
        <div class="checkout__container">
            <div class="row gy-xl-3">
                <div class="col-8 col-lg-12">
                    <div class="cart">
                        <!-- cart info user address -->
                        <div class="cart__row payment__top-row">
                            <h2 class="cart__sub-heading">
                                1. Thời gian vận chuyển từ 2 đến 5 ngày
                            </h2>

                            <div class="cart__edit-wrap">
                                <a href="<?php echo BASE_URL?>/shipping_user" class="cart__edit">
                                    <img src="<?php echo BASE_URL?>/assets/icons/edit.svg" alt="" class="icon" />
                                    Sữa
                                </a>
                            </div>
                        </div>

                        <!-- payment item 1 -->
                        <?php 
                            if($customer) {
                                foreach($customer as $key => $value) {
                                $cus_id = $value['cus_id'];
                        ?>
                        <article class="payment__item">
                            <div class="payment__item-info">
                                <h3 class="payment__heading"><?php echo $value['cus_name'] ?></h3>
                                <p class="payment__desc"><?php echo $value['cus_wards'].", ".$value['cus_district'].", ".$value['cus_province'] ?></p>
                            </div>
                            <img src="<?php echo BASE_URL?>/assets/icons/icon-checkbox.svg" alt="" />
                        </article>
                        <?php 
                                }
                            }
                        ?>

                        <!-- payment item 2 -->
                        <?php 
                            if($cart) {
                               $item = count($cart);
                        ?>  
                            <article class="payment__item">
                                <div class="payment__item-info">
                                    <h3 class="payment__heading">Chi tiết mặt hàng</h3>
                                    <p class="payment__desc"><?php echo $item ?> mặt hàng</p>
                                </div>
                                <button type="button" class="payment__desc payment__desc-link js-toggle" toggle-target="#details">Xem Chi tiết</button>
                            </article>
                        <?php 
                            }
                        ?>
                        
                        <h4 class="cart__shipping-title">Chi tiết đơn hàng</h4>

                        <!-- Cart list info -->
                        <div class="cart__list hide" id="details">
                            <!-- Item 1 -->
                            <?php 
                                $sub_totals = 0;
                                $item = 0;
                                foreach($cart as $key => $value) {
                                    $sub_totals += $value['cart_pro_price'] * $value['cart_pro_quantity'];
                                    $item += $value['cart_pro_quantity'];
                                    $acc_id = $value['acc_id'];
                            ?>
                            <article class="cart__item">
                                <a href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $value['pro_id']?>" class="cart__thumb">
                                    <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $value['cart_pro_img'] ?>" alt="" class="cart__thumb-img" />
                                </a>
                                <div class="cart__info">
                                    <div class="cart__info-left">
                                        <h2 class="cart__info-title">
                                            <a href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $value['pro_id']?>">
                                                <?php echo $value['cart_pro_title'] ?>
                                            </a>
                                        </h2>
                                        <p class="cart__price">
                                        <?php echo number_format ($value['cart_pro_price'],0,',','.' ).'đ'?> | <span class="cart__price-stock">Size <?php echo $value['cart_pro_size'] ? $value['cart_pro_size'] : 'X' ?></span>
                                        </p>

                                        <div class="cart__row cart__row-ctrl">
                                            <div class="cart__input"><?php echo $value['cart_brand_name'] ?></div>
                                            <span class="cart__quantity-number">Số lượng:<?php echo ' '. $value['cart_pro_quantity'] ?></span>
                                            <!-- <input type="hidden" name="cart_pro_quantity" class="cart__quantity-input" value="<?php echo $value['cart_pro_quantity'] ?>">  -->
                                        </div>
                                    </div>
                                    <div class="cart__info-right">
                                        <span class="cart__total"><?php echo number_format ($value['cart_pro_price'],0,',','.' ).'đ'?></span>
                                    </div>
                                </div>
                            </article>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-lg-12">
                    <div class="cart">
                        <div class="cart__checkout">
                            <h2 class="cart__sub-heading">Chi tiết thanh toán</h2>
                            <p class="cart__desc">
                                Hoàn thành mục mua hàng của bạn bằng cách cung cấp đơn đặt hàng chi tiết thanh toán của bạn.
                            </p>

                            <div class="cart__info-separate"></div>


                            <div class="cart__info-row">
                                    <span>Tổng sản phẩm <span class="cart__info-row-sub">(hàng)</span></span>
                                    <span><?php echo $item ?></span>
                                    <!-- <input type="hidden" name="cart_total_quantity" class="cart__total-quantity-input" value="<?php echo $item ?>">  -->
                                </div>

                                <div class="cart__info-row">
                                    <span>Giá <span class="cart__info-row-sub">(tổng)</span></span>
                                    <span><?php echo number_format ($sub_totals,0,',','.' ).'đ'?></span>
                                </div>

                                <div class="cart__info-row">
                                    <span>Vận chuyển</span>
                                    <span>$10.00</span>
                                </div>

                                <div class="cart__info-separate"></div>

                                <div class="cart__info-row">
                                    <span>Estimated Total</span>
                                    <span>$201.65</span>
                                </div>
                            <form action="<?php echo BASE_URL ?>/order_user" method="post" class="form_order">
                                <input type="hidden" name="cus_id" value="<?php echo $cus_id ?>">
                                <a href="#!" class="btn btn--outline btn--rounded payment__btn btn-not-margin">Thanh toán bằng ví VNPay</a>
                                <a href="#!" class="btn btn--outline btn--rounded payment__btn btn-not-margin">Thanh toán bằng MOMO</a>
                                <button class="btn btn--primary btn--rounded payment__btn btn-not-margin">Đặt hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>