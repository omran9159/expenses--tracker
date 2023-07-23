<?php
$servername = 'localhost';
$username ='root';
$password = '';
$dbname = 'expense tracker';

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من أن الاتصال ناجح
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>
