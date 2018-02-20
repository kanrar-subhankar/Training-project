<?php
session_start();
$h=mysqli_connect('localhost','root','root','e-blood');
$x=1;
$num=md5(mt_rand());
/*if(isset($_REQUEST['id'])){
	$x=1;
}
else{
	$x=0;
}
*/
if(isset($_REQUEST['id'])){
	if(isset($_SESSION['name'])){
		$name=$_SESSION['name'];
	
		if(isset($_FILES['file']['type'])){
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			$img_name=$_FILES["file"]["name"];
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath); 
			$s=mysqli_query($h,"update  e_blood set imagepath='$targetPath' where full_name='$name'");
			
		}
	}
	else{
		header("location:topbar.php");
	}
}
else
	header("location:topbar.php");
?>