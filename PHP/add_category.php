<!DOCTYPE html>
<html>
<head>
  <title>add category</title>
</head>
<body>
  <h1>add category</h1>
  <?php
if (!isset($_POST['categories_name']) || !isset($_POST['description']) || !isset($_POST['amount'])) {
  echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
  exit;
}

$categories_name = $_POST['categories_name'];
$description = $_POST['description'];
$amount = $_POST['amount'];

require_once 'config.php';
$conn = new mysqli($hn, $username, $password, $db);
if ($conn->connect_error) {
  echo "<p>Error: Could not connect to database.<br/>
        Please try again later.</p>";
  die($conn->error);
}

$query = "INSERT INTO categories (categories_name, description, amount) VALUES ('$categories_name', '$description', '$amount')";

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
