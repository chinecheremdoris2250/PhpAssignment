<?php

    class Databaseinsert {
        private $conn;
        
        public function __construct(){
            ob_start();
            include 'Include/db.php';
        
            $this->conn = $conn;
        }



        public function insertTable($tableName, $data) {
            $columns = implode(', ', array_keys($data));
            $values = "'" . implode("', '", array_values($data)) . "'";

            $query = "INSERT INTO " . $tableName . " (" . $columns . ") VALUES (" . $values . ")";

            if ($this->conn->query($query) === TRUE) {
                echo "<p class='success'>New record inserted into " . $tableName . " successfully.</p>";
            } else {
                echo "<p class='error'>Error inserting record into " . $tableName . ": " . $this->conn->error . "</p>";
            }
        }


    }


?>