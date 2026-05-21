<?php
include("db.php");

if(isset($_POST['submit']))
{
    $student_name = $_POST['student_name'];
    $subject_name = $_POST['subject_name'];
    $attendance_date = $_POST['attendance_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO attendance
            (student_name,subject_name,attendance_date,status)

            VALUES
            ('$student_name','$subject_name','$attendance_date','$status')";

    if(mysqli_query($conn,$sql))
    {
        echo "Attendance Marked Successfully!";
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
<title>Mark Attendance</title>

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

input, select{
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

<h2>Mark Attendance</h2>

<form method="POST">

<input type="text"
name="student_name"
placeholder="Enter Student Name"
required>

<input type="text"
name="subject_name"
placeholder="Enter Subject Name"
required>

<input type="date"
name="attendance_date"
required>

<select name="status">

<option value="Present">Present</option>

<option value="Absent">Absent</option>

</select>

<button type="submit" name="submit">
Mark Attendance
</button>

</form>

</div>

</body>
</html>