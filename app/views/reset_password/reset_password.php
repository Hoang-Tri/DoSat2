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
            <h1 class="auth__heading">Password Reset</h1>
            <p class="auth__desc">
                Enter the email address associated with your account and we'll send you a link to reset your
                password
            </p>

            <?php 
                foreach ($acc_id as $key => $id) {
                    $id_user = $id;
                }
            ?>
            <form
                id="form"
                action="<?php echo BASE_URL ?>/account_user/update_password/<?php echo $id_user ?>"
                method="post"
                class="form auth__form auth__form-forgot-password"
            >
                <!-- Password -->
                <div class="form__group">
                    <div class="form__text-input">
                        <input
                            type="password"
                            id="password"
                            name="acc_password"
                            rules="required|min:6"
                            placeholder="Password"
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
                        <span class="form__checkbox-label">Set as default card</span>
                    </label>
                </div>

                <div class="form__group auth__btn-group">
                    <button class="btn btn--primary auth__btn form__submit-btn auth__submit-forgot-password">
                        Đổi mật khẩu
                    </button>
                </div>
            </form>

            <p class="auth__text">
                You have an account yet?
                <a href="<?php echo BASE_URL ?>/sign-in.html" class="auth__link auth__text-link">Back to Sign in</a>
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