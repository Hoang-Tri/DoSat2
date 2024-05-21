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
 <div class="col-9 col-xl-8 col-lg-7 col-md-12">
                    <div class="cart">
                        <div class="cart__list">
                            <!-- Item 1 -->
                            <?php 
                                $sub_totals = 0;
                                $item = 0;
                                foreach($order_details as $key => $value) {
                                    $sub_totals += $value['order_details_price'];
                                    $item += $value['order_details_quantity'];
                                    $order_details_fee = $value['order_details_fee'];
                                    $order_details_coupon = $value['order_details_coupon'];
                            ?>
                            <article class="cart__item">
                                <a href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $value['pro_id']?>" class="cart__thumb">
                                    <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $value['pro_image'] ?>" alt="" class="cart__thumb-img" />
                                </a>
                                <div class="cart__info">
                                    <div class="cart__info-left">
                                        <h2 class="cart__info-title">
                                            <a href="<?php echo BASE_URL ?>/product_user/product_details/<?php echo $value['pro_id']?>">
                                                <?php echo $value['pro_title'] ?>
                                            </a>
                                        </h2>
                                        <p class="cart__price">
                                        <?php echo number_format ($value['order_details_price'],0,',','.' ).'đ'?> | <span class="cart__price-stock"> Size <?php echo $value['order_details_size']?></span>
                                        </p>

                                        <div class="cart__row cart__row-ctrl">
                                            <div class="cart__input"><?php echo $value['brand_name'] ?></div>
                                            <span class="cart__quantity-number">Số lượng:<?php echo ' '. $value['order_details_quantity'] ?></span>
                                        </div>
                                    </div>
                                    <div class="cart__info-right">
                                        <span class="cart__total"><?php echo number_format ($value['order_details_price'],0,',','.' ).'đ'?></span>
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
                                    <a href="<?php echo BASE_URL ?>#product" class="cart__bottom-continue-link">
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

                                <!-- lay trang thai don hang -->
                                <?php 
                                    foreach($order as $key => $value) {
                                        $status = $value['order_status'] == 0 ? "Chờ xác nhận" : "Đang giao hàng";
                                    }
                                ?>
                                <div class="col-6">
                                    <div class="cart__checkout">
                                        <div class="cart__info-row">
                                            <span>Trạng thái đơn hàng:</span>
                                            <span><?php echo $status?></span>
                                        </div>
                                        <div class="cart__info-row">
                                            <span>Tổng tiền hàng:</span>
                                            <span><?php echo number_format ($sub_totals,0,',','.' ).'đ'?></span>
                                        </div>

                                        <div class="cart__info-row">
                                            <span>Vận chuyển:</span>
                                            <span><?php echo number_format ($order_details_fee,0,',','.' ).'đ'?></span>
                                        </div>

                                        <?php 
                                            $totals = $sub_totals + $order_details_fee;

                                            if($order_details_coupon < 1) {
                                                $totals = $totals - $totals * $order_details_coupon; 
                                            }else {
                                                $totals += $order_details_coupon;
                                            }
                                        ?>

                                        <div class="cart__info-row">
                                            <span>Giảm giá:</span>
                                            <span><?php echo $order_details_coupon > 1 ? number_format ($order_details_coupon,0,',','.' ).'đ' : $order_details_coupon."%" ?></span>
                                        </div>

                                        <div class="cart__info-separate"></div>

                                        <div class="cart__info-row cart__info-row--bold">
                                            <span>Tổng thanh toán:</span>
                                            <span><?php echo number_format ($totals,0,',','.' ).'đ'?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>






