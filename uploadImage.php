<?php
session_start();
$h=mysqli_connect('localhost','root','root','e-blood');
$name="";
if(isset($_REQUEST['x'])){
	if(isset($_SESSION['name'])){
		$name=$_SESSION['name'];
		if(isset($_FILES["file"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
			)
			&& in_array($file_extension, $validextensions)) {
				if ($_FILES["file"]["error"] > 0)
				{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
				}
				else
				{
					$sourcePath = $_FILES['file']['tmp_name'];
					$targetPath = "upload/".$_FILES['file']['name']; 
					move_uploaded_file($sourcePath,$targetPath) ;
				}
			}
		else
		{
		echo "<span id='invalid'>***Invalid file Size or Type***<span>";
		}
		}

	}
	else{

	}
}

else{
	header("location:user_profile.php");
}
?>