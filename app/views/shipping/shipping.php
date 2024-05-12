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
                        <a href="<?php echo BASE_URL ?>" class="breadcrumb__item">
                            Trang chủ
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL ?>/cart_user" class="breadcrumb__item">
                            Giỏ hàng
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL ?>/shipping_user" class="breadcrumb__item breadcrumb__item--active">
                            Vận chuyển
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- checkout cart info -->
        <div class="checkout__container">
            <div class="row gy-xl-3">
                <div class="col-8 col-xl-12">
                    <div class="cart">
                        <!-- cart info user address -->
                        <h1 class="cart__heading">1. Thời gian vận chuyển từ 2 đến 5 ngày</h1>
                        <div class="cart__info-separate"></div>

                        <!-- user Address -->
                        <div class="user-address">
                            <div class="user-address__top">
                                <div class="user-address__info">
                                    <h4 class="user-address__title">Địa chỉ giao hàng</h4>
                                    <p class="user-address__desc">Chúng tôi nên giao hàng cho bạn ở đâu?</p>
                                </div>

                                <button
                                    class="btn btn--primary btn--rounded js-toggle"
                                    toggle-target="#modal-add-address"
                                >
                                    <img src="<?php echo BASE_URL ?>/assets/icons/plus.svg" alt="" />
                                    Thêm địa chỉ mới
                                </button>
                            </div>

                            <div class="user-address__bottom">
                                <div class="address">
                                    <div class="address__list">
                                        <p class="address__not-item d-none">
                                            Chưa có địa chỉ.
                                            <a
                                                href="#!"
                                                class="address__not-item-link js-toggle"
                                                toggle-target="#modal-add-address"
                                                >Click vào đây để thêm địa chỉ</a
                                            >
                                        </p>

                                        <div class="cart__info-separate"></div>
                                        <!-- address 1 -->
                                        <article class="address__item">
                                            <div class="address__item-left checked-input">
                                                <!-- Custom input checkbox -->
                                                <div class="address__item-input">
                                                    <label class="cart__select checked__item">
                                                        <input
                                                            type="radio"
                                                            name="checkaddress"
                                                            class="cart__select-checkbox"
                                                            checked
                                                        />
                                                    </label>
                                                </div>
                                                <!-- address item info -->
                                                <div class="address__item-info">
                                                    <h4 class="address__item-title">Imran Khan</h4>
                                                    <p class="address__item-desc">
                                                        Museum of Rajas, Sylhet Sadar, Sylhet 3100.
                                                    </p>

                                                    <ul class="address__item-list">
                                                        <li>Vận chuyển</li>
                                                        <li>Giao hàng từ cửa hàng</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="address__item-right">
                                                <div class="cart__edit-wrap">
                                                    <button
                                                        class="cart__edit js-toggle"
                                                        toggle-target="#modal-add-address"
                                                    >
                                                        <img
                                                            src="<?php echo BASE_URL ?>/assets/icons/edit.svg"
                                                            alt=""
                                                            class="icon"
                                                        />
                                                        Sữa
                                                    </button>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="cart__shipping-title">Chi tiết đơn hàng</h4>

                        <!-- Cart list info -->
                        <div class="cart__list">
                            <!-- Item 1 -->
                            <?php 
                                $sub_totals = 0;
                                $item = 0;
                                foreach($cart as $key => $value) {
                                    $sub_totals += $value['cart_pro_price'] * $value['cart_pro_quantity'];
                                    $item += $value['cart_pro_quantity'];
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
                                        <?php echo number_format ($value['cart_pro_price'],0,',','.' ).'đ'?> | <span class="cart__price-stock">In Stock</span>
                                        </p>

                                        <div class="cart__row cart__row-ctrl">
                                            <div class="cart__input"><?php echo $value['cart_brand_name'] ?></div>
                                            <form method="post" action="<?php echo BASE_URL ?>/cart_user/update_cart/<?php echo $value['cart_id'] ?>">
                                                <div class="cart__input">
                                                    <button class="cart__quantity minus">
                                                        <img src="<?php echo BASE_URL ?>/assets/icons/minus.svg" alt="" class="icon" />
                                                    </button>
                                                    <span class="cart__quantity-number"><?php echo $value['cart_pro_quantity'] ?></span>
                                                    <input type="hidden" name="cart_pro_quantity" class="cart__quantity-input" value="<?php echo $value['cart_pro_quantity'] ?>">
                                                    <button class="cart__quantity plus">
                                                        <img src="<?php echo BASE_URL ?>/assets/icons/plus.svg" alt="" class="icon" />
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="cart__info-right">
                                        <span class="cart__total"><?php echo number_format ($value['cart_pro_price'],0,',','.' ).'đ'?></span>

                                        <div class="cart__row cart__row-btn">
                                            <a href="<?php echo BASE_URL ?>/cart_user/delete_cart/<?php echo $value['cart_id'] ?>" class="cart__btn">
                                                <img src="<?php echo BASE_URL ?>/assets/icons/trash.svg" alt="" />
                                                Xoá
                                            </a>
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
                                <div class="col-9 col-lg-7">
                                    <a href="<?php echo BASE_URL ?>#product" class="cart__bottom-continue-link">
                                        <div class="cart__bottom-continue">
                                            <img
                                                src="<?php echo BASE_URL ?>/assets/icons/arrow-down-2.svg"
                                                alt=""
                                                class="cart__bottom-icon icon"
                                            />
                                            <span>Tiếp tục mua hàng</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-3 col-lg-5"></div>
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
                                <span>Estimated Total</span>
                                <span>$201.65</span>
                            </div>

                            <a href="#!" class="btn btn--outline btn--rounded cart__checkout-btn">
                                Payment now
                            </a>
                            <a href="<?php echo BASE_URL ?>/payment.html" class="btn btn--primary btn--rounded cart__checkout-btn btn-not-margin"
                                >Continue with online payment</a
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

<!-- Modal: Add new shipping address -->
<div class="modal hide" id="modal-add-address" style="--modal-width: 650px">
    <div class="modal__inner">
        <form action="" class="form" id="form-address">
            <div class="modal__body">
                <h2 class="modal__heading">Thêm địa chỉ giao hàng mới</h2>
                <div class="form__row">
                    <!-- Name -->
                    <div class="form__group">
                        <label for="name" class="form__label form__label--small">Tên</label>
                        <div class="form__text-input form__text-input--small">
                            <input
                                type="text"
                                id="name"
                                name="name"
                                rules="required"
                                placeholder="Tên"
                                class="form__input"
                                required
                            />
                            <img src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg" alt="" class="form__input-icon form__icon" />
                        </div>
                        <span class="form__message"></span>
                    </div>
                    <!-- Phone -->
                    <div class="form__group">
                        <label for="phone" class="form__label form__label--small">Số điện thoại</label>
                        <div class="form__text-input form__text-input--small">
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                rules="required|min:10|phone"
                                placeholder="Số điện thoại"
                                class="form__input"
                                required
                            />
                            <img src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg" alt="" class="form__input-icon form__icon" />
                        </div>
                        <span class="form__message"></span>
                    </div>
                </div>

                <!-- Address -->
                <div class="form__group">
                    <label for="address" class="form__label form__label--small">Địa chỉ cụ thể</label>

                    <div class="form__text-area">
                        <textarea
                            id="address"
                            name="address"
                            rules="required"
                            placeholder="Mô tả địa chỉ giao hàng"
                            class="form__textarea"
                            required
                        ></textarea>
                        <img src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg" alt="" class="form__input-icon form__icon" />
                    </div>
                    <span class="form__message"></span>
                </div>
                <!-- Select address -->
                <div class="form__group">
                    <label for="select-address" class="form__label form__label--small"
                        >Chọn địa chỉ của bạn</label
                    >
                    <div class="form__select-dialog show">
                        <div class="form__row form__options">
                            <div class="form__select-wrap">
                                <div class="form__select">
                                    <select name="acc_tp" id="acc_city" class="form__select-select">
                                        <option value="">Chọn Tỉnh/TP</option>
                                        <?php 
                                            foreach($city as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value['matp'] ?>"><?php echo $value['name'] ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form__select">
                                    <select name="acc_qh" id="acc_qh" class="form__select-select">
                                        <option value="">Chọn Quận/Huyện</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                                <div class="form__select">
                                    <select name="acc_px" id="acc_px" class="form__select-select">
                                        <option value="">Chọn Phường/Xã</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="form__message"></span>
                </div>
                <!-- Default address  -->
                <div class="form__group">
                    <label class="form__checkbox">
                        <input type="checkbox" name="" id="" class="form__checkbox-input d-none" required />
                        <span class="form__checkbox-label">Đặt làm địa chỉ mặc định</span>
                    </label>
                </div>
            </div>
            <div class="modal__bottom">
                <button class="btn btn--text modal__btn js-toggle" toggle-target="#modal-add-address">
                    Huỷ
                </button>
                <button class="btn btn--primary btn--small modal__btn btn-not-margin form__submit-btn">
                    Tạo
                </button>
            </div>
        </form>
    </div>
    <div class="modal__opacity"></div>
</div>


<script src="<?php echo BASE_URL ?>/assets/js/validation.js"></script>

<script>
    Validator("#form-address", {
        onSubmit: (data) => {
            console.log(data);
        },
    });
    // Mong muốn khi sữ dụng thư viện này
    // chỉ cần chuyền form mà mình muốn validator thôi không cần gọi gì hêt
    // và truyền thuộc tính rules cần thiết vào thẻ input
    // vi du
    // <input name="fullname" rules="required"></input>;
</script>