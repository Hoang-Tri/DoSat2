<!-- lấy thông tin user  -->
<?php 
    $acc_name = $user['acc_name'];
    $acc_email = $user['acc_email'];
    $acc_id = $user['acc_id'];
    $acc_phone = isset($user['acc_phone']) ? $user['acc_phone'] : 'Chưa đăng kí';
    $acc_img = isset($user['acc_img']) ? $user['acc_img'] : '';
?>

                <!-- Right -->
                <div class="col-9 col-xl-8 col-lg-12">
                    <div class="cart">
                        <div class="row gy-3">
                            <div class="col-12">
                                <a href="<?php echo BASE_URL ?>/profile_user" class="form-card__top">
                                    <img src="<?php echo BASE_URL ?>/assets/icons/arrow-left.svg" alt="" class="icon" />
                                    <h2 class="cart__heading cart__sub-heading-lv2">Hoàn tất thông tin cá nhân</h2>
                                </a>

                                <form method="post" action="<?php echo BASE_URL ?>/profile_user/update_profile/<?php echo $acc_id?>" id="form-card" class="form form-card" enctype="multipart/form-data">
                                    <!-- form row 1  -->
                                    <div class="form__row form-card__row">
                                        <div class="form__group">
                                            <label for="full-name" class="form__label form-card__label"
                                                >Họ và tên</label
                                            >
                                            <div class="form__text-input">
                                                <input
                                                    type="text"
                                                    id="full-name"
                                                    name="acc_name"
                                                    rules="required"
                                                    placeholder="Họ và tên"
                                                    value= "<?php echo $acc_name?> "
                                                    class="form__input"
                                                    required
                                                />
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>

                                        <div class="form__group">
                                            <label for="email" class="form__label form-card__label"
                                                >Địa chi</label
                                            >
                                            <div class="form__text-input">
                                                <input
                                                    type="email"
                                                    id="email"
                                                    name="acc_email"
                                                    rules="required|email"
                                                    value= <?php echo $acc_email ?> 
                                                    placeholder="Email"
                                                    class="form__input"
                                                    required
                                                />
                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>
                                    </div>

                                    <!-- form row 2  -->
                                    <div class="form__row form-card__row">
                                        <div class="form__group">
                                            <label for="phone-number" class="form__label form-card__label"
                                                >Số điện thoại</label
                                            >
                                            <div class="form__text-input">
                                            <input
                                                type="tel"
                                                id="phone-number"
                                                name="acc_phone"
                                                rules="required|phone"
                                                value="<?php echo $acc_phone ?>"
                                                placeholder="Số điện thoại"
                                                class="form__input"
                                                required
                                            />


                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>

                                        <div class="form__group">
                                            <label for="phone-number" class="form__label form-card__label"
                                                >Ảnh đại diện</label
                                            >
                                            <div class="form__text-input">
                                            <input
                                                type="file"
                                                id="phone-number"
                                                name="acc_img"
                                                rules="required"
                                                value="<?php echo $acc_phone ?>"
                                                placeholder="Số điện thoại"
                                                class="form__input"
                                                required
                                            />


                                                <img
                                                    src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg"
                                                    alt=""
                                                    class="form__input-icon form__icon"
                                                />
                                            </div>
                                            <span class="form__message"></span>
                                        </div>
                                    </div>

                                    <div class="form-card__bottom">
                                        <a href="<?php echo BASE_URL ?>/profile_user" class="btn btn--text form-card__btn">Huỷ</a>
                                        <button
                                            class="btn btn--primary btn--rounded form__submit-btn form-card__btn"
                                        >
                                            Cập nhật
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- form__edit-profile -->

<!-- thư viện validation mình viết -->
<script src="<?php echo BASE_URL ?>/assets/js/validation.js"></script>

<script>
    // Gọi hàm Validator trên form
    Validator("#form-card", {
        onSubmit: (data) => {
            console.log("Form data:", data);
            // Thực hiện các hành động khác sau khi xác thực thành công
        },
    });
</script>