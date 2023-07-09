<?php

include ("config.php");
if(isset($_POST['Sign Up'])){

$username =$_POST['username'] ;
$Email =$_POST['Email'] ;
$Age= $_POST['Age'];
$password =$_POST['password'];
$confirm_password =$_POST['confirm_password'] ;

$sql="select * from users where username='$username'";
$result=mysqli_query($conn,$sql);
$count_user=mysqli_num_rows($result);

$sql="select * from users where Email='$Email'";
$result=mysqli_query($conn,$sql);
$count_email=mysqli_num_rows($result);

if($count_user==0 & $count_email==0){
if($password==$confirm_password){
    
$sql="INSERT INTO users (username,Email,Age,password) VALUES (' $username','$Email',' $Age','$password')";
$result=mysqli_query($conn,$sql);
  
if($result)
 {
     header("location:welcome.html");
 }
}
else{
    echo"ss";
}
}

else { 
    if($count_user>0){
          echo "password match" ;
      
  }  
if($count_email>0){

 echo 
    "password not match" ;
    
    }
    } 
}
?>