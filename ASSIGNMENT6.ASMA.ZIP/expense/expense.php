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
    <title>Expense List</title>
</head>


<body>
<body>
<div class="menu">
    <ul>
        <li><a href="#services">Services</a></li>
        <li><a href="#home">Home</a></li>
        <li><a href="#aboutus">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="http://localhost/ASSIGNMENT5.ASMA.ZIP/expense/expense.php">expense</a></li>

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
    <h1>Expenses</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Comments</th>
                <th>Payment
                  -Method</th>
                <th>Category</th>
                <th>Actions</th> <!-- إضافة عنوان للأعمدة -->
            </tr>
        </thead>
        <tbody>
        <?php
        // استدعاء ملف اتصال قاعدة البيانات
        require "dbcon.php";

        // تنفيذ استعلام SQL لجلب البيانات من جدول "expense"
        $sql = "SELECT * FROM expenses";
        $result = $conn->query($sql);

        // إذا تم العثور على بيانات، قم بعرضها داخل الجدول
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["Date"] . '</td>';
                echo '<td>' . $row["Amount"] . '</td>';
                echo '<td>' . $row["Comments"] . '</td>';
                echo '<td>' . $row["Payment_Method"] . '</td>';
                echo '<td>' . $row["Category"] . '</td>';

                // إضافة وصلتين (Links) للتعديل والحذف
                echo '<td>
                    <a href="edit.php?id=' . $row['id'] . '">Edit</a>
                    <a href="deletexpense.php?id=' . $row['id'] . '">Delete</a>
                </td>';

                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6">لا توجد بيانات في جدول "expense"</td></tr>';
        }
        ?>
        </tbody>
    </table>
    <a href="adexpense.php">Add Expense</a> <!-- رابط إضافة نفقة جديدة -->
</body>
</html>
