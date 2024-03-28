<?php
date_default_timezone_set('Asia/Kathmandu');
$now = date("Y-m-d H:i:s");
var_dump($now);

if ($_POST['action'] == 'add') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message_info = $_POST['message_info'];

    var_dump($name);

    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "INSERT INTO `tbl_contactus` (`id`, `name`,`email`,`phone_number`, `message`, `query_date`,`status`) VALUES 
             (NULL, '$name', '$email', '$phone_number', '$message_info','$now', 'Unpublish') ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $_SESSION['query_message'] = "Query Addressed successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
