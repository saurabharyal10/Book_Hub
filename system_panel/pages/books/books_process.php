<?php
include_once('../../../../book_store/connection/connection.php');
include_once('../../../../book_store/functions/function.php');
date_default_timezone_set('Asia/Kathmandu');
$now = date("Y-m-d H:i:s");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    // Escape user inputs to prevent SQL injection
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_description = mysqli_real_escape_string($conn, $_POST['book_description']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    // Directory for storing uploaded images
    $dirPathPhoto = '../../data_informations/books_images/';
    if (!file_exists($dirPathPhoto)) {
        mkdir($dirPathPhoto, 0777, true);
    }

    // Generate unique ID for image filename
    $myuid = uniqid();

    // Get uploaded image details
    $uploadedPhotoName = $_FILES['book_image']['name'];
    $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));

    // Check if the uploaded file is an image
    if (in_array($ext, ['jpeg', 'jpg', 'png'])) {
        $imageThumb = $myuid . '_thumb.png'; // Use PNG to maintain transparency

        // Upload and resize image
        if (ImgUploadAndResize('book_image', $dirPathPhoto, $imageThumb, 600, 600)) {
            // Insert book data into database
            $query = "INSERT INTO `tbl_books` (`id`,`book_name`,`book_description`,`book_image`,`author`,`category_name`,`status`,`position`,`added_date`,`updated_date`) 
                      VALUES 
                      (NULL,'$book_name','$book_description','$imageThumb','$author','$category','Unpublish',NULL,NOW(),NOW())";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            // Set success message
            $_SESSION['book_message'] = "Book added successfully.";

            // Redirect back to previous page
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['book_message'] = "Failed to upload or resize image.";
        }
    } else {
        $_SESSION['book_message'] = "Invalid file format. Please upload JPEG or PNG images.";
    }
}

if ($_POST['action'] == 'edit') {
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_description = mysqli_real_escape_string($conn, $_POST['book_description']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $status = "Unpublish";
    $position = "Null";
    $updated_date = $now;

    $id = $_POST['id'];
    $id = mysqli_real_escape_string($conn, $id);

    // Fetch the previous image from the database
    $sql = "SELECT `added_date`, `book_image` FROM `tbl_books` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $added_date = $row['added_date'];
    $previousImage = $row['book_image']; // Store the previous image name

    // Directory for storing uploaded images
    $dirPathPhoto = '../../data_informations/books_images/';
    if (!file_exists($dirPathPhoto)) {
        mkdir($dirPathPhoto, 0777, true);
    }

    // Initialize the variable for the new image
    $newImage = $previousImage; // Default to previous image

    // Check if a new image was uploaded
    if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] == 0) {
        // Generate unique ID for image filename
        $myuid = uniqid();

        // Get uploaded image details
        $uploadedPhotoName = $_FILES['book_image']['name'];
        $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));

        // Check if the uploaded file is an image
        if (in_array($ext, ['jpeg', 'jpg', 'png'])) {
            $imageThumb = $myuid . '_thumb.png'; // Save as PNG format to maintain transparency

            // Upload and resize image
            if (ImgUploadAndResize('book_image', $dirPathPhoto, $imageThumb, 600, 600)) {
                // Image upload and resizing successful
                $newImage = $imageThumb; // Update the new image variable
                $_SESSION['book_message'] = "Image uploaded and resized successfully.";
            } else {
                $_SESSION['book_message'] = "Failed to upload or resize image.";
            }
        } else {
            $_SESSION['book_message'] = "Invalid file format. Please upload JPEG or PNG images.";
        }
    }

    // Update the database
    $query = "UPDATE `tbl_books` SET 
        `book_name` = '$book_name', 
        `book_description` = '$book_description', 
        `book_image` = '$newImage', 
        `author` = '$author', 
        `category_name` = '$category', 
        `status` = '$status', 
        `position` = '$position', 
        `added_date` = '$added_date', 
        `updated_date` = '$now' 
        WHERE `id` = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $_SESSION['book_message'] = "Book Updated Successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


if ($_POST['action'] == 'sold') {
    $id = $_POST['id'];
    $status = "sold";
    var_dump($now);
    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");

    $query = "UPDATE tbl_books SET `status` = '$status', `added_date` = '$now' WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "DELETE FROM tbl_books WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
