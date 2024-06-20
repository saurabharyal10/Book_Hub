<?php
date_default_timezone_set('Asia/Kathmandu');
$now = date("Y-m-d H:i:s");

if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "DELETE FROM tbl_contactus WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
