<?php
$h=mysqli_connect('localhost','root','root','e-blood');
if(isset($_REQUEST['sub1'])){
if(isset($_REQUEST['user_name1']) && isset($_REQUEST['user_mail1']) && isset($_REQUEST['user_pwd1'])){
	$name=mysqli_real_escape_string($h,$_REQUEST['user_name1']);
	$mail=mysqli_real_escape_string($h,$_REQUEST['user_mail1']);
	$password=$_REQUEST['user_name1'];
	$encrypt_password=md5($password);
	$qry="select * from e_blood where e_mail='$mail'";
	mysqli_query($h,$qry);
	if(mysqli_affected_rows($h)>0){
		header('location:login.php?checker=1');
	}
	else{
		mysqli_query($h,"insert into e_blood(full_name,e_mail,password) values('$name','$mail','$encrypt_password')");
		header('location:topbar.php');
		}
	}
}
else
	header('location:login.php');





?>