<?php
session_start();

include("db.php");

if(!isset($_SESSION['student']))
{
    header("Location: login.php");
}

/* TOTAL STUDENTS */

$student_query =
"SELECT COUNT(*) AS total_students FROM students";

$student_result =
mysqli_query($conn,$student_query);

$student_data =
mysqli_fetch_assoc($student_result);

/* TOTAL ATTENDANCE */

$attendance_query =
"SELECT COUNT(*) AS total_attendance FROM attendance";

$attendance_result =
mysqli_query($conn,$attendance_query);

$attendance_data =
mysqli_fetch_assoc($attendance_result);

/* PRESENT COUNT */

$present_query =
"SELECT COUNT(*) AS total_present
 FROM attendance
 WHERE status='Present'";

$present_result =
mysqli_query($conn,$present_query);

$present_data =
mysqli_fetch_assoc($present_result);

/* ABSENT COUNT */

$absent_query =
"SELECT COUNT(*) AS total_absent
 FROM attendance
 WHERE status='Absent'";

$absent_result =
mysqli_query($conn,$absent_query);

$absent_data =
mysqli_fetch_assoc($absent_result);
?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

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

<a href="query_lab.php">💻 Query Lab</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<div class="topbar">

<h1>Dashboard Analytics 🚀</h1>

</div>

<div class="cards">

<a href="students.php"
style="text-decoration:none; color:white;">

<div class="card">

<h3>Total Students</h3>

<h1>
<?php
echo $student_data['total_students'];
?>
</h1>

<p>Registered users in system</p>

</div>

</a>

<a href="view_attendance.php"
style="text-decoration:none; color:white;">

<div class="card">

<h3>Attendance Records</h3>

<h1>
<?php
echo $attendance_data['total_attendance'];
?>
</h1>

<p>Total attendance entries</p>

</div>

</a>

<a href="mark_attendance.php"
style="text-decoration:none; color:white;">

<div class="card">

<h3>Present Count</h3>

<h1>
<?php
echo $present_data['total_present'];
?>
</h1>

<p>Total present records</p>

</div>

</a>

<a href="query_lab.php"
style="text-decoration:none; color:white;">

<div class="card">

<h3>Absent Count</h3>

<h1>
<?php
echo $absent_data['total_absent'];
?>
</h1>

<p>Total absent records</p>

</div>

</a>

</div>

</div>

</body>

</html>