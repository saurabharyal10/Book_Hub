<?php
$now = date("Y-m-d H:i:s");

if ($_POST['action'] == 'add') {
    // $book_name = $_POST['book_name'];
    // $book_description = $_POST['book_description'];
    // $author = $_POST['author'];
    $category_name = $_POST['category_name'];


    // $dirPathPhoto = '../../data_informations/books_images/';
    // if (!file_exists($dirPathPhoto)) {
    //     mkdir($dirPathPhoto, 0777, true);
    // }

    // $myuid = uniqid();
    // if (!file_exists($myuid)) {
    //     $myuid = uniqid();
    // }

    // $uploadedPhotoName = $_FILES['book_image']['name'];
    // $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));
    // if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG') {

    //     // $image = $myuid . '.' . $ext;
    //     $imageThumb = $myuid . '_thumb.' . $ext;

    //     if (ImgUpload('book_image', $dirPathPhoto, $imageThumb)) {
    //         ImageResizeWithCrop(600, 600, $dirPathPhoto . $imageThumb, $dirPathPhoto . $imageThumb);
    //         $insertData['book_image'] = $imageThumb;
    //     }
    // }

    $con = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($con, "book_store");
    $query = "INSERT INTO `tbl_book_categories` (`id`, `category_name`,`position`) VALUES 
             (NULL, '$category_name', NULL) ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $_SESSION['category_message'] = "Book Added successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

// if ($_POST['action'] == 'edit') {
//     $title = escape_data($_POST['title']);
//     $description = escape_data($_POST['description']);
//     $link_url = escape_data($_POST['link_url']);

//     $id = escape_data($_POST['id']);
//     $loggedInUser = $_SESSION['username'];

//     $dirPathMemberPhoto = '../user_uploads/misc-photos/';
//     if (!file_exists($dirPathMemberPhoto)) {
//         mkdir($dirPathMemberPhoto, 0777, true);
//     }

//     $myuid = uniqid();
//     if (!file_exists($myuid)) {
//         $myuid = uniqid();
//     }

//     $uploadedPhotoName = $_FILES['photo']['name'];
//     $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));
//     if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG') {

//         $image = $myuid . '.' . $ext;
//         $imageThumb = $myuid . '_thumb.' . $ext;
//         // dd($imageThumb);

//         if (ImgUpload('photo', $dirPathMemberPhoto, $image)) {
//             ImageResizeWithCrop(600, 600, $dirPathMemberPhoto . $image, $dirPathMemberPhoto . $imageThumb);
//             $insertData['thumbnail'] = $imageThumb;
//         }
//     }

//     $objqry->queryUpdate("UPDATE `tbl_home` SET 
//         `title` = '$title', 
//         `description` = '$description', 
//         `link_url` = '$link_url', 
//         `thumbnail` = '$imageThumb' WHERE id = '$id' LIMIT 1");

//     setErrorMsg('success', 'Template Updated Successfully');
//     header("Location: " . $_SERVER['HTTP_REFERER']);
// }

// if ($_GET['action'] == 'change_status') {
//     $id = escape_data($_GET['id']);
//     $db = 'tbl_home,id,status';
//     $chngstatus = new ChangeStatus;
//     $chngstatus->ChangeThisStatus($db, $id, 'Publish,Unpublish');
//     header("Location: " . $_SERVER['HTTP_REFERER']);
// }

// if ($_GET['action'] == 'delete') {
//     $id = escape_data($_GET['id']);
//     $objqry->queryDelete("DELETE FROM tbl_home WHERE id = '$id' LIMIT 1");

//     setErrorMsg('success', 'Template Deleted Successfully');
//     header("Location: " . $_SERVER['HTTP_REFERER']);
// }
