<?php
require './Carbon/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;

?>
   
   <div class="mb-3">
                <h4>Trang quản trị dành cho Admin</h4>
            </div>


            <div class="row">
                <div class="col-12 d-flex">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col-6">
                                    <div class="p-3 m-1">
                                        <h4>Chào mừng bạn đã quay lại, <?php echo $_SESSION["ad_username"] ?></h4>
                                    </div>
                                </div>
                                <div class="col-6 align-self-end text-end">
                                    <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thong ke tai day -->

            <div class="gird_10">
                <div class="box row first gird">
                    <h2>Thông kê đơn hàng</h2>

                    <div class="block row">
                        <div class="col-md-3">
                            Từ ngày: <input type="text" id="datepicker_from" class="form-control date_from">
                        </div>

                        <div class="col-md-3">
                            Dến ngày: <input type="text" id="datepicker_to" class="form-control date_to">
                            <button type="button" class="btn btn-success mt-2 filter">Lọc ngay</button>
                        </div>

                        <div class="col-md-3">
                            Lọc theo: <span class="text-date"></span>
                            <select name="" id="" class="form-control select-sta">
                                <option>--Lọc theo--</option>
                                <option value="7ngay">Lọc theo 7 ngày qua</option>
                                <option value="30ngay">Lọc theo 30 ngày qua</option>
                                <option value="90ngay">Lọc theo 90 ngày qua</option>
                                <option value="1nam">Lọc theo 1 năm qua</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="row-col-md-12">
                        <div id="myfirstchart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <h2>Thống kê sản phẩm</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng bán ra</th>
                            <th>Doanh thu sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody id="product-stats">

                    </tbody>
                </table>
            </div>

            
