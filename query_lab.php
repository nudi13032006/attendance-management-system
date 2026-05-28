<?php
include("db.php");

$query = "";
$result = null;
$question = "";

/* QUERY A */

if(isset($_POST['query1']))
{
    $question =
    "a) Retrieve all students who are marked Present today.";

    $query =
    "SELECT s.name, sub.subject_name

     FROM students s

     INNER JOIN attendance a
     ON s.student_id = a.student_id

     INNER JOIN subjects sub
     ON a.subject_id = sub.subject_id

     WHERE a.attendance_date = CURDATE()

     AND a.status='Present'";

    $result = mysqli_query($conn,$query);
}

/* QUERY B */

if(isset($_POST['query2']))
{
    $question =
    "b) Find students marked Absent today.";

    $query =
    "SELECT s.name, sub.subject_name

     FROM students s

     INNER JOIN attendance a
     ON s.student_id = a.student_id

     INNER JOIN subjects sub
     ON a.subject_id = sub.subject_id

     WHERE a.attendance_date = CURDATE()

     AND a.status='Absent'";

    $result = mysqli_query($conn,$query);
}

/* QUERY C */

if(isset($_POST['query3']))
{
    $question =
    "c) Calculate total attendance count for every student.";

    $query =
    "SELECT s.name,

     COUNT(*) AS total_attendance

     FROM students s

     INNER JOIN attendance a
     ON s.student_id = a.student_id

     GROUP BY s.name

     ORDER BY total_attendance DESC";

    $result = mysqli_query($conn,$query);
}

/* QUERY D */

if(isset($_POST['query4']))
{
    $question =
    "d) Calculate attendance percentage for each student.";

    $query =
    "SELECT s.name,

     ROUND(

     SUM(
     CASE
     WHEN a.status='Present'
     THEN 1
     ELSE 0
     END

     ) *100/COUNT(*),2)

     AS attendance_percentage

     FROM students s

     INNER JOIN attendance a
     ON s.student_id = a.student_id

     GROUP BY s.name";

    $result = mysqli_query($conn,$query);
}

/* QUERY E */

if(isset($_POST['query5']))
{
    $question =
    "e) Find students having 3 or more absences.";

    $query =
    "SELECT s.name,

     COUNT(*) AS absent_days

     FROM students s

     INNER JOIN attendance a
     ON s.student_id = a.student_id

     WHERE a.status='Absent'

     GROUP BY s.name

     HAVING absent_days >= 3";

    $result = mysqli_query($conn,$query);
}

/* QUERY F */

if(isset($_POST['query6']))
{
    $question =
    "f) Find department with highest attendance.";

    $query =
    "SELECT d.department_name,

     COUNT(*) AS total_present

     FROM departments d

     INNER JOIN students s
     ON d.department_id = s.department_id

     INNER JOIN attendance a
     ON s.student_id = a.student_id

     WHERE a.status='Present'

     GROUP BY d.department_name

     ORDER BY total_present DESC

     LIMIT 1";

    $result = mysqli_query($conn,$query);
}

/* QUERY G */

if(isset($_POST['query7']))
{
    $question =
    "g) Find records having NULL attendance status.";

    $query =
    "SELECT *

     FROM attendance

     WHERE status IS NULL";

    $result = mysqli_query($conn,$query);
}
?>

<!DOCTYPE html>
<html>

<head>

<title>SQL Query Lab</title>

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

<h1>Attendance Management Database 💻</h1>

<!-- DATABASE SCHEMA -->

<div class="card" style="margin-top:25px;">

<h2>Consider The Following Schema 📚</h2>

<p
style="
margin-top:20px;
color:#38bdf8;
font-family:monospace;
line-height:2.2;
font-size:15px;
">

students(
student_id,
name,
email,
password,
department_id
)

<br><br>

departments(
department_id,
department_name,
hod_name
)

<br><br>

subjects(
subject_id,
subject_name,
faculty_id
)

<br><br>

faculty(
faculty_id,
faculty_name,
department_id
)

<br><br>

attendance(
attendance_id,
student_id,
subject_id,
attendance_date,
status
)

</p>

<h2 style="margin-top:35px;">
Write SQL Queries To
</h2>

<p
style="
margin-top:20px;
line-height:2.2;
font-size:17px;
color:#e2e8f0;
">

a) Retrieve all students who are marked Present today.

<br><br>

b) Find students marked Absent today.

<br><br>

c) Calculate total attendance count for every student.

<br><br>

d) Calculate attendance percentage for each student.

<br><br>

e) Find students having 3 or more absences.

<br><br>

f) Find department with highest attendance.

<br><br>

g) Find records having NULL attendance status.

</p>

</div>

<!-- QUERY BUTTONS -->

<div class="cards">

<form method="POST">
<button class="btn" name="query1">
Query A
</button>
</form>

<form method="POST">
<button class="btn" name="query2">
Query B
</button>
</form>

<form method="POST">
<button class="btn" name="query3">
Query C
</button>
</form>

<form method="POST">
<button class="btn" name="query4">
Query D
</button>
</form>

<form method="POST">
<button class="btn" name="query5">
Query E
</button>
</form>

<form method="POST">
<button class="btn" name="query6">
Query F
</button>
</form>

<form method="POST">
<button class="btn" name="query7">
Query G
</button>
</form>

</div>

<?php
if($query != "")
{
?>

<div class="card" style="margin-top:30px;">

<h2
style="
color:white;
line-height:1.8;
">

<?php
echo $question;
?>

</h2>

<h3 style="margin-top:25px;">
SQL Query 💻
</h3>

<p
style="
margin-top:15px;
color:#38bdf8;
font-family:monospace;
line-height:2;
font-size:15px;
">

<?php
echo nl2br($query);
?>

</p>

<h3 style="margin-top:25px;">
Output ✅
</h3>

</div>

<div class="table-container">

<table>

<?php

if($result && mysqli_num_rows($result) > 0)
{
    $first_row = mysqli_fetch_assoc($result);

    echo "<tr>";

    foreach($first_row as $key => $value)
    {
        echo "<th>$key</th>";
    }

    echo "</tr>";

    echo "<tr>";

    foreach($first_row as $value)
    {
        echo "<td>$value</td>";
    }

    echo "</tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";

        foreach($row as $value)
        {
            echo "<td>$value</td>";
        }

        echo "</tr>";
    }
}
else
{
    echo "<tr><td>No Data Found</td></tr>";
}

?>

</table>

</div>

<?php
}
?>

</div>

</body>

</html>