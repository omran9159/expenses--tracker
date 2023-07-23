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
    <link rel="stylesheet" href="expense.css">
    <title>Add Expense</title>
</head>
<body>
<div class="menu">
    <ul>
        <li><a href="#services">Services</a></li>
        <li><a href="#home">Home</a></li>
        <li><a href="#aboutus">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="http://localhost/expense/expense.php">expense</a></li>

        <li><a href="../PHP/addcategory.php">Add Category</a></li>

        <?php if($loggedin) { ?>
            <li><a href="welcome.php">Profile</a></li>
            <li><a href="../PHP/HOME PAGE.html">Logout (<?php echo $_SESSION['username'] ?>)</a></li>
        <?php } else { ?>
            <li><a href="../php/login.php">Login</a></li>
        <?php }?>
    </ul>



               <br><br/>

    <h1>Add Expense</h1>
    <form action="addexpense.php" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <label for="comments">Comments:</label>
        <input type="text" id="comments" name="comments">
        <label for="payment_method">Payment Method:</label>
        <input type="text" id="payment_method" name="payment_method" required>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        <button type="submit">Add Expense</button>
    </form>
</body>
</html>
