<?php
include("db.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    $sql = "INSERT INTO students(name,email,password,department)
            VALUES('$name','$email','$password','$department')";

    if(mysqli_query($conn,$sql))
    {
        echo "Registration Successful!";
    }
    else
    {
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Student Registration</title>

    <style>

        body{
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container{
            width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        button{
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: blue;
            color: white;
            border: none;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Student Registration</h2>

<form method="POST">

<input type="text" name="name" placeholder="Enter Name" required>

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="Enter Password" required>

<input type="text" name="department" placeholder="Enter Department" required>

<button type="submit" name="register">Register</button>

</form>

</div>

</body>
</html>