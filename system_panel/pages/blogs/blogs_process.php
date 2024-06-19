<?php
$now = date("Y-m-d H:i:s");

if ($_POST['action'] == 'add') {
    $blog_title = $_POST['blog_title'];
    $blog_description = $_POST['blog_description'];
    var_dump($blog_description);
    $status = "Unpublish";

    $dirPathPhoto = '../../data_informations/blog_images/';
    if (!file_exists($dirPathPhoto)) {
        mkdir($dirPathPhoto, 0777, true);
    }

    $myuid = uniqid();
    if (!file_exists($myuid)) {
        $myuid = uniqid();
    }

    $uploadedPhotoName = $_FILES['blog_image']['name'];
    $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));
    if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG') {

        // $image = $myuid . '.' . $ext;
        $imageThumb = $myuid . '_image.' . $ext;

        if (ImgUpload('blog_image', $dirPathPhoto, $imageThumb)) {
            ImageResizeWithCrop(450, 334, $dirPathPhoto . $imageThumb, $dirPathPhoto . $imageThumb);
            $insertData['blog_image'] = $imageThumb;
        }
    }

    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "INSERT INTO `tbl_blogs` (`id`, `title`,`description`,`blog_image`, `status`, `added_date`) VALUES 
             (NULL, '$blog_title', '$blog_description', '$imageThumb', '$status','$now') ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $_SESSION['blog_message'] = "Blog Added successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "DELETE FROM tbl_blogs WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
