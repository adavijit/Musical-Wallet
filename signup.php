<?php
include 'db_handler.php';
if(isset($_POST['submit'])){

  $firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
  $lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  $wallet=10000;
  $a=0;
  $img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				$directory = 'uploads/';
				$target_file = $directory.$img_name;

  $sql="INSERT INTO project(firstName,lastName,email,pass,wallet,imglink,op) VALUES ('$firstName','$lastName','$email','$password','$wallet','$target_file','$a');";
  //boolean a=is_uploaded_file($img_tmp);

  if(empty($firstName)||empty($lastName)||empty($email)||empty($password)||!is_uploaded_file($img_tmp))
  {
    echo '<script type="text/javascript"> alert("please fill the all fields!!!") </script>';
    header("location: index.php?signup=error11");
  }
  else {

        move_uploaded_file($img_tmp,$target_file);
    mysqli_query($conn,$sql);
    header("location: index.php?signup=success12");
}
}
else {
  header("location: index.php?signup=22");
}


?>
