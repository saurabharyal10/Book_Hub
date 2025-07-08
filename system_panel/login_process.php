<?php
include_once('../connection/connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

// $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
// mysqli_select_db($con, "book_store");
$query = "SELECT * FROM tbl_admin_login WHERE username='$username' and password='$password'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$arr = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (isset($arr)) {
  session_start();
  $_SESSION['username'] = $username;
  header('Location: index.php');
  exit();
} else {
  // echo "You are not authorized user.";
  $_SESSION['login_message'] = "Sorry, the credentials do not match.";
  header("Location: " . $_SERVER['HTTP_REFERER']);
}
