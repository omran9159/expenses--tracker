<?php
	session_start();

	$loggedin = false;
	// Do registration data exist in session? This means that the user registered successfully
	if (isset($_SESSION['loggedin'])) {
		$loggedin = true;
	}

	// unregistered? redirect it to the registration form
	if (!$loggedin) {
        header("Location: log in.php");
        exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPENSE TRACKER</title>
    <link rel="stylesheet" href="../css/welcomepage.css">

</head>
<body>
   
    <div class="menu">
     <ul>        
       <li> <a href="# services ">services</a></li>
       <li>  <a href="# home ">home</a></li>
       <li><a href="#about us">about </a></li>
       <li><a href="#contact">contact</a></li>
       <li><a href="../PHP/addcategory.php  ">add catugry</a></li>
     </a></li>
       <?php if($loggedin) { ?>
        <li><a href="welcome.php">Profile</a></li>
                  
                      <li><a href="../PHP/HOME PAGE.html ">Logout(<?php echo $_SESSION['username'] ?>)</a></li>
                    <?php } else { ?>
                    <li><a href="../php/log in.php">Log in</a></li>
                    <?php }?>
                </ul>
            </div>
            
                
  
           
                <br><br/>
                <div style="background: #ffffff91;padding: 50px;color: #000;">

            	Hello <?php echo $_SESSION['username']; ?><br />

        	</div>
       
</body>
</html>