<?php
include("db.php");

$query_display = "";

if(isset($_POST['submit']))
{
    $student_name = $_POST['student_name'];

    $subject_name = $_POST['subject_name'];

    $attendance_date = $_POST['attendance_date'];

    $status = $_POST['status'];

    $sql = "INSERT INTO attendance
            (student_name,subject_name,attendance_date,status)

            VALUES

            ('$student_name',
            '$subject_name',
            '$attendance_date',
            '$status')";

    $query_display = $sql;

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Attendance Marked Successfully')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Mark Attendance</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="sidebar">

<div class="logo">
AMS Portal
</div>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="mark_attendance.php">✅ Mark Attendance</a>

<a href="view_attendance.php">📋 View Attendance</a>

<a href="students.php">👨‍🎓 Students</a>

<a href="subjects.php">📚 Subjects</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h1>Mark Attendance ✅</h1>

<div class="auth-box">

<form method="POST">

<div class="input-group">

<input
type="text"
name="student_name"
placeholder="Student Name"
required>

</div>

<div class="input-group">

<input
type="text"
name="subject_name"
placeholder="Subject Name"
required>

</div>

<div class="input-group">

<input
type="date"
name="attendance_date"
required>

</div>

<div class="input-group">

<select name="status">

<option value="Present">Present</option>

<option value="Absent">Absent</option>

</select>

</div>

<button
class="btn"
type="submit"
name="submit">

Mark Attendance

</button>

</form>

</div>

<!-- QUERY DISPLAY -->

<?php
if($query_display != "")
{
?>

<div class="card" style="margin-top:30px;">

<h3>Executed SQL Query 💻</h3>

<p
style="
margin-top:15px;
color:#38bdf8;
font-family:monospace;
">

<?php
echo $query_display;
?>

</p>

<p
style="
margin-top:15px;
color:#94a3b8;
">

Output:
Attendance inserted successfully into database.

</p>

</div>

<?php
}
?>

</div>

</body>

</html>