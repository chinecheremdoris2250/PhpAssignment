
<?php 
error_reporting(0);
include 'Include/db.php';
include 'function/update.php'; 

if (isset($_POST['update'])) {
  $id = $_POST['teacherId'];
  $name = $_POST['updateName'];
  $course = $_POST['updateCourse'];

  $combinedCourse = implode(", ", $course);

  $update = new DatabaseUpdate();

  // update new record into "teachers" table
  $tableName = "teachers";
  $data = [
      "name" => $name,
      "course" => $combinedCourse,
  ];
  $id = "id = 1" . $id;
 
 // Perform the update and handle any errors
  try {
    $update->updateTable($tableName, $data, $id);
    echo "Record updated with ID: " . $updated;
    header("Location: index.php");
    exit;
  } catch (Exception $e) {
    echo "Error message: " . $e->getMessage();
    echo "SQL query: " . $update->getLastQuery(); // Add this line to display the SQL query
    exit;
  }
}

if (isset($_POST['updateStudent'])) {
  $id = $_POST['studentId'];
  $fullname = $_POST['updateFullname'];
  $regno = $_POST['updateRegno'];


  $update = new DatabaseUpdate();

  // update new record into "teachers" table
  $tableName = "users";
  $data = [
      "fullname" => $fullname,
      "reg_no" => $regno,
  ];
  $id = "id = 1" . $id;
 // Perform the update and handle any errors
  try {
    $update->updateTable($tableName, $data, $id);
    header("Location: index.php");
    exit;
  } catch (Exception $e) {
    echo "Error message: " . $e->getMessage();
    echo "SQL query: " . $update->getLastQuery(); // Add this line to display the SQL query
    exit;
  }
}
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <!-- Update Form -->
    <div class="row container">
      <div class="form-container col-12">
        <h2 class="form-header">Student Update Form</h2>
        <form id="updateForm" method="POST" action="">
          <div class="form-group mb-3">
          <input type="hidden" id="studentId" name="studentId" value="<?php echo isset ($id) ? $id: '' ;?>">
              <label for="updateFullname">Name</label>
              <input type="text" class="form-control" id="updateFullname" name="updateFullname" placeholder="Enter Name" required>
          </div>
          <div class="form-group mb-3">
              <label for="updateRegno">Reg Number</label>
              <input name = "updateRegno" type="text" class="form-control" id="updateRegno" placeholder="Reg Number">
          </div>
          
          <button type="submit" class="btn btn-primary" name="updateStudent">Update</button>
        </form>
      </div>


      <div class="form-container col-12">
        <h2 class="form-header">Teacher Update Form</h2>
        <form id="updateForm" method="POST" action="">
          <div class="form-group">
          <input type="hidden" id="teacherId" name="teacherId" value="">
              <label for="updateName">Name</label>
              <input type="text" class="form-control" id="updateName" name="updateName" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
              <label for="updateCourse">Course Offering</label>
              <select class="form-control" id="updateCourse" name="updateCourse[]" multiple required>
                  <option value="English">English</option>
                  <option value="Maths">Maths</option>
                  <option value="GST">GST</option>
                  <option value="Java">Java</option>
                  <option value="Data Structure">Data Structure</option>
                  <option value="Backend">Backend</option>
                  <option value="FrontEnd">FrontEnd</option>
                  <option value="Data Science">Data Science</option>
              </select>
          </div>
          
          <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
      </div>

    </div>

    <style>
     
       body {
      background-color: #0000f0;
      font-family: Arial, sans-serif;
      }
      .form-container {
      width: 400px;
      margin: 0 auto;
      padding: 2rem;
      background-color: #F2f2f2;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .form-header {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 24px;
        text-transform: uppercase;
      }

      .form-group {
        margin-bottom: 20px;
      }

      label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
      }

      input[type="text"],
      select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
      }

      /* Select styles */
      select {
        height: 120px;
        resize: vertical;
      }

      button[type="submit"] {
        padding: 10px 20px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      button[type="submit"]:hover {
        background-color: #45a049;
      }

      .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        height: 100vh;
      }



      @media (max-width: 576px){

      }

      @media (min-width: 577px) and (max-width: 991px) {
        .container{
          flex-direction: column;
          gap: 2rem;
        }
      }

    </style>

</body>
</html>