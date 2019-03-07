<?php
session_start();
include 'db_handler.php';
if(isset($_POST['login']))
{
  $email=mysqli_real_escape_string($conn,$_POST['id']);
  $password=mysqli_real_escape_string($conn,$_POST['pw']);
  $sql="SELECT * FROM project WHERE email='$email';";
  $result=mysqli_query($conn,$sql);
  $resultCheck=mysqli_num_rows($result);
    if($resultCheck<1){
        header("location: index.php?signup=error12");
        exit();
        }
      else {
            if($row=mysqli_fetch_assoc($result)){
              if($password!=$row['pass'])
              {
                echo '<script type="text/javascript"> alert("wrong password!!!") </script>';
                header("location: index.php?signup=error13");
                exit();
              }
              else {
                $_SESSION['email']= $row['email'];
                $_SESSION['imglink']= $row['imglink'];
				     
                header("location: productlist.php");

              }
            }
      }
}
else {
echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
  
}

?>
