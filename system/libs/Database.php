
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


            $sql = "UPDATE $table SET $updateKey WHERE $cond";
            $statement = $this->prepare($sql);

            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
            return $statement->execute();
        }

         // Ham update vao table
         public function delete($table, $cond, $limit = 1) {
            $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
            return $this->exec($sql);
        }


        // Login admin
        public function affectedRows($sql, $username, $password) {
            $statement = $this->prepare($sql);
            $statement->execute(array($username, $password));
            return $statement->rowCount();
        }

        public function selectUser($sql, $username, $password) {
            $statement = $this->prepare($sql);
            $statement->execute(array($username, $password));
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function checkemail($sql, $email) {
            // Chuẩn bị và thực thi câu truy vấn
            $statement = $this->prepare($sql);
            $statement->bindValue(":email", $email);
            $statement->execute();
        
            // Lấy số lượng hàng kết quả
            $numRows = $statement->fetchColumn();
        
            // Kiểm tra xem có email trong cơ sở dữ liệu hay không
            return ($numRows > 0) ? 1 : 0;
        }

        public function checkid($sql, $id) {
            // Chuẩn bị và thực thi câu truy vấn
            $statement = $this->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
        
            // Lấy số lượng hàng kết quả
            $numRows = $statement->fetchColumn();
        
            // Kiểm tra xem có email trong cơ sở dữ liệu hay không
            return ($numRows > 0) ? 1 : 0;
        }
        
        public function getAccount($sql, $accId) {
            $stmt = $this->prepare($sql);
            $stmt->execute(array(':acc_id' => $accId));
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getId($sql, $email) {
            $stmt = $this->prepare($sql);
            $stmt->execute(array(':acc_email' => $email));
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }
?>