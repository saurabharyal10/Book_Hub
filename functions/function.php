
<?php
function truncateDescription($description, $limit)
{
    // Explode the description into an array of words
    $words = explode(" ", $description);

    // Check if the number of words exceeds the limit
    if (count($words) > $limit) {
        // Truncate the array to the specified limit
        $words = array_slice($words, 0, $limit);

        // Join the truncated words back into a string
        $truncated_description = implode(" ", $words);

        // Add "..." to indicate truncation
        $truncated_description .= " ...";

        return $truncated_description;
    } else {
        // If the number of words is within the limit, return the original description
        return $description;
    }
}

// Function to handle image upload and resize
function ImgUploadAndResize($fileKey, $targetDir, $targetFilename, $maxWidth, $maxHeight)
{
    $targetPath = $targetDir . $targetFilename;
    $uploadedFilePath = $_FILES[$fileKey]['tmp_name'];

    // Get image dimensions
    list($width, $height, $type, $attr) = getimagesize($uploadedFilePath);

    // Calculate new dimensions
    if ($width > $maxWidth || $height > $maxHeight) {
        $ratio = $width / $height;

        if ($ratio > 1) {
            $newWidth = $maxWidth;
            $newHeight = $maxWidth / $ratio;
        } else {
            $newWidth = $maxHeight * $ratio;
            $newHeight = $maxHeight;
        }
    } else {
        $newWidth = $width;
        $newHeight = $height;
    }

    // Create resized image
    $sourceImage = imagecreatefromstring(file_get_contents($uploadedFilePath));
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

    // Preserve transparency if PNG
    if ($type === IMAGETYPE_PNG) {
        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        $transparent = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
        imagefilledrectangle($resizedImage, 0, 0, $newWidth, $newHeight, $transparent);
    }

    // Resize and save image
    imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    $success = imagepng($resizedImage, $targetPath); // Save as PNG (you can change format as needed)

    // Free memory
    imagedestroy($sourceImage);
    imagedestroy($resizedImage);

    return $success;
}

// function ImageResizeWithCrop($newwidth, $newheight, $source, $destination)
// {


//     $nw = $newwidth; //The Width Of The Thumbnails
//     $nh = $newheight; //The Height Of The Thumbnails
//     $tpath = "images"; //Path To Place Where Thumbnails Are Uploaded. No Trailing Slash

//     $img = $source;


//     $dimensions = GetImageSize($img);

//     $thname = $destination;

//     $w = $dimensions[0];
//     $h = $dimensions[1];

//     $img2 = ImageCreateFromJpeg($img);
//     $thumb = ImageCreateTrueColor($nw, $nh);
//     $white = imagecolorallocate($thumb, 255, 255, 255);
//     imagefill($thumb, 0, 0, $white);

//     $wm = $w / $nw;
//     $hm = $h / $nh;

//     $h_height = $nh / 2;
//     $w_height = $nw / 2;

//     if ($w > $h) {
//         $adjusted_width = $w / $hm;
//         $half_width = $adjusted_width / 2;
//         $int_width = $half_width - $w_height;
//         ImageCopyResampled($thumb, $img2, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
//         if (ImageJPEG($thumb, $thname, 95)) $err = false;
//         else $err = true;
//     } elseif (($w < $h) || ($w == $h)) {
//         $adjusted_height = $h / $wm;
//         $half_height = $adjusted_height / 2;
//         $int_height = $half_height - $h_height;
//         ImageCopyResampled($thumb, $img2, 0, -$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
//         if (ImageJPEG($thumb, $thname, 95)) $err = false;
//         else $err = true;
//     } else {
//         ImageCopyResampled($thumb, $img2, 0, 0, 0, 0, $nw, $nh, $w, $h);
//         if (ImageJPEG($thumb, $thname, 95)) $err = false;
//         else $err = true;
//     }
//     imagedestroy($img2);

//     if ($err) return false;
//     else return true;
// }

function ImageResize($new_width, $new_height, $source_file, $destination_file)
{
    // Detect MIME type to handle jpg, png, and gif correctly
    $mime_type = mime_content_type($source_file);

    switch ($mime_type) {
        case 'image/jpeg':
        case 'image/jpg':  // Handle both .jpg and .jpeg
            $src_image = imagecreatefromjpeg($source_file);
            break;
        case 'image/png':
            $src_image = imagecreatefrompng($source_file);
            break;
        case 'image/gif':
            $src_image = imagecreatefromgif($source_file);
            break;
        default:
            die('Unsupported image format: ' . $mime_type);
    }

    // Get original image dimensions
    list($width, $height) = getimagesize($source_file);

    // Calculate aspect ratio
    $aspect_ratio = $width / $height;
    $new_aspect_ratio = $new_width / $new_height;

    if ($aspect_ratio > $new_aspect_ratio) {
        // Limit by width, calculate new height
        $resize_width = $new_width;
        $resize_height = $new_width / $aspect_ratio;
    } else {
        // Limit by height, calculate new width
        $resize_height = $new_height;
        $resize_width = $new_height * $aspect_ratio;
    }

    // Create a new image resource with the resized dimensions
    $dst_image = imagecreatetruecolor($resize_width, $resize_height);

    // For PNG images, preserve transparency
    if ($mime_type == 'image/png') {
        imagealphablending($dst_image, false);
        imagesavealpha($dst_image, true);
    }

    // Resize the image
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $resize_width, $resize_height, $width, $height);

    // Save the resized image based on the MIME type
    switch ($mime_type) {
        case 'image/jpeg':
        case 'image/jpg':
            imagejpeg($dst_image, $destination_file);
            break;
        case 'image/png':
            imagepng($dst_image, $destination_file);
            break;
        case 'image/gif':
            imagegif($dst_image, $destination_file);
            break;
    }

    // Free up memory
    imagedestroy($src_image);
    imagedestroy($dst_image);
}
function ImageResizeToExactDimensions($new_width, $new_height, $source_file, $destination_file)
{
    // Detect MIME type to handle jpg, png, and gif correctly
    $mime_type = mime_content_type($source_file);

    switch ($mime_type) {
        case 'image/jpeg':
        case 'image/jpg':
            $src_image = imagecreatefromjpeg($source_file);
            break;
        case 'image/png':
            $src_image = imagecreatefrompng($source_file);
            break;
        case 'image/gif':
            $src_image = imagecreatefromgif($source_file);
            break;
        default:
            die('Unsupported image format: ' . $mime_type);
    }

    // Get original image dimensions
    list($width, $height) = getimagesize($source_file);

    // Create a new blank image with the new dimensions (1920x620)
    $dst_image = imagecreatetruecolor($new_width, $new_height);

    // For PNG images, preserve transparency
    if ($mime_type == 'image/png') {
        imagealphablending($dst_image, false);
        imagesavealpha($dst_image, true);
    }

    // Resize the image to fit exactly 1920x620 without maintaining the aspect ratio
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save the resized image based on the MIME type
    switch ($mime_type) {
        case 'image/jpeg':
        case 'image/jpg':
            imagejpeg($dst_image, $destination_file);
            break;
        case 'image/png':
            imagepng($dst_image, $destination_file);
            break;
        case 'image/gif':
            imagegif($dst_image, $destination_file);
            break;
    }

    // Free up memory
    imagedestroy($src_image);
    imagedestroy($dst_image);
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

function generate_unique_no()
{
    $pin_Length = 12;
    $pin_Range = 1;
    $acceptednumbers = '123456789';
    $max = strlen($acceptednumbers) - 1;
    $pin_num = null;

    for ($x = 0; $x < $pin_Range; $x++) {
        for ($i = 0; $i < $pin_Length; $i++) {
            $pin_num .= $acceptednumbers[rand(0, $max)];
        }
        $retrn_value = $pin_num;
        $pin_num = null;
    }
    return $retrn_value;
}

function checkValueExist($conn, $table, $column, $value)
{
    $query = "SELECT * FROM `$table` WHERE `$column` = '$value'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    $num = mysqli_num_rows($result);

    return $num;
}

?>