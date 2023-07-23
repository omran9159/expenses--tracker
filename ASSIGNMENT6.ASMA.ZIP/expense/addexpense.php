<?php
// استدعاء ملف اتصال قاعدة البيانات
require "dbcon.php";

// التحقق من أن النموذج تم إرساله باستخدام POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات المدخلة من النموذج
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $comments = $_POST['comments'];
    $payment_method = $_POST['payment_method'];
    $category = $_POST['category'];

    $sql = "INSERT INTO expenses (date, amount, comments, payment_method, category) 
            VALUES ('$date', '$amount', '$comments', '$payment_method', '$category')";

    if ($conn->query($sql) === TRUE) {
        header("location:expense.php");
    } else {
        echo "Error adding expense: " . $conn->error;
    }
}

$conn->close();
?>
