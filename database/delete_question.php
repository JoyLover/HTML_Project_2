<?php
session_start();
require_once "../db_con.php";

if(isset($_GET['q_id'])){
    $q_id = $_GET['q_id'];
}
else{
    $q_id = $_SESSION['q_id'];
}

$sql1 = "DELETE FROM ANSWERS
         WHERE ANSWERS.A_ID IN (SELECT Q_A.A_ID FROM Q_A
         WHERE Q_A.Q_ID = $q_id);";
$sql2 = "DELETE FROM QUESTIONS
         WHERE QUESTIONS.Q_ID = $q_id;";

$db->query($sql1);
$db->query($sql2);

header("Location: ../index.php?sid=".rand());
?>