<?php 
include "db_conn.php";

// search connection
$search = '';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
}

// searching the employees name or employees ID
$sql = "SELECT * FROM `employees`";
if ($search) {
    $sql .= " WHERE `employee_fname` LIKE '%$search%' OR `employee_lname` LIKE '%$search%' OR `employee_id` LIKE '%$search%'";
}
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employees Table</title>
    <meta name="description" content="Employees table">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar bg-light mb-3">
        <div class="container">
            <span class="navbar-brand">CRUD - Add Employee</span>
        </div>
    </nav>

    <!-- Message alert -->
    <div class="container">
        <?php 
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        ?>

        <!-- Add Employee Button and Search Form -->
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <a href="add-employees.php" class="btn btn-primary mb-2">Add Employee</a>
            </div>
            <div class="col-12 col-md-6">
                <form action="" method="post" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search employee name or ID">
                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                </form>
            </div>
        </div>

        <!-- Employee Table -->
        <div class="table-responsive">
            <?php 
            if (mysqli_num_rows($result) > 0) { 
            ?>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Emp ID</th>
                            <th>DepCode</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Rate per/hr</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["employee_id"]; ?></td>
                                <td><?php echo $row["department_code"]; ?></td>
                                <td><?php echo $row["employee_fname"]; ?></td>
                                <td><?php echo $row["employee_lname"]; ?></td>
                                <td><?php echo $row["employee_email"]; ?></td>
                                <td><?php echo $row["employee_RPH"]; ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row["employee_id"]; ?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="delete.php?id=<?php echo $row["employee_id"]; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php 
            } else {
                echo "<div class='alert alert-info'>Employee not found.</div>";
            } 
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // add event listener to all close buttons
            const closeButtons = document.querySelectorAll(".close-btn");
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const alertBox = this.parentElement;
                    alertBox.style.display = "none";
                });
            });
        });
    </script>
</body>
</html>
