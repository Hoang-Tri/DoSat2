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
                        <!-- cart info user address -->
                        <div class="cart__row payment__top-row">
                            <h2 class="cart__sub-heading">
                                Đơn hàng của bạn
                            </h2>

                            <!-- <div class="cart__edit-wrap">
                                <a href="<?php echo BASE_URL?>/shipping_user" class="cart__edit">
                                    <img src="<?php echo BASE_URL?>/assets/icons/edit.svg" alt="" class="icon" />
                                    Sữa
                                </a>
                            </div> -->
                        </div>

                        <!-- payment item 2 -->
                        <?php 
                            if($order) {
                               $item = count($order);
                        ?>  
                            <article class="payment__item">
                                <div class="payment__item-info">
                                    <h3 class="payment__heading">Chi tiết mặt hàng</h3>
                                    <p class="payment__desc"><?php echo $item ?> mặt hàng</p>
                                </div>
                                <button type="button" class="payment__desc payment__desc-link js-toggle" toggle-target="#details">Xem Chi tiết</button>
                            </article>
                        <?php 
                            }
                        ?>
                        
                        <h4 class="cart__shipping-title">Chi tiết đơn hàng</h4>

                        <!-- Cart list info -->
                        <div class="cart__list hide" id="details">
                            <!-- Item 1 -->
                            <?php 
                                $sub_totals = 0;
                                $item = 0;
                                foreach($order as $key => $value) {
                                    $sub_totals += $value['order_details_price'] * $value['order_details_quantity'];
                                    $item += $value['order_details_quantity'];
                                    $acc_id = $value['acc_id'];
                            ?>
                            <a href="<?php echo BASE_URL ?>/post_user/post_details/<?php echo $value['pro_id'] ?>">
                                <article class="payment__item">
                                    <img src="<?php echo BASE_URL ?>/assets/uploads/product/<?php echo $value['pro_image'] ?>" alt="" class="payment__thumb blog__thumb" />
                                    <div class="payment__item-content">
                                        <div class="payment__item-info">
                                            <h3 class="payment__heading"><?php echo $value['pro_title'] ?></h3>
                                            <p class="payment__desc payment__desc--low"><?php echo number_format ($value['order_details_price'],0,',','.' ).'đ' ?></p>
                                        </div>
                                        <a class="payment__desc payment__desc-link" style="margin-left: auto;" href="<?php echo BASE_URL ?>/order_user/list_order_details/<?php echo $value['order_code'] ?>">Chi tiết đơn hàng</a>
                                    </div>
                                </article>
                            </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>






