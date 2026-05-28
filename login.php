<?php
session_start();

include("db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['student'] = $email;

        header("Location: dashboard.php");
    }
    else
    {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance Management System</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="auth-container">

<div class="auth-box">

<h1>AMS Portal 🚀</h1>

<p>Smart Attendance Management System</p>

<form method="POST">

<div class="input-group">

<input
type="email"
name="email"
placeholder="Enter Email"
required>

</div>

<div class="input-group">

<input
type="password"
name="password"
placeholder="Enter Password"
required>

</div>

<button class="btn"
type="submit"
name="login">

Login

</button>

</form>

<p style="text-align:center; margin-top:20px; color:#cbd5e1;">

New Student?

<a href="register.php"
style="color:#818cf8; text-decoration:none;">

Create Account

</a>

</p>

</div>

</div>

</body>

</html>