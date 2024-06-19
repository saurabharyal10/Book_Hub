<?php
include_once('../../../../book_store/connection/connection.php');
date_default_timezone_set('Asia/Kathmandu');
$now = date("Y-m-d H:i:s");

if ($_POST['action'] == 'add') {
    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
    $book_description = mysqli_real_escape_string($conn, $_POST['book_description']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);


    $dirPathPhoto = '../../data_informations/books_images/';
    if (!file_exists($dirPathPhoto)) {
        mkdir($dirPathPhoto, 0777, true);
    }

    $myuid = uniqid();
    if (!file_exists($myuid)) {
        $myuid = uniqid();
    }

    $uploadedPhotoName = $_FILES['book_image']['name'];
    $ext = strtolower(GetExtensionOfFile($uploadedPhotoName));
    if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'png' || $ext == 'PNG') {

        // $image = $myuid . '.' . $ext;
        $imageThumb = $myuid . '_thumb.' . $ext;

        if (ImgUpload('book_image', $dirPathPhoto, $imageThumb)) {
            ImageResizeWithCrop(600, 600, $dirPathPhoto . $imageThumb, $dirPathPhoto . $imageThumb);
            $insertData['book_image'] = $imageThumb;
        }
    }

    $conn = mysqli_connect("localhost", "root", "") or die("Cannot connect to the database");
    mysqli_select_db($conn, "book_store");
    $query = "INSERT INTO `tbl_books` (`id`,`book_name`,`book_description`,`book_image`,`author`,`category_name`,`status`,`position`,`added_date`) 
              VALUES 
             (NULL,'$book_name','$book_description','$imageThumb','$author','$category','Unpublish',NULL,'$now') ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $_SESSION['book_message'] = "Book Added successfully.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

function GetExtensionOfFile($file)
{
    $file_break = explode('.', $file);
    $count = count($file_break);
    return $file_break[$count - 1];
}
function ImgUpload($field, $dir_path, $filename)
{
    if ($_FILES[$field]['type'] == 'image/jpeg' || $_FILES[$field]['type'] == 'image/jpg' || $_FILES[$field]['type'] == 'image/pjpeg' || $_FILES[$field]['type'] == 'image/gif') {
        $_FILES[$field]['name'] = $filename;
        $uploadfile = $dir_path . $_FILES[$field]['name'];
        if (move_uploaded_file($_FILES[$field]['tmp_name'], $uploadfile)) return true;
        else return false;
    } else return false;
}
function ImageResizeWithCrop($newwidth, $newheight, $source, $destination)
{


    $nw = $newwidth; //The Width Of The Thumbnails
    $nh = $newheight; //The Height Of The Thumbnails
    $tpath = "images"; //Path To Place Where Thumbnails Are Uploaded. No Trailing Slash

    $img = $source;


    $dimensions = GetImageSize($img);

    $thname = $destination;

    $w = $dimensions[0];
    $h = $dimensions[1];

    $img2 = ImageCreateFromJpeg($img);
    $thumb = ImageCreateTrueColor($nw, $nh);
    $white = imagecolorallocate($thumb, 255, 255, 255);
    imagefill($thumb, 0, 0, $white);

    $wm = $w / $nw;
    $hm = $h / $nh;

    $h_height = $nh / 2;
    $w_height = $nw / 2;

    if ($w > $h) {
        $adjusted_width = $w / $hm;
        $half_width = $adjusted_width / 2;
        $int_width = $half_width - $w_height;
        ImageCopyResampled($thumb, $img2, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
        if (ImageJPEG($thumb, $thname, 95)) $err = false;
        else $err = true;
    } elseif (($w < $h) || ($w == $h)) {
        $adjusted_height = $h / $wm;
        $half_height = $adjusted_height / 2;
        $int_height = $half_height - $h_height;
        ImageCopyResampled($thumb, $img2, 0, -$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
        if (ImageJPEG($thumb, $thname, 95)) $err = false;
        else $err = true;
    } else {
        ImageCopyResampled($thumb, $img2, 0, 0, 0, 0, $nw, $nh, $w, $h);
        if (ImageJPEG($thumb, $thname, 95)) $err = false;
        else $err = true;
    }
    imagedestroy($img2);

    if ($err) return false;
    else return true;
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
