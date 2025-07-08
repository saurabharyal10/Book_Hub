<?php
include_once('../../../../book_store/connection/connection.php');
include_once('../../../../book_store/functions/function.php');

$now = date("Y-m-d H:i:s");

if ($_POST['action'] == 'add') {
    $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $blog_description = mysqli_real_escape_string($conn, $_POST['blog_description']);
    $status = "Unpublish";

    // Initialize imageThumb variable
    $imageThumb = '';

    $dirPathPhoto = '../../data_informations/blog_images/';
    if (!file_exists($dirPathPhoto)) {
        mkdir($dirPathPhoto, 0777, true);
    }

    $myuid = uniqid();
    $uploadedPhotoName = $_FILES['blog_image']['name'];
    $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));

    // Debugging Step: Check if the uploaded file is detected
    if (empty($uploadedPhotoName)) {
        die("No image file uploaded.");
    }

    // Ensure only allowed image types are processed
    if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {
        $imageThumb = $myuid . '_image.' . $ext;

        // Check if ImgUpload returns true
        if (ImgUpload('blog_image', $dirPathPhoto, $imageThumb)) {
            ImageResizeToExactDimensions(1920, 620, $dirPathPhoto . $imageThumb, $dirPathPhoto . $imageThumb);
            $insertData['blog_image'] = $imageThumb;
        }
    } else {
        die("Invalid file type. Only jpg and png allowed.");
    }

    // Debugging Step: Log the value of $imageThumb
    if (empty($imageThumb)) {
        die("Image not set in the variable.");
    }

    // Insert into the database
    $query = "INSERT INTO `tbl_blogs` (`id`, `title`, `description`, `blog_image`, `status`, `added_date`) 
              VALUES (NULL, '$blog_title', '$blog_description', '$imageThumb', '$status', '$now')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if ($result) {
        echo "Blog added successfully with image.";
    } else {
        echo "Failed to add blog to the database.";
    }

    $_SESSION['blog_message'] = "Blog Added successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}


if ($_POST['action'] == 'edit') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = "Unpublish";
    $id = $_POST['id'];

    $dirPathPhoto = '../../data_informations/blog_images/';
    if (!file_exists($dirPathPhoto)) {
        mkdir($dirPathPhoto, 0777, true);
    }

    $newImage = ''; // Initialize $newImage to an empty string

    if ($_FILES['blog_image']['size'] > 0) {
        $uploadedPhotoName = $_FILES['blog_image']['name'];
        $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));
        if (in_array($ext, ['jpeg', 'jpg', 'png'])) {
            $myuid = generate_unique_no();
            $image = $myuid . '.' . $ext;
            $imageThumb = $myuid . '_thumb.' . $ext;
            $maxsize = 1048576;

            if (ImgUpload('blog_image', $dirPathPhoto, $imageThumb)) {
                ImageResizeToExactDimensions(1920, 620, $dirPathPhoto . $imageThumb, $dirPathPhoto . $imageThumb);
                $newImage = $imageThumb; // Assign new image to $newImage
            }
        }
    } else {
        // If no new image, keep the existing one
        $query = "SELECT blog_image FROM tbl_blogs WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $newImage = $row['blog_image']; // Use the previous image
        }
    }

    $query = "UPDATE tbl_blogs SET 
    `title` = '$title', 
    `description` = '$description', 
    `blog_image` = '$newImage', 
    `added_date` = '$now' 
    WHERE `id` = '$id' LIMIT 1";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $_SESSION['blog_message'] = "Blog Updated Successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if ($_POST['action'] == 'status_change') {
    $id = $_POST['id'];
    $status_change = $_POST['status_change'];

    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");

    $query = "UPDATE tbl_blogs SET `status` = '$status_change' WHERE `id` = '$id' LIMIT 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}


if ($_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "DELETE FROM tbl_blogs WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
