
	 <?php
                $h=mysqli_connect('localhost','root','root','e-blood');
                if(isset($_REQUEST['id'])){
	                $result=mysqli_query($h,"select distinct b_group from blood where location='$_REQUEST[id]'");
	                echo "<option>Select Blood Group</option>";
	                while($r=mysqli_fetch_array($result)){
	                  	echo "<option>$r[0]</option>";
	                }
	               }
	               else
	               	header('location:topbar.php');	

          ?>

