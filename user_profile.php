<?php
session_start();

?>

<html>
<head>
<title>
   User profile
</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="style/user-profile.css" type="text/css">
</head>
<body>
	<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
		<div class="col-md-2 col-md-offset-5" id="cazz">
			<div id="image_preview"  style="border-radius:100%;">
				<img id="previewing" src="upload/noimage.png" style="border-radius:100%;"/>
			</div>
			<div id="selectImage">
				<input type="file" name="file" id="file" required />
				<input type="submit" value="Upload" class="submit" />
			</div>
			<div id="message"></div>
		</div>
	</form>
<script type="text/javascript">
	$(document).ready(function (e) {
	$("#uploadimage").on('submit',(function(e) {
	e.preventDefault();
	var x=Math.random();
	$("#message").empty();
	$.ajax({
	url: "uploadImage.php?id="+x, // Url to which the request is send
	type: "POST",             // Type of request to be send, called as method
	data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
	contentType: false,       // The content type used when sending data to the server.
	cache: false,             // To unable request pages to be cached
	processData:false,        // To send DOMDocument or non processed data file it is set to false
	success: function(data)   // A function to be called if request succeeds
	{
		alert(data);
	}
	});
	}));

	// Function to preview image after validation
	$(function() {
	$("#file").change(function() {
	$("#message").empty(); // To remove the previous error message
	var file = this.files[0];
	var imagefile = file.type;
	var match= ["image/jpeg","image/png","image/jpg"];
	if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
	{
	$('#previewing').attr('src','noimage.png');
	$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
	return false;
	}
	else
	{
	var reader = new FileReader();
	reader.onload = imageIsLoaded;
	reader.readAsDataURL(this.files[0]);
	}
	});
	});
	function imageIsLoaded(e) {
		$("#file").css("color","green");
		$('#image_preview').css("border-radius", "100%");
		$('#previewing').css("border-radius", "100%");
		$('#previewing').css("width", "100%");
		$('#previewing').css("height", $('#previewing').width());
		$('#previewing').attr('src', e.target.result);
	};
	});

</script>
</body>
</html>