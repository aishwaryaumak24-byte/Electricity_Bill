<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>

<h2>Student Information Form</h2>

<form method="post">
    Name:
    <input type="text" name="name"><br><br>

    Age:
    <input type="number" name="age"><br><br>

    Email:
    <input type="email" name="email"><br><br>

    Course:
    <input type="text" name="course"><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    echo "<h2>Student Details</h2>";

    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
            <tr>
                <td>$name</td>
                <td>$age</td>
                <td>$email</td>
                <td>$course</td>
            </tr>
          </table>";
}
?>

</body>
</html>