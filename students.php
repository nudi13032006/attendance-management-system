<?php
include("db.php");

$sql = "SELECT * FROM students";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Students</title>

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

<h1>Registered Students 👨‍🎓</h1>

<div class="table-container">

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Department</th>

</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['student_id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['department']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>

</html>