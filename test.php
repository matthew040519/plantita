<?php 
session_start();
  if (!isset($_SESSION['customer_name'])) {
    header("location: index.php");
  }
  echo $_SESSION['customer_name'];
  include('include/connection.php');
  // echo $_SESSION['student_id'];
 ?>