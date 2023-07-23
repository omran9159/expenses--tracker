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

require_once 'dbcon.php'; // Using database connection file here

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $Date = $_POST['Date'];
    $Amount = $_POST['Amount'];
    $Comments = $_POST['Comments'];
    $Payment_Method = $_POST['Payment_Method'];
    $Category = $_POST['Category'];

    $query = "UPDATE expenses SET Date='$Date', Amount='$Amount', Comments='$Comments', Payment_Method='$Payment_Method', Category='$Category' WHERE id='$id'";
    $edit = $conn->query($query);

    if ($edit) {
        $conn->close(); // Close connection
        header("location:expense.php"); // Redirect to all records page
        exit;
    } else {
        echo "<p>Unable to update the expense.</p>";
        die($conn->error);
    }
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT Date, Amount, Comments, Payment_Method, Category FROM expenses WHERE id='$id'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
        } else {
            echo "<p>Expense not found.</p>";
            die($conn->error);
        }
    } else {
        echo "<p>Invalid request.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editexpense.css">
    <title>Edit Expense</title>
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


           </div>
    <h1>Edit Expense</h1>
    <form  method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="Date">Date:</label>
        <input type="text" name="Date" value="<?php echo $data['Date']; ?>" required>
        <label for="Amount">Amount:</label>
        <input type="text" name="Amount" value="<?php echo $data['Amount']; ?>" required>
        <label for="Comments">Comments:</label>
        <input type="text" name="Comments" value="<?php echo $data['Comments']; ?>">
        <label for="Payment_Method">Payment Method:</label>
        <input type="text" name="Payment_Method" value="<?php echo $data['Payment_Method']; ?>">
        <label for="Category">Category:</label>
        <input type="text" name="Category" value="<?php echo $data['Category']; ?>">
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
