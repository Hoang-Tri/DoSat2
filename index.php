<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <?php 
            // tu dong load cac class trong libs
            spl_autoload_register(function($class) {
                include_once("./system/libs/".$class.".php");
            });

            include_once("./app/config/config.php");
            
            $url = isset($_GET["url"]) ? $_GET["url"] : null;
            
            // Check url co ton tai chu
            if($url!= null) {
                $url = rtrim($url, "/");
                $url = explode("/", filter_var($url, FILTER_SANITIZE_URL));
            }else {
                unset($url);
            }

            // url the hien class va phuong thuc cua no 

            // check url da ton tai
            if(isset($url[0])) {
                include_once("./app/controllers/".$url[0].".php");
                $ctrl = new $url[0]();
                if(isset($url[2])) {
                    $ctrl->{$url[1]}($url[2]);
                }else {
                    if(isset($url[1])) {
                        $ctrl->{$url[1]}();
                    }
                }
            }else {
                include_once("./app/controllers/index.php");
                $index = new index();
                $index->homepage();
            }
            
        ?>
    </div>
</body>

</html>