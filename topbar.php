<?php 
session_start(); 

$x='';
if(isset($_SESSION['name']) && isset($_REQUEST['id'])){
  $x=$_SESSION['name'];
}
if(isset($_REQUEST['error'])){
    echo "<script type='text/javascript'>";
    echo "alert('To buy you need to login')";
    echo "</script>";
}


?>
<html>
<head>
<title>
    Online Blood Bank
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	   <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
     <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Roboto" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">      
     <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=Baloo+Da|Cookie" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/scroll.js"></script>
    <link rel="stylesheet" href="style/main.css" type="text/css">
<script type="text/javascript">
  function appear(val){
    obj=new XMLHttpRequest();
    obj.open("get","locationList.php?id="+val,true);
    obj.send();
    obj.onreadystatechange=function(){
      if(obj.status==200 && obj.readyState==4){
        document.getElementById("grp").innerHTML=obj.responseText;
      }
    }
  }
    function show(val){
    var l=$("#loc").val();
    var pass=encodeURIComponent(val);
    obj1=new XMLHttpRequest();
    obj1.open("get","price.php?bgroup="+pass+"&place="+l,true);
    obj1.send();
    obj1.onreadystatechange=function(){
      if(obj1.status==200 && obj1.readyState==4){
        document.getElementById("selection").innerHTML=obj1.responseText;
      }
    }
  }
  function send(){
    var val=$('#area').val();
    obj2=new XMLHttpRequest();
    obj2.open("get","feedback.php?comment="+val,true);
    obj2.send();
    obj2.onreadystatechange=function(){
      if(obj2.status==200 && obj2.readyState==4){
         document.getElementById("selection").innerHTML=obj2.responseText;
      }
    }
  }
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>

</head>
<body>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:rgb(119, 5, 47);text-align:center">Hi <?php echo $x; ?> </h4>
        </div>
        <div class="modal-body">
          <p  style="color:rgb(147, 47, 85);text-align:center">Welcome to Blood Bank</p>
        </div>
       
      </div>
    </div>
  </div>
<nav class="nav navbar-default navbar-fixed-top" >
  <div class="container-fluid" id="upper">
    <div class="navbar-header">
      <h2 class="nav navbar-nav navbar-left"></h2>
          <button class="navbar-toggle" data-target="#mynav" data-toggle="collapse" type="button">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
          </button>
    </div>

  <div class="collapse navbar-collapse" id="mynav">
    <ul class="nav navbar-nav navbar-right">
      <li><a data-scroll class="scroll" href="#middle">Home</a></li>
      <li><a data-scroll class="scroll" href="#buying">Search-Blood</a></li>
      <li> <a data-scroll class="scroll" href="#contact">Contact us</a></li>
        <li> <a data-scroll class="scroll" href="login.php"><?php if(isset($_REQUEST['id']))
          echo "Logout";
          else
            echo "Login | Register";
          ?></a></li>
    </ul>
  </div>
</div>
</nav>
<div class="row" id="middle">
  <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
     <h2 class="mainText">AVAILABLE IN YOUR CITY</h2>
     <p class="subText">BUY IN AFFORDABLE PRICE</p>
     </div>
  </div>
</div>
<div class="row" id="buying">
  <div class="col-md-6 col-md-offset-4">
     <h2 class="sectionText">SEARCH FOR BLOOD</h2>
  </div>
  <div class="col-md-3 col-md-offset-5" id="bod">
  </div>
  <div class="col-md-6 col-md-offset-3">
    <div class="col-md-6">
      <select name="location" onchange="appear(this.value)" id="loc">
        <option>Select location</option>
          <?php
                $h=mysqli_connect('localhost','root','root','e-blood');
                $result=mysqli_query($h,"select distinct location from blood");
                while($r=mysqli_fetch_array($result)){
                    echo "<option>$r[0]</option>";
                } 
          ?>
      </select>
    </div>
    <div class="col-md-6" id="side">
      <select name="blood_grp" id="grp" onchange="show(this.value)">
        <option>----</option>
      </select>
    </div>
    </div>
    <div class="col-md-12" id="selection">
    <?php
        $h=mysqli_connect('localhost','root','root','e-blood');
        $res=mysqli_query($h,"select * from blood");
        $i=0;
        while($r=mysqli_fetch_array($res)){
          if($i<4){
          echo "<div class='col-md-2 col-md-offset-1'>";
          echo "<img src='images/4.jpg'/>";
          echo "<ul class='list-inline' style='margin-left:5%'><li><h4  style='color:rgb(122, 30, 50)'>GROUP:</h4></li><li><h4  style='color:rgb(135, 21, 24);'>$r[2]</h4></li></ul>";
          echo "<ul class='list-inline' style='margin-left:5%'><li><h4  style='color:rgb(122, 30, 50)'>PRICE:</h4></li><li><h4  style='color:rgb(135, 21, 24);'>$r[3]</h4></li></ul>";
         echo "<a href='user_profile.php'><button type='button' class='btn btn-default' style='background:rgb(122, 30, 50);text-align:center;border:0px;color:white;width:100%;font-family:bold'>BUY</button></a>";
          echo "</div>";
          $i++;
        }
        }


    ?>
    </div>
</div>
  <div class="row" id="feedback">
    <div class="col-md-6 col-md-offset-3">
      <h2 style="text-align:center">GIVE YOUR FEEDBACK</h2>
    </div>
     <div class="col-md-6 col-md-offset-3">
      <div id="d1"></div>
    </div>
    <div class="col-md-6 col-md-offset-3">

      <textarea  cols="50" name="write" placeholder="Please write something" id="area"></textarea>
    </div>
    <div class="col-md-6 col-md-offset-3">
      <input type="submit" name="feed" value="SEND YOUR FEEDBACK" onclick="send()"/>
    </div>
    <div class="col-md-12" style="height:50px"></div>
  </div>
<div class="row" id="contact">
      <div class="col-md-4 col-md-offset-4">
          <h2>CONTACT US</h2>
      </div>
      <div class="col-md-6 col-md-offset-3">
        <div class="col-md-3 col-md-offset-1">
           <a href="facebook.com"><i class="fa fa-facebook-square fa-3x" style="color:rgb(165, 53, 91)" aria-hidden="true"></i></a>
             <label>Our Facebook page</label>
        </div>
        <div class="col-md-3 col-md-offset-1">
             <a href="facebook.com"><i class="fa fa-linkedin-square fa-3x" style="color:rgb(165, 53, 91)" aria-hidden="true"></i></a>
               <label>Our Linkedin page</label>
        </div>
        <div class="col-md-3 col-md-offset-1">
             <a href="facebook.com"><i class="fa fa-twitter-square fa-3x" style="color:rgb(165, 53, 91)" aria-hidden="true"></i></a>
               <label>Our Twitter page</label>
        </div>
      </div>
</div>

<div class="row" id="footer">
  <div class="col-md-6 col-md-offset-3">
        <h4>Visit Important Links</h4>
  </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-3 col-md-offset-1"><a href="facebook.com">Like us on facebook</a></div>
         <div class="col-md-3 col-md-offset-1"><a href="google.com">Check out more</a></div>
          <div class="col-md-3 col-md-offset-1"><a href="facebook.com">Career</a></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-3 col-md-offset-1"><label>Call us:858475674</label></div>
         <div class="col-md-3 col-md-offset-1"><label>Query:someone@gmail.com</label></div>

    </div>
</div>
</body>
</html>