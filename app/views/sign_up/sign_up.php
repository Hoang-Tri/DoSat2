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
                    <h1 class="auth__heading">Sign Up</h1>
                    <p class="auth__desc">Let’s create your account and Shop like a pro and save money.</p>
                    <?php
                        if(isset($_GET['msg'])) {
                            $success_message = urldecode($_GET['msg']);
                            echo "<h4 style='color: blue; font-weight: bold;'>".$success_message."</h4>";
                        } elseif(isset($_GET['error'])) {
                            $error_message = urldecode($_GET['error']);
                            echo "<h4 style='color: blue; font-weight: bold;>".$error_message."</h3>";
                        }
                    ?>
                    <form method="post" id="form" action="<?php echo BASE_URL ?>/account_user/insert_signup" class="form auth__form">
                        <!-- User name-->
                        <div class="form__group">
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    id="name"
                                    name="acc_name"
                                    rules="required"
                                    placeholder="User name"
                                    class="form__input"
                                    required
                                />
                                <img src="<?php echo BASE_URL ?>/assets/img/auth/lock.svg" alt="" class="form__input-icon form__icon" />
                            </div>
                            <span class="form__message"></span>
                        </div>
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
                                <input type="checkbox" name="" id="" class="form__checkbox-input d-none" checked required />
                                <span class="form__checkbox-label">Set as default card</span>
                            </label>

                        </div>

                        <div class="form__group auth__btn-group">
                            <button class="btn btn--primary auth__btn form__submit-btn">Sign Up</button>
                        </div>
                    </form>

                    <p class="auth__text">
                        You have an account yet?
                        <a href="<?php echo BASE_URL ?>/account_user/sign_in" class="auth__link auth__text-link">Sign In</a>
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
                    // alert("Dang ki thanh cong !");
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