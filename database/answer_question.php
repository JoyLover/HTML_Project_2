<?php
//session_id($_SESSION['sessid']);
session_start();
$con = mysqli_connect("localhost", "root", "root", "qa");
if (mysqli_connect_errno())
{ 
    echo "Cannot connect to mysql: " . mysqli_connect_error(); 
}

$Q_id = $_SESSION['q_id'];
$answer_content = addslashes($_GET['answer_content']);

//Insert answer content to table, Answers. 
$sql1 = "INSERT INTO Answers(A_content) 
         VALUES 
         ('$answer_content')";
//Find the answer id added above.
$sql2 = "SELECT A_id
         FROM Answers
         ORDER BY A_id DESC 
         LIMIT 1";
//Set Questions.isAnswered to 1.
$sql3 = "UPDATE Questions SET isAnswered = 1 WHERE Q_id = $Q_id";

mysqli_query($con, $sql1);

$result = mysqli_query($con, $sql2);
$A_id = mysqli_fetch_row($result)[0];

mysqli_query($con, $sql3);

//Insert question and answer pair into table QandA.
$sql5 = "INSERT INTO QandA VALUES ($A_id, $Q_id)";
mysqli_query($con, $sql5);
header("Location: ../pages/detail.php?q_id=$Q_id");
?>