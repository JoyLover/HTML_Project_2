<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "qa");
if (mysqli_connect_errno())
{
    echo "Cannot connect to mysql: " . mysqli_connect_error();
}

if(isset($_GET['q_id'])){
    $q_id = $_GET['q_id'];
}
else{
    $q_id = $_SESSION['q_id'];
}

$sql1 = "DELETE FROM Answers
        WHERE Answers.A_id IN (SELECT QandA.A_id FROM QandA
             WHERE QandA.Q_id = $q_id);";
$sql2 = "DELETE FROM Questions
         WHERE Questions.Q_id = $q_id;";

mysqli_query($con, $sql1);
mysqli_query($con, $sql2);

mysqli_close($con);

header("Location: ../index.php?sid=".rand());
?>