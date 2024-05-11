<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<script>alert('$success_message')</script>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<script>alert('$error_message')</script>";
    }
?>
 <!-- Main -->
 <main class="checkout">
    <div class="container">
        <!-- Search -->
        <div class="checkout__container">
            <div class="search d-none d-md-flex">
                <input type="text" name="" placeholder="Search for item" id="" class="search__input" />
                <button class="search__btn">
                    <img src="<?php echo BASE_URL ?>/assets/icons/search.svg" alt="" class="search__icon icon" />
                </button>
            </div>
        </div>
        <!-- Breadcrumb -->
        <div class="checkout__container">
            <div class="breadcrumb checkout__breadcrumb">
                <ul class="breadcrumb__list">
                    <li>
                        <a href="<?php echo BASE_URL ?>/index-logined.html" class="breadcrumb__item">
                            Trang chủ
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="#!" class="breadcrumb__item breadcrumb__item--active">
                            Giỏ hàng
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="checkout__container">
            <div class="row gy-xl-3">
                <div class="col-8 col-xl-12">
                    <div class="cart">
                        <div class="cart__list">
                            <!-- Item 1 -->
                            <?php 
                                $sub_totals = 0;
                                $item = 0;
                                foreach($cart as $key => $value) {
                                    $sub_totals += $value['pro_price'] * $value['cart_pro_quantity'];
                                    $item += $value['cart_pro_quantity'];
                            ?>
                            <article class="cart__item">
                                <a href="<?php echo BASE_URL ?>/product-detail.html" class="cart__thumb">
                                    <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $value['pro_image'] ?>" alt="" class="cart__thumb-img" />
                                </a>
                                <div class="cart__info">
                                    <div class="cart__info-left">
                                        <h2 class="cart__info-title">
                                            <a href="<?php echo BASE_URL ?>/product-detail.html">
                                                <?php echo $value['pro_title'] ?>
                                            </a>
                                        </h2>
                                        <p class="cart__price">
                                        <?php echo number_format ($value['pro_price'],0,',','.' ).'đ'?> | <span class="cart__price-stock">In Stock</span>
                                        </p>

                                        <div class="cart__row cart__row-ctrl">
                                            <div class="cart__input">LavAzza</div>

                                            <div class="cart__input">
                                                <button class="cart__quantity minus">
                                                    <img src="<?php echo BASE_URL ?>/assets/icons/minus.svg" alt="" class="icon" />
                                                </button>
                                                <span class="cart__quantity-number"><?php echo $value['cart_pro_quantity'] ?></span>
                                                <input type="hidden" name="quantity" class="cart__quantity-input">
                                                <button class="cart__quantity plus">
                                                    <img src="<?php echo BASE_URL ?>/assets/icons/plus.svg" alt="" class="icon" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart__info-right">
                                        <span class="cart__total"><?php echo number_format ($value['pro_price'],0,',','.' ).'đ'?></span>

                                        <div class="cart__row cart__row-btn">
                                            <button class="cart__btn">
                                                <img src="<?php echo BASE_URL ?>/assets/icons/hearth-2.svg" alt="" />
                                                Thích
                                            </button>

                                            <button class="cart__btn js-toggle" toggle-target="#modal-delete">
                                                <img src="<?php echo BASE_URL ?>/assets/icons/trash.svg" alt="" />
                                                Xoá
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <?php
                                }
                            ?>
                        </div>

                        <div class="cart__bottom d-md-none">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#!" class="cart__bottom-continue-link">
                                        <div class="cart__bottom-continue">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/arrow-down-2.svg"
                                                alt=""
                                                class="cart__bottom-icon icon"
                                            />
                                            <span>Tiếp tục mua sắm </span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-6">
                                    <div class="cart__checkout">
                                        <div class="cart__info-row">
                                            <span>Tổng tiền hàng:</span>
                                            <span><?php echo number_format ($sub_totals,0,',','.' ).'đ'?></span>
                                        </div>

                                        <div class="cart__info-row">
                                            <span>Vận chuyển:</span>
                                            <span>$10.00</span>
                                        </div>

                                        <div class="cart__info-separate"></div>

                                        <div class="cart__info-row cart__info-row--bold">
                                            <span>Tổng thanh toán:</span>
                                            <span><?php echo number_format ($sub_totals,0,',','.' ).'đ'?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-xl-12">
                    <div class="cart">
                        <div class="cart__checkout">
                            <div class="cart__info-row">
                                <span>Tổng thu <span class="cart__info-row-sub">(hàng)</span></span>
                                <span><?php echo $item ?></span>
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
                                <span>Tổng thanh toán</span>
                                <span>$201.65</span>
                            </div>

                            <a href="<?php echo BASE_URL ?>/shipping.html" class="btn btn--primary btn--rounded cart__checkout-btn"
                                >Tiếp tục thanh toán</a
                            >
                        </div>
                    </div>
                    <div class="cart">
                        <a href="#!">
                            <article class="gift">
                                <div class="gift__thumb">
                                    <img src="<?php echo BASE_URL ?>/assets/icons/gift.svg" alt="" class="gift__thumb-img" />
                                </div>
                                <div class="gift__content">
                                    <h4 class="gift__title">Send this order as a gift.</h4>
                                    <p class="gift__desc">
                                        Available items will be shipped to your gift recipient.
                                    </p>
                                </div>
                            </article>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal modal--small hide" id="modal-delete">
    <div class="modal__inner">
        <h4 class="modal__text">The product will be removed from the cart</h4>
        <div class="modal__bottom">
            <button class="btn btn--outline modal__btn js-toggle" toggle-target="#modal-delete">Cancel</button>
            <button class="btn btn--dange modal__btn btn-not-margin">Delete</button>
        </div>
    </div>
    <div class="modal__opacity js-toggle" toggle-target="#modal-delete"></div>
</div>