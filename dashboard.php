<?php
session_start();

if(!isset($_SESSION['student']))
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="navbar">

<h2>Attendance Management System</h2>

<div>

<a href="dashboard.php">Dashboard</a>

<a href="mark_attendance.php">Mark Attendance</a>

<a href="view_attendance.php">View Attendance</a>

<a href="logout.php">Logout</a>

</div>

</div>

<div class="dashboard">

<h1>Welcome Student 🎉</h1>

<div class="cards">

<div class="card">
<h3>Attendance</h3>
<p>Manage attendance records</p>
</div>

<div class="card">
<h3>Students</h3>
<p>View registered students</p>
</div>

<div class="card">
<h3>Subjects</h3>
<p>Manage subject details</p>
</div>

</div>

</div>

</body>

</html>