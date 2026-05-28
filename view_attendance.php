<?php
include("db.php");

/* SQL QUERY */

$sql = "SELECT * FROM attendance";

/* STORE QUERY FOR DISPLAY */

$query_display = $sql;

/* EXECUTE QUERY */

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>View Attendance</title>

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

<h1>Attendance Records 📋</h1>

<!-- QUERY DISPLAY CARD -->

<div class="card" style="margin-top:25px;">

<h3>Executed SQL Query 💻</h3>

<p
style="
margin-top:15px;
color:#38bdf8;
font-family:monospace;
font-size:15px;
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
Attendance data retrieved successfully.

</p>

</div>

<!-- TABLE -->

<div class="table-container">

<table>

<tr>

<th>ID</th>
<th>Student Name</th>
<th>Subject</th>
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

</div>

</body>

</html>