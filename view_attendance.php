<?php
include("db.php");

$sql = "SELECT * FROM attendance";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="css/style.css">
<title>View Attendance</title>

<style>

body{
    font-family: Arial;
    background-color: #f2f2f2;
}

.container{
    width: 80%;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

table{
    width: 100%;
    border-collapse: collapse;
}

table, th, td{
    border: 1px solid black;
}

th, td{
    padding: 10px;
    text-align: center;
}

th{
    background: blue;
    color: white;
}

</style>

</head>

<body>

<div class="container">

<h2>Attendance Records</h2>

<table>

<tr>
<th>ID</th>
<th>Student Name</th>
<th>Subject Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['attendance_id']; ?></td>

<td><?php echo $row['student_name']; ?></td>

<td><?php echo $row['subject_name']; ?></td>

<td><?php echo $row['attendance_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>