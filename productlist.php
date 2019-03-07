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
	<link rel="stylesheet" href="css/003.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body style="overflow: auto;"> 
 

	<div class="gtco-loader"></div>
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="#">Be Instrumental <em></em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<form style="float:right" method="POST" action="profile.php" >
              <?php
            	include 'db_handler.php';
                $sqli_num="SELECT * FROM project;";
            	  $sql2="SELECT * FROM project WHERE email='$_SESSION[email]';";
                $result_num=mysqli_query($conn,$sqli_num);
            	  $result2=mysqli_query($conn,$sql2);
                $num_rows=mysqli_num_rows($result_num);
            	      if($row2=mysqli_fetch_assoc($result2)){
            	        $_SESSION['wallet']=$row2['wallet'];
            	        $firstName=$row2['firstName'];
                      $lastName=$row2['lastName'];
              				$email=$row2['email'];
                      $product=$row2['product'];
                      $image=$row2['imglink'];
            	      }

                  if($row2['op']==1){
                    $one=$row2['nameReq'];
                    $two=$row2['bal'];
                  }

           echo '<img style="height:50px; width:50px; border: 0px solid; border-radius:100%;" src="'.$_SESSION['imglink'].'">';
					 echo "<input class=list type=submit name=id value=$firstName>";
           echo "<form method='POST' >";
           echo "<input type=submit name=LOGOUT value=LOGOUT class='logout'/>";
           echo "</form>";
            if(isset($_POST['LOGOUT'])){
              session_destroy();
              header("location: index.php");
            }

          if($row2['op']==1){
            echo "<form method=POST>
                  <small style='color:white;'>$one requested INR $two from you</small>
                  <input class=list type=submit name='noti' value='Accept'>
                  </form>";
        if(isset($_POST['noti'])){
          echo '<script type="text/javascript"> confirm("are you sure? :p") </script>';

          $_SESSION['wallet']= $_SESSION['wallet']-$two;

          $sqlii="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$row2[email]';";
          $sqlii2="UPDATE project SET op='0' WHERE email='$row2[email]';";
          $sqlii3="SELECT * FROM project WHERE firstName='$one';";
          mysqli_query($conn,$sqlii);
          mysqli_query($conn,$sqlii2);
          $result4=mysqli_query($conn,$sqlii3);
          if($row2=mysqli_fetch_assoc($result4)){
              $wall=$row2['wallet']+$two;
          }
          $sqlii4="UPDATE project SET wallet='$wall' WHERE firstName='$one';";
          mysqli_query($conn,$sqlii4);
          header("Refresh:0");
        }
      }
      ?>
      		  </form>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/4574.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
              <!-- <div class="transbox"> -->
                <table class="tab">
              	<tr><td colspan="4"  ><h4 style="background-color:transparent; color:white;"><center>OUR PRODUCTS</center></h4></td></tr>
              	<!--row1--><tr>
              						<td style="padding: 8px 10px;" >
              						<table class="tab2" >
              							<tr>
              								<td ><img src="assets/uke4.jpg" style="height: 80px;width:80px;"></td>
              								<td style="font-size: 18px;color: white;">
              								<?php
              									$p=3999;
              									$res=$_SESSION['wallet']-$p;
              									echo "Ukulele<br>Price:INR$p";
              					 			?>
              					 			</td>
              					 		 <form method="post">
              								<td>
                    					<?php
              					     if((!isset($_POST['BUY'])) && (!isset($_POST['BUY1'])) && (!isset($_POST['BUY2'])) && (!isset($_POST['BUY3'])) && (!isset($_POST['BUY4'])) && (!isset($_POST['BUY5'])) && (!isset($_POST['BUY6'])) && (!isset($_POST['BUY7'])) && (!isset($_POST['BUY8'])))
                             {
                      					  	if(($product==0)|| ($product=='') ){
                                       $_SESSION['pro']='';
                                        }
                                    if(($product!=0)|| ($product!='')){
                                      $_SESSION['pro']=$product;
                                        }
                  					    $_SESSION['pro1']='';
                  					    $_SESSION['pro2']='';
                  					    $_SESSION['pro3']='';
                  					    $_SESSION['pro4']='';
                  					    $_SESSION['pro5']='';
                  					    $_SESSION['pro6']='';
                  					    $_SESSION['pro7']='';
                  					    $_SESSION['pro8']='';
                  					    $_SESSION['pro9']='';
              					     }
              							$sql5="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result3=mysqli_query($conn,$sql5);
              							$row20=mysqli_fetch_assoc($result3);
                    								if(isset($_POST['BUY']))
              								      {
              								  	     $_SESSION['wallet2']=$row20['wallet'];
              									       if($res>=0){
              								  			     $_SESSION['wallet']=$_SESSION['wallet']-$p;
              											       echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											       include 'db_handler.php';
                 											    $sql4="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
                											    $_SESSION['pro']=$_SESSION['pro']+'1';
                											    $_SESSION['pro1']='1';
              												    $sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												    mysqli_query($conn,$sql4);
              												    mysqli_query($conn,$sql3);
                												}
              											   else {
              										  			echo "low balance!!!";
              												      }
              								      }
              				            else {
              					             if($_SESSION['pro1']!=0){
              					     					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						              }
              						          else {
              						              echo "<input type='submit' name='BUY' value='BUY' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						              }
              					               }?>
              		                      
              								 </form>
                							  </td>

              							</tr>
              						</table>
              						</td>
              						<td style="padding: 8px 10px;">
              						<table class="tab2">
              							<tr>
              								<td><img src="assets/harmo.jpg" style="height: 80px;width:80px;"></td>

              								<td style="font-size: 18px;color:white;">

              								<?php
              									$p1=7999;
              									$res1=$_SESSION['wallet']-$p1;
              									//echo "$row2[wallet]";
              									echo "Harmonium<br>Price:INR$p1";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro2']='';
              					$sql6="SELECT * FROM project WHERE email='$_SESSION[email]';";
              					$result6=mysqli_query($conn,$sql6);


              							$row4=mysqli_fetch_assoc($result6);
              								$_SESSION['wallet2']=$row4['wallet'];

              								if(isset($_POST['BUY1'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res1>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p1;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											     $_SESSION['pro']=$_SESSION['pro']+'1';
              											    $_SESSION['pro2']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if(   $_SESSION['pro2']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY1' value='BUY' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              							</tr>
              						</table>
              						</td>

              					<td>
              					<table class="tab2">
              							<tr>
              								<td><img src="assets/flute.jpg" style="height: 80px;width:80px;"></td>
              								<td style="font-size: 18px;color: white;">
              								<?php
              									$p2=499;
              									$res2=$_SESSION['wallet']-$p2;
              									//echo "$row2[wallet]";
              									echo "Flute<br>Price:INR$p2";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro3']='';
              							$sql7="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result7=mysqli_query($conn,$sql7);
              							$row5=mysqli_fetch_assoc($result7);
              								$_SESSION['wallet2']=$row5['wallet'];
              								if(isset($_POST['BUY2'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res2>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p2;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											     $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro3']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if( $_SESSION['pro3']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY2' value='BUY' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              							</tr>
              					</table>
              								</td>
              			</tr>
          <!--row2-->    		<tr>
              			<td style="padding: 8px 10px;">
              				<table class="tab2">
              					<tr>
              						<td><img src="assets/tabla.png" style="height: 80px;width:80px;"></td>
              						<td style="font-size: 18px;color: white;">
              						<?php
              									$p3=4999;
              									$res3=$_SESSION['wallet']-$p3;
              									//echo "$row2[wallet]";
              									echo "Tabla<br>Price:INR$p3";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro4']='';
              						$sql8="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result8=mysqli_query($conn,$sql8);
              							$row6=mysqli_fetch_assoc($result8);
              								$_SESSION['wallet2']=$row6['wallet'];
              								if(isset($_POST['BUY3'])){

              							  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res3>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p3;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											    $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro4']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if($_SESSION['pro4']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY3' value='BUY' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              					</tr>
              				</table>
              			</td>

              			<td style="padding: 8px 10px;">
              				<table class="tab2">
              					<tr>
              						<td><img src="assets/vio.jpg" style="height: 80px;width:80px;"></td>
              						<td style="font-size: 18px;color: white;">
              						<?php
              									$p4=4999;
              									$res4=$_SESSION['wallet']-$p4;
              									//echo "$row2[wallet]";
              									echo "Violin<br>Price:INR$p4";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro5']='';
              					$sql9="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result9=mysqli_query($conn,$sql9);
              							$row7=mysqli_fetch_assoc($result9);
              								$_SESSION['wallet2']=$row7['wallet'];
              								if(isset($_POST['BUY4'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res4>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p4;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											    $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro5']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if($_SESSION['pro5']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY4' value='BUY' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              					</tr>
              				</table>
              			</td>
              			<td>
              				<table class="tab2">
              					<tr>
              						<td><img src="assets/12.jpg" style="height: 80px;width:80px;"></td>
              						<td style="font-size: 18px;color:white;">
              						<?php
              									$p5=110;
              									$res5=$_SESSION['wallet']-$p5;
              									//echo "$row2[wallet]";
              									echo "Capo<br>Price:INR$p5";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro6']='';
              						$sql10="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result10=mysqli_query($conn,$sql10);
              							$row8=mysqli_fetch_assoc($result10);
              								$_SESSION['wallet2']=$row8['wallet'];
              								if(isset($_POST['BUY5'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res5>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p5;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											    $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro6']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if($_SESSION['pro6']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY5' value='BUY' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              </tr>
              </table>
              			</td>
              </tr>
  <!--row3-->            <tr>
              			<td style="padding: 8px 10px;">
              				<table class="tab2">
              					<tr>
              						<td><img src="assets/3.jpg" style="height: 80px;width:80px;"></td>
              						<td style="font-size: 18px;color:white;">
              						<?php
              									$p6=9999;
              									$res6=$_SESSION['wallet']-$p6;
              									//echo "$row2[wallet]";
              									echo "Bass Guitar<br>Price:INR$p6";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro7']='';
              							$sql11="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result11=mysqli_query($conn,$sql11);
              							$row9=mysqli_fetch_assoc($result11);
              								$_SESSION['wallet2']=$row9['wallet'];
              								if(isset($_POST['BUY6'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res6>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p6;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											    $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro7']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if($_SESSION['pro7']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY6' value='BUY' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              					</tr>
              				</table>
              			</td>

              			<td style="padding: 8px 10px;">
              				<table class="tab2">
              					<tr>
              						<td><img src="assets/bongos.jpg" style="height: 80px;width:80px;"></td>
              						<td style="font-size: 18px;color: white;">
              							<?php
              									$p7=4800;
              									$res7=$_SESSION['wallet']-$p7;
              									//echo "$row2[wallet]";
              									echo "Bongos<br>Price:INR$p7";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              					//$_SESSION['pro8']='';
              							$sql12="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result12=mysqli_query($conn,$sql12);
              							$row10=mysqli_fetch_assoc($result12);
              								$_SESSION['wallet2']=$row10['wallet'];
              								if(isset($_POST['BUY7'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res7>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p7;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											    $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro8']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if($_SESSION['pro8']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY7' value='BUY' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td></tr>
              				</table>
              			</td>
              			<td>
              				<table class="tab2">
              					<tr>
              						<td><img src="assets/organ.jpg" style="height: 80px;width:80px;"></td>
              						<td style="font-size: 18px;color: white;">
              						<?php
              									$p8=499;
              									$res8=$_SESSION['wallet']-$p8;
              									//echo "$row2[wallet]";
              									echo "Mouth Organ<br>Price:INR$p8";
              					 			?>

              					 			</td>
              					 		<form method="post">
              								<td>

              					<?php
              				//	$_SESSION['pro9']='';
              							$sql13="SELECT * FROM project WHERE email='$_SESSION[email]';";
              							$result13=mysqli_query($conn,$sql13);
              							$row11=mysqli_fetch_assoc($result13);
              								$_SESSION['wallet2']=$row11['wallet'];
              								if(isset($_POST['BUY8'])){

              								  	//$_SESSION['wallet2']=$row2['wallet'];
              										if($res8>=0){

              								  			$_SESSION['wallet']=$_SESSION['wallet']-$p8;
              											  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color: #7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              											include 'db_handler.php';
              											   // $email1=$_SESSION['email1'];
              											    $sql2="UPDATE project SET wallet='$_SESSION[wallet]' WHERE email='$_SESSION[email]';";
              											    $_SESSION['pro']= $_SESSION['pro']+'1';
              											       $_SESSION['pro9']='1';
              												$sql3="UPDATE project SET product='$_SESSION[pro]' WHERE email='$_SESSION[email]';";
              												mysqli_query($conn,$sql2);
              												    mysqli_query($conn,$sql3);

              												//header("Refresh:0");
              												}
              											else {
              										  			echo "low balance!!!";
              												}
              								}
              				else {
              					if($_SESSION['pro9']!=0)
              					  {
              					  echo "<input type='submit' disabled value='&#9989' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              						else {
              						  echo "<input type='submit' name='BUY8' value='BUY' style= 'color:white; background-color:#7a8493; height: 40px;width:60px;border:10px;border-radius: 5px;' />";
              						}
              					}
              		?>
              								 </form>
                							  </td>
              </tr>
              </table>
              			</td>
              </tr>
              		</table>
  </div>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">




                    <table class="table" style="padding-left: 100px;overflow: auto;">
                      <tr>
                    <td colspan="4" ><center>
                  <h4 class="t1" >OUR CUSTOMERS</OUR></h4></center>
                </td></tr>
                    <?php

                		include 'db_handler.php';
                		$sql="select * from project";
                		$result=mysqli_query($conn,$sql);
                		$resultCheck=mysqli_num_rows($result);
                		for($i=0;$i<$resultCheck;$i++){
                			if($row3=mysqli_fetch_assoc($result)){
                					$first=$row3['firstName'];
                					$wallet=$row3['wallet'];
                					$last=$row3['lastName'];
                					$email1=$row3['email'];
                					$image=$row3['imglink'];
                          $_SESSION['img']=$row3['imglink'];
                					if($row2['firstName']!=$first){
                						echo "<form action=request.php method=POST>";
                						if(!empty($image))
                						{
                								echo "
                							 <tr><td>
                							 <img src='$image' style='height: 25px; width:25px;'></td>";

                              }
                							 else
                							 {
                							 	echo "
                							 <tr><td>
                							 <img src='assets/default1.png' style='height: 25px; width:25px;'></td>";
                							 }
                							 echo"
                							 <td>
                							 <input type='submit' name=clicked[$first] value=$first class='list'
                							  />
                								</td>
                							 <td>
                						         <input type=hidden name=clicked2[$last]/>
                						          <input type=hidden name=clicked3[$email1]   />
                						                 <input type=hidden name=clicked4[$wallet]  />
                                             <input type=hidden name='clicked5[$image]'/>

                									<h8 style='color:white';>ON WALLET: $wallet</h8>
                									</td>
                							 </tr>";
                					echo "</form>";

                					}

                			}

                		}


                		?>



                    </table>


					</div>


				</div>
			</div>
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
