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

                    <form id="form" action="<?php echo BASE_URL ?>/sign-in.html" class="form auth__form">
                        <!-- User name-->
                        <div class="form__group">
                            <div class="form__text-input">
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
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
                                    name="email"
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
                                    name="password"
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
                            <button class="btn btn--outline btn-not-margin auth__btn">
                                <img src="<?php echo BASE_URL ?>/assets/img/auth/google.svg" alt="" class="auth__btn-icon icon" />
                                Sign in with Gmail
                            </button>
                        </div>
                    </form>

                    <p class="auth__text">
                        You have an account yet?
                        <a href="<?php echo BASE_URL ?>/sign-in.html" class="auth__link auth__text-link">Sign In</a>
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