<!-- goi moi thu cua view -->
<?php 
    class Load {
        public function __construct() {
            
        }
        // Ham view
        public function view ($fileName, $data = false) {
            if($data) {
                extract($data);
            }
            include("./app/views/".$fileName.".php");
        }

        public function model ($fileName) {
            include("./app/models/".$fileName.".php");
            // tra ve class modal
            return new $fileName;
        }
    }
?>