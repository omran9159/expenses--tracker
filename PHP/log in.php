<!-------------NAME:- ASMA MOHAMED OMRAN SALAH ------------->
<!-------------11/6/2023 ------------->
<!--This code is for the login page if the user is already registered-->
<?php
session_start();

include("config.php");
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql ="select * from users where username='$username'and password='$password'";
    $result =mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    if($count==1)
{
      $_SESSION["username"] = $username;
      $_SESSION["loggedin"] = true;
     // $_POST["username"] = $username;
  header("location:welcome.php");

}
    else
{
      echo '<script>
      window.location href="SIGN UP.php";
      alert("login failed.invalid username or password!!")
      </script>' ;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet"href="../css/login.css">
    <title>LOGIN</title> 
   
    
    
</head>

<body> 
      
     
  <div class="box">
           <div class="container ">
                 <div class="top-header">

                     <span>have an account?</span> <header>Log In</header>
                    
                    
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            
       
  </div>
   
  <div class="input-field">
      
        <input type="text" name="username" class="input"placeholder="username" required>
  <i class="bx bx-user"></i>
</div>

  <div class="input-field">
        <input type="password"name="password" class="input"placeholder="password" required>
        <i class="bx bx-lock"></i>

  </div>
  <div class="input-field">
        <input type="submit" class="submit"value="login"name="login">
  </div>
  

  <div class="bottom">
        <div class="left">
<input type="checkbox" id="check">
<lable for="check">remember me </lable>
        </div>
  </div>

        <div class="right">
                <lable><a href="#">forget password?</a> </lable>

        </div>
        </div>
  
   </div>
  </div>
  
        </div>
  </div></from>
 
</body>
</html>