<?php
$username = $_POST['username'];
$password = $_POST['password'];

$correct_username = "0";
$correct_password = "0";

if ($username === $correct_username && $password === $correct_password) {
    session_start();
    $_SESSION['loggedin'] = true;
    header("Location: admin.php");
    exit;
} else {
    echo "<script>alert('اسم المستخدم أو كلمة المرور غير صحيحة'); window.location.href='admin_login.html';</script>";
}
?>
