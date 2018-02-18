 <?php
    $h=mysqli_connect('localhost','root','root','e-blood');
    if(isset($_REQUEST['bgroup']) && isset($_REQUEST['place'])){
	              $result=mysqli_query($h,"select * from blood where b_group='{$_REQUEST['bgroup']}' and location='$_REQUEST[place]'");
	 
	               while($r=mysqli_fetch_array($result)){
	               		 echo "<div class='col-md-2 col-md-offset-1'>";
          echo "<img src='images/4.jpg'/>";
          echo "<ul class='list-inline' style='margin-left:5%'><li><h4  style='color:rgb(122, 30, 50)'>GROUP:</h4></li><li><h4  style='color:rgb(135, 21, 24);'>$r[2]</h4></li></ul>";
          echo "<ul class='list-inline' style='margin-left:5%'><li><h4  style='color:rgb(122, 30, 50)'>PRICE:</h4></li><li><h4  style='color:rgb(135, 21, 24);'>$r[3]</h4></li></ul>";
         echo "<a href='user_profile.php?id=1'><button type='button' class='btn btn-default' style='background:rgb(122, 30, 50);text-align:center;border:0px;color:white;width:100%;font-family:bold'>BUY</button></a>";
          echo "</div>";

	               }
	               
	  	
	}
	else
		header('location:topbar.php');

?>

