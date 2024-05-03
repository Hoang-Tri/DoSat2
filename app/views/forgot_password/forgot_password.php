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
    <div class="auth__intro d-md-none">
        <img src="<?php echo BASE_URL ?>/assets/img/auth/forgot-password.png" alt="" class="auth__intro-img" />
    </div>

    <!-- Auth Content -->
    <div id="auth-content" class="auth__content show">
        <div class="auth__content-inner">
            <a href="<?php echo BASE_URL ?>/" class="logo auth__logo">
                <img src="<?php echo BASE_URL ?>/assets/icons/logo.svg" alt="grocerymart" class="logo__img" />
                <h2 class="logo__title">cafegrocery</h2>
            </a>
            <h1 class="auth__heading">Quên mật khẩu</h1>
            <p class="auth__desc">
            Nhập địa chỉ email được liên kết với tài khoản của bạn và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn
            </p>

            <div class="auth__message message">We will send it to your email</div>

            <form id="form" action="<?php echo BASE_URL ?>/account_user/send_mail" method="post" class="form auth__form auth__form-forgot-password">
                <!-- Email -->
                <div class="form__group">
                    <div class="form__text-input">
                        <input
                            type="email"
                            id="email"
                            name="acc_email"
                            rules="required|email"
                            placeholder="Email"
                            class="form__input auth__form-input"
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
                </div>

                <div class="form__group auth__btn-group">
                    <button class="btn btn--primary auth__btn form__submit-btn">
                        Gửi
                    </button>
                </div>
            </form>

            <p class="auth__text">
                Bạn đã có tài khoản <a href="<?php echo BASE_URL ?>/account_user/sign_in" class="auth__link auth__text-link">đăng nhập</a> ngay!
            </p>
        </div>
    </div>
</main>
<script>
    window.dispatchEvent(new Event("template-loaded"));
</script>

<!-- thư viện validation mình viết -->
<script src="<?php echo BASE_URL ?>/assets/js/validation.js"></script>

<script>
    Validator("#form", {
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
    </body>
</html>