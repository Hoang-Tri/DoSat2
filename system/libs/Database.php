<!-- Ket noi co so du lieu -->

<?php
    class Database extends PDO{
        public function __construct($connect, $user, $pass) {
            parent::__construct($connect, $user, $pass);
        }

        public function select ($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC) {
            $statement = $this->prepare($sql);
            foreach($data as $key => $value) {
                $statement->bindParam($key, $value);
            }

            $statement->execute();
            return $statement->fetchAll($fetchStyle);
        }

        public function insert($table, $data) {
            $key = implode(",",array_keys($data));
            $values = ":".implode(", :",array_keys($data));

            $sql = "INSERT INTO $table($key)VALUES ($values)";

            $statement = $this->prepare($sql);

            foreach($data as $key => $value) {
                $statement->bindParam(":$key", $value);
            }

            return $statement->execute();
        }
    }
?>