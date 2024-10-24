<?php
include "db_conn.php";

if (isset($_GET['id'])) {
  $employee_id = mysqli_real_escape_string($conn, $_GET['id']);
  
  // Make sure the table name matches your database schema
  $sql = "DELETE FROM `employees` WHERE `employee_id` = '$employee_id'";
  
  if (mysqli_query($conn, $sql)) {
      header("Location: index.php?msg=Employee deleted successfully");
      exit();
  } else {
      header("Location: index.php?msg=Error deleting Employee: " . mysqli_error($conn));
      exit();
  }
} else {
  header("Location: index.php?msg=No Employee ID provided");
  exit();
}
