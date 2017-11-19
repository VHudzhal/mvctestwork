<?php
include('db.php');
session_start();
$session_id='1'; // User session id
$path = "../web/uploads";

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
include_once 'getExtension.php';
$imagename = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
if(strlen($imagename))
{
$ext = strtolower(getExtension($imagename));
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$uploadedfile = $_FILES['photoimg']['tmp_name'];

//Re-sizing image. 
include 'compressImage.php';
$widthArray = array(200,100,50); //You can change dimension here.
foreach($widthArray as $newwidth)
{
$filename=compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth);
echo "<img src='".$filename."' class='img'/>";
}

//Original Image
if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
{
//Insert upload image files names into user_uploads table
mysqli_query($db,"UPDATE `id2563280_mvctestwork`.tasks_list SET `image` = '$image' WHERE `id`='$id';");
echo "<img src='..web/uploads".$image."' class='preview'>";
}
else
echo "failed";
}
else
echo "Image file size max 1 MB"; 
}
else
echo "Invalid file format.."; 
}
else
echo "Please select image..!";
exit;
}
?>