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

require_once 'dbcon.php';

$id = $_GET['id']; // get id through query string

$query = "SELECT Date, Amount,Comments ,Payment_Method,Category FROM expenses WHERE id =  '$id'  "; // select ديري اسماء الاعمدة
   //echo $query;

   $result = $conn->query($query);// fetch data
   if (!$result) 
   {
       echo "<p>Unable to execute the query.</p> ";
       echo $query;
       die ($conn -> error);
   }
   $data = $result->fetch_array(MYSQLI_ASSOC);
if(isset($_POST['delete'])) // when click on Update button
{


     $query ="Delete from expenses where id='$id'";
    $delete =  $conn->query($query);

    if($delete)
    {
        $conn->close();// Close connection
        header("location:expense.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo "<p>Unable to execute the query.</p> ";
        echo $query;
        die ($conn -> error);
    }    	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="expense.css">
    <title>delet Expense</title>
</head>
<body>
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
            <li><a href="../PHP/HOME PAGE.html">Logout (<?php echo $_SESSION['username'] ?>)</a></li>
        <?php } else { ?>
            <li><a href="../PHP/login.php">Login</a></li>
        <?php }?>
    </ul>



               <br><br/>


           </div>
<h3>Delete category</h3>

<form method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="text" name="Date" value="<?php echo $data['Date'] ?>"  disabled>
  <input type="text" name="	Amount" value="<?php echo $data['Amount'] ?>" disabled>
  <input type="text" name="	Comments" value="<?php echo $data['Comments'] ?>" disabled>
  <input type="text" name="	Payment_Method" value="<?php echo $data['Payment_Method'] ?>"  disabled>
  <input type="text" name="Category" value="<?php echo $data['Category'] ?>" disabled>

  <input type="submit" name="delete" value="Delete">
</form>