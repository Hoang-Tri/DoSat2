
<?php
require './Carbon/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonInterval;

?>
<?php
    class Statistic extends DController {
        public function __construct() {
            $data = array();
            parent::__construct();
        }
        public function index() {
            $this->statistic();
        }

        public function statistic() {
            if(isset($_POST['time'])) {
                $time = $_POST['time'];
            }else {
                $time = '';
                $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
            }

            if($time == '7ngay') {
                $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
            }else if ($time == '30ngay') {
                $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
            }else if($time == '90ngay') {
                $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
            }else if($time == '1nam') {
                $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
            }

            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $table = 'statistic';

            if(isset($_POST['from']) && $_POST['to']) {
                $from = $_POST['from'];
                $to = $_POST['to'];

                $cond = "$table.sta_date BETWEEN '$from' AND '$to'";
            }else {
                $cond = "$table.sta_date BETWEEN '$subdays' AND '$now'";
            }

            $catemodel = $this->load->model('categorymodel');

            $result = $catemodel->statiscial($table, $cond);

            foreach ($result as $row) {
                $chart_data[] = array(
                    'date' => $row['sta_date'],
                    'order' => $row['count_order'],
                    'revenua' => $row['revenua'],
                    'quantity' => $row['quantity']
                );
            }

           echo $data = json_encode($chart_data);
        }

        public function statiscial_product() {
            $tbl_product = "product";
            $tbl_order_details = "order_details";

            $cond = "$tbl_product.pro_id = $tbl_order_details.pro_id";

            $categorymodel = $this->load->model("categorymodel");
            $result = $categorymodel->statiscial_product($tbl_product, $tbl_order_details, $cond);

            echo $data_product = json_encode($result);
        }
    }