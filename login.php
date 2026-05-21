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
        echo "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Login</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h2>Student Login</h2>

<form method="POST">

<input type="email"
name="email"
placeholder="Enter Email"
required>

<input type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit" name="login">
Login
</button>

</form>

</div>

</body>

</html>