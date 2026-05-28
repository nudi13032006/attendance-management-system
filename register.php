<?php
include("db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students
            (name,email,password,department)

            VALUES

            ('$name','$email','$password','$department')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Registration Successful')</script>";
    }
    else
    {
        echo "<script>alert('Registration Failed')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Create Account</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="auth-container">

<div class="auth-box">

<h1>Join AMS 🚀</h1>

<p>Create Your Student Account</p>

<form method="POST">

<div class="input-group">

<input
type="text"
name="name"
placeholder="Enter Full Name"
required>

</div>

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
placeholder="Create Password"
required>

</div>

<div class="input-group">

<input
type="text"
name="department"
placeholder="Enter Department"
required>

</div>

<button
class="btn"
type="submit"
name="register">

Create Account

</button>

</form>

<p style="text-align:center; margin-top:20px; color:#cbd5e1;">

Already have an account?

<a href="login.php"
style="color:#818cf8; text-decoration:none;">

Login

</a>

</p>

</div>

</div>

</body>

</html>