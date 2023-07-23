<!DOCTYPE html>
<html>
<head>
  <title>add category</title>
</head>
<body>
  <h1>add category</h1>
  <?php
if (!isset($_POST['Date']) || !isset($_POST['Category']) || !isset($_POST['Amount']) || !isset($_POST['Comment'])|| !!isset($_POST['Payment Method'])) {
  echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
  exit;
}

$Date = $_POST['Date'];
$Category = $_POST['Category'];
$Amount = $_POST['Amount'];
$Comment = $_POST['Comment'];
$PaymentMethode = $_POST['Payment Methode'];

require_once 'dbcon.php';
$conn = new mysqli($hn, $username, $password, $db);
if ($conn->connect_error) {
  echo "<p>Error: Could not connect to database.<br/>
        Please try again later.</p>";
  die($conn->error);
}

$query = "INSERT INTO expenses (Date, Category,Amount,Comment,Payment Method) VALUES ('$Date', '$Category ', '$Amount','$Comment','$PaymentMethode')";

if ($conn->query($query)) {
  echo "<p>Category inserted .</p>";
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
  echo "<br/>The category was not added.";
}

// Close connection
$conn->close();
?>
      </body>
      </html>
