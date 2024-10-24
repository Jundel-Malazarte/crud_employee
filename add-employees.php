<?php 
include "db_conn.php";

$error_msg = '';

if (isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $department_code = $_POST['department_code'];
    $employee_fname = $_POST['employee_fname'];
    $employee_lname = $_POST['employee_lname'];
    $employee_email = $_POST['employee_email'];
    $employee_RPH = $_POST['employee_RPH'];

    // Check for duplicate ID
    $check_sql = "SELECT * FROM `employees` WHERE `employee_id` = '$employee_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $error_msg = "Error: Duplicate Employee ID. This ID already exists.";
    } else {
        $sql = "INSERT INTO `employees` (`employee_id`, `department_code`, `employee_fname`, `employee_lname`, `employee_email`, `employee_RPH`) 
                VALUES ('$employee_id', '$department_code', '$employee_fname', '$employee_lname', '$employee_email', '$employee_RPH')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg=New Employee created successfully");
        } else {
            $error_msg = "Failed: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Employees</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/add-employee.css">
        <title>PHP CRUD Application</title>
    </head>
    <body>

        <nav class="navbar">
            Skills Test Crud Application
        </nav>
        <!-- Open -->
        <div class="container">
            <div class="text-center mb-4">
                <h3>Add new Employee</h3>
                <p class="text-muted">Complete the form below to add a new employee</p>
            </div>

            <!--
            <?php if ($error_msg != ''): ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $error_msg; ?>
                 </div>
             <?php endif; ?>
            -->

             <div class="form-container">
                <form action="add-employees.php" method="post" onsubmit="return validationForm()">
                    <div class="form-group">
                        <label for="employee_id">Employee ID</label>
                        <input class="text" id="employee_id" name="employee_id" required>
                    </div>
                    <div class="form-group">
                        <label for="department_code" id="department_code" name="department_code">Department Code</label>
                        <input class="text" id="department_code" name="department_code" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_fname" id="employee_fname" name="employee_fname">Employee Firstname</label>
                        <input class="text" id="employee_fname" name="employee_fname" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_lname" id="employee_lname" name="employee_lname">Employee Lastname</label>
                        <input class="text" id="employee_lname" name="employee_lname" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_email" id="employee_email" name="employee_email">Employee Email</label>
                        <input class="text" id="employee_email" name="employee_email" required>
                    </div>
                    <div class="form-group">
                        <label for="employee_RPH" id="employee_RPH" name="employee_RPH">Employee Rate/Hr</label>
                        <input class="text" id="employee_RPH" name="employee_RPH" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="submit">Add</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
             </div>
    <!-- Clossing tag -->    
        </div>
        <!-- JavaScript Validation -->
    <script>
        function validateForm() {
            var employee_id = document.forms["add-employees"]["employee_id"].value;
            var department_code = document.forms["add-employees"]["department_code"].value;
            var employee_fname = document.forms["add-employees"]["employee_fname"].value;
            var employee_lname = document.forms["add-employees"]["employee_lname"].value;
            var employee_email = document.forms["add-employees"]["employee_email"].value;
            var employee_RPH = document.forms["add-employees"]["employee_RPH"].value;

            if (employee_id == "" || department_code == "" || employee_fname == "" || employee_lname == "" || employee_email == "" || employee_RPH == "") {
                alert("All fields are required.");
                return false;
            }
            return true;
        }
    </script>

    </body>
</html>