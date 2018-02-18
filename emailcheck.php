<?php
	$h=mysqli_connect('localhost','root','root','e-blood');
	if(isset($_REQUEST['id'])){
		$mail=mysqli_real_escape_string($h,$_REQUEST['id']);
		mysqli_query($h,"select * from e_blood where e_mail='$mail'");
		if(mysqli_affected_rows($h)>0)
			echo "<p style='color:red'>Already exists this mail id</p>";

	}


?>