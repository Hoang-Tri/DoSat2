<?php
    if(isset($_GET['msg'])) {
        $success_message = urldecode($_GET['msg']);
        echo "<script>alert('$success_message')</script>";
    } elseif(isset($_GET['error'])) {
        $error_message = urldecode($_GET['error']);
        echo "<script>alert('$error_message')</script>";
    }
?>

<?php 
    if(isset($_SESSION['acc_id'])) {
        $acc_id = $_SESSION['acc_id'];
    }  else {
        $acc_id = '';
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
                        <a href="<?php echo BASE_URL ?>" class="breadcrumb__item">
                            Trang chủ
                            <img src="<?php echo BASE_URL ?>/assets/icons/arrow-right.svg" alt="" class="breadcrumb__icon" />
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL ?>/favorite_user" class="breadcrumb__item breadcrumb__item--active">
                            Sản phẩm yêu thích
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="checkout__container">
            <div class="row gy-xl-3">
                <div class="col-12">
                    <div class="cart">
                        <h1 class="cart__heading">Favourite List</h1>
                        <p class="cart__desc">3 items</p>
                        <div class="cart__select-all">
                            <label class="cart__select">
                                <input
                                    type="checkbox"
                                    name="checkaddress"
                                    class="cart__select-checkbox checked-all"
                                    checked
                                />
                            </label>
                        </div>
                        <div class="cart__list cart__list--js">
                            
                        </div>

                        <div class="cart__row cart__bottom">
                            <div class="cart__continue">
                                <a href="<?php echo BASE_URL ?>#product" class="cart__bottom-continue-link">
                                    <div class="cart__bottom-continue">
                                        <img
                                            src="<?php echo BASE_URL ?>/assets/icons/arrow-down-2.svg"
                                            alt=""
                                            class="cart__bottom-icon icon"
                                        />
                                        <span>Tiếp tục mua sắm</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    jQuery.noConflict();

    jQuery(document).ready(function($) {
        $('.cartForm').on('submit', function(event) {
        event.preventDefault();
        
        var formData = $(this).serialize();
        var $form = $(this); 
        
        $.ajax({
            url: '<?php echo BASE_URL ?>/cart_user/addtocart',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Thêm sản phẩm vào giỏ hàng thành công');
                var productId = $form.find('[name="pro_id"]').val();

                removeProductFromLocalStorage(productId);
            },
            error: function(xhr, status, error) {
                console.error('Failed to add item to cart');
                // Optionally, you can handle errors here
            }
        });
    });

    // Function to remove product from localStorage
    function removeProductFromLocalStorage(productId) {

        var data = JSON.parse(localStorage.getItem('data')) || [];
        data = data.filter(function(item) {
            return item.id !== productId;
        });
        localStorage.setItem('data', JSON.stringify(data));
    }
    });
</script>