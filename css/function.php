<?php

class DatabaseUpdater {
    private $conn;
    
    public function __construct($servername , $username, $password, $database) {
        // Create a database connection
        $this->conn = new mysqli($servername , $username, $password, $database);
        
        // Check for connection errors
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
     }

    public function createTableTeachers() {
        // Create the "teachers" table
        $query = "CREATE TABLE IF NOT EXISTS teachers (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(50),
                    course VARCHAR(50)
                )";
        
        if ($this->conn->query($query) === TRUE) {
            echo "<p class='success'>Table 'teachers' created successfully or already exists.<br>";
        } else {
            echo "<p class='error'>Error creating table 'teachers': " . $this->conn->error . "<br>";
        }
    }

    public function updateTable($tableName, $data, $id) {
        // Prepare the update query
        $query = "UPDATE " . $tableName . " SET ";
        
        foreach ($data as $column => $value) {
            $query .= $column . " = '" . $this->conn->real_escape_string($value) . "', ";
        }
        
        // Remove the trailing comma and space
        $query = rtrim($query, ', ');

         // Add the WHERE clause to update by ID
         $query .= " WHERE id = " . $id;
        
        // Execute the update query
        if ($this->conn->query($query) === TRUE) {
            echo "<p class='success'>Table " . $tableName . " updated successfully.";
        } else {
            echo "<p class='error'>Error updating table " . $tableName . ": " . $this->conn->error;
        }
    }

    public function insertIntoTable($tableName, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        $query = "INSERT INTO " . $tableName . " (" . $columns . ") VALUES (" . $values . ")";

        if ($this->conn->query($query) === TRUE) {
            echo "<p class='success'>New record inserted into " . $tableName . " successfully.</p>";
        } else {
            echo "<p class='error'>Error inserting record into " . $tableName . ": " . $this->conn->error . "</p>";
        }
    }

    public function getTeachers() {
        $query = "SELECT * FROM teachers";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Course</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No teachers found.</p>";
        }
    }
    
    public function closeConn() {
        // Close the database connection
        $this->conn->close();
    }
}

        // Usage example
        $servername  = "localhost";
        $username = "root";
        $password = "";
        $database = "Class_Project";

        // Create an instance of the DatabaseUpdater class
        $updater = new DatabaseUpdater($servername, $username, $password, $database);

        // Create "teachers" table
        $updater->createTableTeachers();

        // Update "teachers" table
        $tableName = "teachers";
        $data = [
            "name" => "Ezeh Emmaunel",
            "course" => "Java"
        ];
        $id = 2; // ID of the row to update
        $updater->updateTable($tableName, $data, $id);

        // $tableName = "users";
        // $data = [
        //     "Fullname" => "Neche Okeke",
        //     "Regno" => "58686"
        // ];
        // $id = 1;
        // $updater->updateTable($tableName, $data, $id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $course = $_POST['course'];

            // Insert new record into "teachers" table
            $data = [
                "name" => $name,
                "course" => $course
            ];
            $updater->insertIntoTable($tableName, $data);

            // Clear the form values
            $_POST['name'] = '';
            $_POST['course'] = '';
        }

        // Get and display the updated "teachers" table
        $updater->getTeachers();


        // Close the database connection
        $updater->closeConn();
?>