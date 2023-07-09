<?php
// تضمين ملف اتصال بقاعدة البيانات
require_once 'config.php';

if(isset($_POST['username'])){

    // إنشاء اتصال بقاعدة البيانات
    $con = mysqli_connect($hn, $username, $password, $db);

    // التحقق من صحة الاتصال بقاعدة البيانات
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // استخراج معلومات المستخدم من النموذج
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // التحقق من تطابق كلمتي المرور
    if ($password !== $confirm_password) {
        die("Passwords do not match");
    }

    // تحويل كلمة المرور إلى صيغة مشفرة
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // إدخال بيانات المستخدم في الجدول
    $sql = "INSERT INTO users (username, email, age, password) VALUES ('$username', '$email', '$age', '$hashed_password')";

    if (mysqli_query($con, $sql)) {
        header("location:log in.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // إغلاق اتصال بقاعدة البيانات
    mysqli_close($con);
}

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet"href="../css/signup.css">
    <title>sing up</title>
</head>
<body>
    <div class="box">
        <div class="container">
              <div class="top-header">
                  <header>Sign Up</header>
                  
    <form  method="post">
    <?php
        if(isset($error)){
          foreach($error as $error){
            echo '<span class = "error-msg">' . $error. '</span>';
          };
        };

        ?>
    
</div>

<div class="input-field">
     <input type="text"name="username" class="input"placeholder="username" required>
<i class="bx bx-user"></i>
</div>
<div class="input-field">
    <input type="text" name="email"  class="input"placeholder="email" required>
<i class="bx bx-user"></i>
</div>
<div class="input-field">
    <input type="number" name="age" class="input"placeholder="age" required>
<i class="bx bx-user"></i>
</div>

<div class="input-field">
     <input type="password" name="password" class="input"placeholder="password" required>
     <i class="bx bx-lock"></i>

</div>
<div class="input-field">
    <input type="password"name="confirm_password" class="input"placeholder="confirm_password" required>
<i class="bx bx-user"></i>
</div>


<div class="bottom">
     <div class="left">

<input type="checkbox" name="accepts_tos" value="yes" required> I agree to the
<a href="/html-css-practice-test/" target="_blank">terms of service</a>
     </div>
</div>
     <div class="right">
            <p>already a member<lable><a href="#">sign in </a></lable><br></p> 

     </div>
     <div class="input-field">
     <input type="submit" name="Sign Up"class="submit"value="Sign Up">
</div>
     </div>
</div>
</div>
     </div>
</div>
</body>
</html>