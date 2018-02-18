<?php
session_start();
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
		echo "<script type='text/javascript'>";
	    echo "alert('An account exists')";
	    echo "</script>";
    
	}
	else{
		mysqli_query($h,"insert into e_blood(full_name,e_mail,password) values('$name','$mail','$encrypt_password')");
		$_SESSION['name']=$name;
		$_SESSION['mail']=$mail;
		header('location:topbar.php?id='.md5($r['full_name']."/"));
		}
	}
}
	/*if(isset($_REQUEST['checker'])){
		$checkUser=$_REQUEST['checker'];
		if($checkUser==1){
			echo "<script type='text/javascript'>";
			echo "alert('An account exists')";
			echo "window.location=window.location";
			echo "</script>";
		}
	}*/
	$msg='';
	$h=mysqli_connect('localhost','root','root','e-blood');
	if(isset($_REQUEST['sub'])){
		if(isset($_REQUEST['user_mail']) && isset($_REQUEST['user_pwd'])){
			$mail=mysqli_real_escape_string($h,$_REQUEST['user_mail']);
			$password=$_REQUEST['user_pwd'];
			$encrypt_password=md5($password);
			$result=mysqli_query($h,"select * from e_blood where e_mail='$mail' and password='$encrypt_password'");
			if(mysqli_affected_rows($h)>0){
				$r=mysqli_fetch_assoc($result);
				$_SESSION['name']=$r['full_name'];
				$_SESSION['mail']=$mail;
				header('location:topbar.php?id='.md5($r['full_name']."/"));
			}
			else
				$msg="No such user found.please register to use.";
		}
	}
?>
<html>
<head>
<title>
  	Login
</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="style/login.css" type="text/css">
	  <script>
	function checkId(val){
		obj=new XMLHttpRequest();
		obj.open("post","emailcheck.php?id="+val,true);
		obj.send();
		obj.onreadystatechange=function(){
			if(obj.status==200 && obj.readyState==4){
				document.getElementById("d1").innerHTML=obj.responseText;
			}
		}
	}


</script>
</head>
<body style="background:grey">
<div class="row">
	<div class="col-md-8 col-md-offset-2" id="out">
		<div class="col-md-3" id="outer">
			<p>Use it in very simple way</p><!--description and put the logo-->
		</div>
		<!--Input section-->
		<div class="col-md-6" id="left">
			<ul class="list-inline">
			<li><button type="button" id="sign_in" style="background:none;border:0px">Signin</button></li>
			<li><button type="button" id="sign_up" style="background:none;border:0px">Signup</button></li>
			</ul>
			<div id="initial">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="logged" autocomplete="off">
					<div><?php echo "<p style='color:red'>$msg</p>" ?></div>
					<label>Enter your mail:</label>
					<input type="text" name="user_mail" value="" readonly onfocus="this.removeAttribute('readonly');" id="usr_mail" autocomplete="off" placeholder=""/>
					<label>Enter password:</label>
					<input type="password" name="user_pwd" placeholder="" readonly onfocus="this.removeAttribute('readonly');" autocomplete="off" id="usr_pwd"/>
					<!--Error in login then change password-->
					<input type="submit" name='sub' value="Secure Login" id="log_sub"/>
				</form>
			</div>
			<div id="later">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="register" autocomplete="off">
					<div id="d1"></div>
					<label>Enter Username:</label>
					<input type="text"  name="user_name1" value=""  id="usr_name" readonly onfocus="this.removeAttribute('readonly');" onblur="checkName(this.value)" placeholder=""/>
					<label>Enter Email:</label>
					<input type="text" name="user_mail1"  value="" onblur="checkId(this.value)" readonly onfocus="this.removeAttribute('readonly');" id="usr_mail1" placeholder=""/>
					<label>Enter Password:</label>
					<input type="password" name="user_pwd1" placeholder=""  autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" id="usr_pwd1"/>
					<input type="submit" name='sub1' value="Sign Up" id="log_sub" onsubmit="checkReg()" />
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("register").reset();
	document.getElementById("logged").reset();
	$('#sign_in').css('color','rgb(119, 5, 47)');
	$('#sign_in').css('border-bottom','2px solid rgb(119, 5, 47)');
	$('#left').show();
	$('#later').hide();
	$('input').text("");

});

	$('#sign_up').click(function(){
		$('#initial').hide();
		$('#later').show();
		$('#sign_in').css('color','rgb(174,181,193)')
		$('#sign_up').css('color','rgb(119, 5, 47)');
		$('#sign_up').css('border-bottom','2px solid rgb(119, 5, 47)');
		$('#sign_in').css('border','0px');
		
	});
	$('#sign_in').click(function(){
		$('#initial').show();
		$('#later').hide();
		$('#sign_up').css('color','rgb(174,181,193)')
		$('#sign_in').css('color','rgb(119, 5, 47)');
		$('#sign_in').css('border-bottom','2px solid rgb(119, 5, 47)');
		$('#sign_up').css('border','0px');
		
	});
	$('#register').submit(function(event){
		var name=$('#usr_name').val();
		var len=name.length;
		var pass=$('#usr_pwd1').val();
		var mail_id=$('#usr_mail1').val();
		if(name=='' || mail_id==''){
			alert('Name and email can not be empty');
			window.location=window.location;
			return false;
			
		}
		else {
			return true;
		}

	});
	$('#logged').submit(function(){
		var mailId=$('#usr_mail').val();
		if(mailId==''){
			alert('mail Id can not be empty');
			window.location=window.location;
			return false;
		}
		else
			return true;
	});

</script>
</body>
</html>