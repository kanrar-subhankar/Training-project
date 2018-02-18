<?php
	session_start();
	$name="";
	if(isset($_SESSION['name'])){
		$name=$_SESSION['name'];
	if(isset($_REQUEST['comment'])){
		echo $name;
		if(!empty($_REQUEST['comment']) && $name!=""){
			$h=mysqli_connect('localhost','root','root','e-blood');
			$res=mysqli_query($h,"select * from e_blood where full_name='$name'");
			if(mysqli_affected_rows($h)){
				mysqli_query($h,"update  e_blood set comment='$_REQUEST[comment]' where full_name='$name'");
				echo "<font style='color:green'>Feedback sent</font>";
			}
		}
	else
		echo "<font style='color:red'>Please write something.</font>";
	}
	else
		header('location:topbar.php');
}
else
		echo "<font style='color:red'>Please login First</font>";
?>