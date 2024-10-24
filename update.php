<?php 
include "db_conn.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $employee_id = $_GET['id'];
} else {
    echo "No Employee selected for update.";
    exit;
}

if (isset($_POST['submit'])) {
    $employee_id = $_POST['employee_id'];
    $department_code = $_POST['department_code'];
    $employee_fname = $_POST['employee_fname'];
    $employee_lname = $_POST['employee_lname'];
    $employee_email = $_POST['employee_email'];
    $employee_RPH = $_POST['employee_RPH'];

    $sql = "UPDATE `employees` SET `department_code`='$department_code', `employee_fname`='$employee_fname', `employee_lname`='$employee_lname', `employee_email`='$employee_email', `employee_RPH`='$employee_RPH' WHERE `employee_id`='$employee_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    $sql = "SELECT * FROM `employees` WHERE `employee_id` = '$employee_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "No Employee found with id: $employee_id";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Employee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/update.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        Skills Test CRUD Application
    </nav>
    <div class="container">
        <h3>Edit Employee information</h3>
        <div class="text-center mb-4">
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <div class="form-container">
            <form action="#" method="post" onsubmit="return validationForm()">
                <div class="form-group">
                    <label for="employee_id">Employee ID</label>
                    <input type="text" id="employee_id" name="employee_id" value="<?php echo $row['employee_id'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="department_code">Department Code</label>
                    <input type="text" id="department_code" name="department_code" value="<?php echo $row['department_code'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="employee_fname">First Name</label>
                    <input type="text" id="employee_fname" name="employee_fname" value="<?php echo $row['employee_fname'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="employee_lname">Last Name</label>
                    <input type="text" id="employee_lname" name="employee_lname" value="<?php echo $row['employee_lname'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="employee_email">Email</label>
                    <input type="email" id="employee_email" name="employee_email" value="<?php echo $row['employee_email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="employee_RPH">RPH</label>
                    <input type="number" id="employee_RPH" name="employee_RPH" value="<?php echo $row['employee_RPH'] ?>" required>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>   

    <script src="" async defer></script>
</body>
</html>
