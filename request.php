<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Be Instrumental &mdash; Buy the latest musical instruments</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/icomoon.css">

	<link rel="stylesheet" href="css/themify-icons.css">

	<link rel="stylesheet" href="css/bootstrap.css">


	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">


	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/pro1.css">
	<link rel="stylesheet" href="css/002.css">


	<script src="js/modernizr-2.6.2.min.js"></script>


	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">

	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="productlist.php">Home <em></em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>

						<form style="float:right" method="POST"  >

              <?php
            	include 'db_handler.php';

            	  $sql2="SELECT * FROM project WHERE email='$_SESSION[email]';";
            	  $result2=mysqli_query($conn,$sql2);

            	      if($row2=mysqli_fetch_assoc($result2)){
            	        $_SESSION['wallet']=$row2['wallet'];
            	        $firstName=$row2['firstName'];
                      $lastName=$row2['lastName'];
              				$email=$row2['email'];
            $product=$row2['product'];
            $image=$row2['imglink'];
            $_SESSION['f']=$firstName;
            	      }
                   echo "<img src='$image'style='height:50px;width:50px ;border-radius:50%;'>";
                     //echo "<img src='assets/default.png' style='height: 25px; width:25px;'>";
					  echo "<input class=i1 type=submit name=id value=$firstName style='border:0px solid;background-color: transparent;margin-left:15px; margin-right:15px;padding:12px 14px;color:white;font-size:17px;'>";

                  
                  if(isset($_POST['id'])){
                  header("location:profile.php");
                  }
                  ?>
                  <?php
                  echo "<form method='POST' >";
                  		echo "<input type=submit name=LOGOUT value=LOGOUT style='color:  white;
                    background-color: transparent; margin-left:5px; margin-right:5px; height: 30px;border:1px solid;border-radius: 5px;'/>";
                  	echo "</form>";
                  	if(isset($_POST['LOGOUT'])){
                  		session_destroy();
                  		header("location: index.php");
                  	}
                  ?>
					  </form>

					</ul>
				</div>
			</div>

		</div><!-- oi thik kor naa dekhe maa khete dakche! noythhao haaa jaa katlam!ok
    -->
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/1111.jpg)">
    <div class="div">
  <form method="POST">
  <?php
  include_once 'db_handler.php';

    if(isset($_POST['clicked']))
  	{//r e ogulo kono factor naa!!! session variable hole problem hoto.ok
     
  $a=array(key($_POST['clicked']),key($_POST['clicked2']),key($_POST['clicked3']),key($_POST['clicked4']),key($_POST['clicked5']));
                    $_SESSION['imgg']=$a[4];

   echo '<img style="height:80px; width:80px; border: 0px solid; border-radius:100%;" src="'.$_SESSION['imgg'].'">';

  echo "
  <p>First Name : $a[0]</p>
  <p>Last Name  : $a[1]</p>
  <p>Email id   : $a[2]</p>";
  $_SESSION['re']=$a[3];
  $_SESSION['em']=$a[2];
  echo "<p>Available balance :INR $a[3]</p>";
  echo "<input type=text name=request placeholder=request money class='i1'/><br>
  	<button class=b3 name=sub_button>REQUEST</button>";
    
  }
    ?>
  <?php
  if(isset($_POST['sub_button'])){


  if($_POST['request']<=$_SESSION['re']){

 $sqli="UPDATE project SET op='1' WHERE email='$_SESSION[em]';";
 $sqli2="UPDATE project SET nameReq='$_SESSION[f]' WHERE email='$_SESSION[em]';";
 $sqli3="UPDATE project SET bal=$_POST[request] WHERE email='$_SESSION[em]';";

 mysqli_query($conn,$sqli);
  mysqli_query($conn,$sqli2);
   mysqli_query($conn,$sqli3);
    echo "
      <button disabled class=b3 name=sub_button>REQUESTED</button>";

  echo "<br>"."<br>"."<br>"."once your friend accepts, we'll credit your balance"."<br>"."<br>"."<br>";
  echo "<a href=productlist.php>click here to go to home page</a>";
}
else {
  echo "your friend don't have enough balance"."<br>"."<br>"."<br>";
  echo "<a href=productlist.php>click here to go to home page</a>";
}
}

  ?>
  </form>
  </div>
	</header>

	<script src="js/jquery.min.js"></script>

	<script src="js/jquery.easing.1.3.js"></script>

	<script src="js/bootstrap.min.js"></script>

	<script src="js/jquery.waypoints.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>

	<script src="js/jquery.countTo.js"></script>

	<script src="js/jquery.stellar.min.js"></script>

	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<script src="js/bootstrap-datepicker.min.js"></script>

	<script src="js/main.js"></script>

	</body>
</html>
