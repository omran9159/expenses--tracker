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
  <title>Add Category</title>
  <link rel="stylesheet" href="../css/add catugy.css"></head>
<body>

<div class="menu">
    <ul>
        <li><a href="#services">Services</a></li>
        <li><a href="#home">Home</a></li>
        <li><a href="#aboutus">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="expense.php">expense</a></li>

        <li><a href="../PHP/addcategory.php">Add Category</a></li>

        <?php if($loggedin) { ?>
            <li><a href="welcome.php">Profile</a></li>
            <li><a href="HOME PAGE.html">Logout (<?php echo $_SESSION['username'] ?>)</a></li>
        <?php } else { ?>
            <li><a href="../php/login.php">Login</a></li>
        <?php }?>
    </ul>



               <br><br/>


           </div>
  <div class="container mt-5">
    <h1>Add Category</h1>
    <form action="add_category.php" method="post" >
  <label>category:</label>
  <input type="text" name="categories_name"><br>

  <label>Date:</label>
  <textarea name="Date"></textarea><br>

  <label>Amount:</label>
  <input type="number" name="Amount"><br>

  <label>Comments:</label>
  <input type="number" name="Comment"><br>

  <label>Payment Method:</label>
  <input type="number" name="Payment Method"><br>

  <input type="submit" value="Add Category">
</form>
</body>
</html>