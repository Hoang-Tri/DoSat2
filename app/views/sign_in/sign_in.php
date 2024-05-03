<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<script>alert('$success_message')</script>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<script>alert('$error_message')</script>";
    }
?>

<main class="auth">
    <!-- Auth intro -->
    <div class="auth__intro">
        <a href="./" class="logo auth__intro-sign-up d-none d-md-flex">
            <img src="<?php echo BASE_URL ?>/assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
            <h2 class="logo__title">cafegrocery</h2>
        </a>
        <img src="<?php echo BASE_URL ?>/assets/img/auth/auth-intro.svg" alt="" class="auth__intro-img" />
        <p class="auth__intro-text">
            The best of luxury brand values, high quality products, and innovative services
        </p>

        <button class="auth__intro-next d-none d-md-block js-toggle" toggle-target="#auth-content">
            <img src="<?php echo BASE_URL ?>/assets/img/auth/auth-arrow.svg" alt="" />
        </button>
    </div>

    <!-- Auth Content -->
    <div id="auth-content" class="auth__content hide">
        <div class="auth__content-inner">
            <a href="<?php echo BASE_URL ?>/" class="logo auth__logo">
                <img src="<?php echo BASE_URL ?>/assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                <h2 class="logo__title">cafegrocery</h2>
            </a>
            <h1 class="auth__heading">Chào mừng bạn quay lại</h1>
            <p class="auth__desc">
                Chào mừng bạn quay lại đăng nhập. Với tư cách là khách hàng cũ,
                bạn có quyền truy cập vào tất cả thông tin đã lưu trước đó của mình.
            </p>

            <form method="post" id="form" action="<?php echo BASE_URL ?>/account_user/authentication_sign_in" class="form auth__form">
                <!-- Email -->
                <div class="form__group">
                    <div class="form__text-input">
                        <input
                            type="email"
                            id="email"
                            name="acc_email"
                            rules="required|email"
                            placeholder="Email"
                            class="form__input"
                        />
                        <img src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg" alt="" class="form__input-icon form__icon" />
                    </div>
                    <span class="form__message"></span>
                </div>

                <!-- Password -->
                <div class="form__group">
                    <div class="form__text-input">
                        <input
                            type="password"
                            id="password"
                            name="acc_password"
                            rules="required|min:6"
                            placeholder="Password"
                            class="form__input"
                            required
                        />
                        <img src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg" alt="" class="form__input-icon form__icon" />
                    </div>
                    <span class="form__message"></span>
                </div>

                <div class="form__group form__group-inline">
                    <label class="form__checkbox">
                        <input type="checkbox" name="" id="" class="form__checkbox-input d-none" required />
                        <span class="form__checkbox-label">Đặt làm mặc định</span>
                    </label>

                    <a href="<?php echo BASE_URL ?>/account_user/forgot_password" class="auth__link form__pull--right">Quên mật khẩu</a>
                </div>

                <div class="form__group auth__btn-group">
                    <button class="btn btn--primary auth__btn form__submit-btn">Đăng nhập</button>
                </div>
            </form>

            <p class="auth__text">
                Bạn chưa có tài khoản?
                <a href="<?php echo BASE_URL ?>/account_user/sign_up" class="auth__link auth__text-link">Đăng kí</a>
            </p>
        </div>
    </div>
</main>
<!-- thư viện validation mình viết -->
<script src="<?php echo BASE_URL ?>/assets/js/validation.js"></script>

<script>
    Validator("#form", {
        onSubmit: (data) => {
            console.log(data);
        },
    });
</script>
</body>
</html>