<?php

    class DatabaseUpdate {
        private $conn;
        private $lastQuery;
        
        public function __construct(){
            ob_start();
            include 'Include/db.php';
        
            $this->conn = $conn;
        }
        

        public function updateTable($tableName, $data, $id) {
            $setValues = "";
            foreach ($data as $column => $value) {
                $setValues .= $column . " = '" . $value . "', ";
            }
            $setValues = rtrim($setValues, ', ');

            $query = "UPDATE " . $tableName . " SET " . $setValues . " WHERE " . $id;
             echo "<p>SQL query: " . $query . "</p>"; // Store the last executed query
            
            if ($this->conn->query($query) === TRUE) {
                echo "<p class='success'>Record updated in " . $tableName . " successfully.</p>";
            } else {
                echo "<p class='error'>Error updating record in " . $tableName . ": " . $this->conn->error . "</p>";
            }
        }
        
        public function getLastQuery() {
            return $this->lastQuery;
        }
    }
    


?>