<?php
session_start();

require_once "../db_con.php";

$Q_id = $_SESSION['q_id'];
$answer_content = addslashes($_POST['answer_content']);

//Insert answer content to table, Answers.
$sql1 = "INSERT INTO ANSWERS(A_CONTENT) 
         VALUES 
         ('$answer_content')";
//Find the answer id added above.
$sql2 = "SELECT A_ID
         FROM ANSWERS
         ORDER BY A_ID DESC 
         LIMIT 1";
//Set Questions.isAnswered to 1.
$sql3 = "UPDATE QUESTIONS SET IS_ANSWERED = 1 WHERE Q_ID = $Q_id";

$db->query($sql1);
$res = $db->query($sql2);
$db->query($sql3);

$A_id = ($res->fetch_assoc())['A_ID'];

//Insert question and answer pair into table QandA.
$sql5 = "INSERT INTO Q_A VALUES ($A_id, $Q_id)";
$db->query($sql5);

header("Location: ../pages/detail.php?q_id=$Q_id");
?>