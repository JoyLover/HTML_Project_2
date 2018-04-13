<?php
$con = mysqli_connect("localhost", "root", "root", "qa");
if (mysqli_connect_errno())
{
    echo "Cannot connect to mysql: " . mysqli_connect_error();
}

$a_id = $_GET['a_id'];
$sql1 = "UPDATE Answers SET A_rating = A_rating + 1 WHERE A_id = $a_id";
mysqli_query($con, $sql1);

$sql2 = "SELECT A_rating
         FROM Answers
         WHERE A_id = $a_id";
$result = mysqli_query($con, $sql2);

$a_rating = mysqli_fetch_row($result)[0];
echo $a_rating.'&nbsp;&nbsp;';

mysqli_close($con);