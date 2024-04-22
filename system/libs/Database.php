<!-- Ket noi co so du lieu -->

<?php
    class Database extends PDO{
        // Ke thua cac phuong thuc cua PDO
        public function __construct($connect, $user, $pass) {
            parent::__construct($connect, $user, $pass);
        }

        // Ham Select table
        public function select ($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC) {
            $statement = $this->prepare($sql);
            foreach($data as $key => $value) {
                $statement->bindParam($key, $value);
            }

            $statement->execute();
            return $statement->fetchAll($fetchStyle);
        }

        // Ham insert vao table
        public function insert($table, $data) {
            // cate_pro_id, cate_pro_title, cate_pro_desc
            $key = implode(",",array_keys($data));

            // :cate_pro_id, :cate_pro_title, :cate_pro_desc
            $values = ":".implode(", :",array_keys($data));

            // $table(cate_pro_id, cate_pro_title, cate_pro_desc)
            //  VALUES(:cate_pro_id, :cate_pro_title, :cate_pro_desc)
            $sql = "INSERT INTO $table($key)VALUES ($values)";

            $statement = $this->prepare($sql);

            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value);
            }

            return $statement->execute();
        }

         // Ham update vao table
         public function update($table, $data, $cond) {
            $updateKey = "";

            // ""."title_1 = :title_1,"."title_2 = :title_2,"
            foreach($data as $key => $value) {
                $updateKey .= "$key=:$key ,";
            }
            // => "title_1 = :title_1, title_2 = :title_2,"
            $updateKey = rtrim($updateKey, ",");
            // => "title_1 = :title_1, title_2 = :title_2"


            $sql = "UPDATE `category_product` SET $updateKey WHERE $cond";
            $statement = $this->prepare($sql);

            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
            return $statement->execute();
        }

         // Ham update vao table
         public function delete($table, $cond, $limit = 1) {
            $sql = "DELETE FROM `category_product` WHERE $cond LIMIT $limit";
            return $this->exec($sql);
        }
    }
?>