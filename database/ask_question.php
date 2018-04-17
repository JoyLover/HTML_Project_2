<?php
session_start();
require_once "../db_con.php";

$question_content = addslashes($_POST['input_q']);

//Insert question content.
$sql = "INSERT INTO QUESTIONS(Q_CONTENT)
        VALUES
        ('$question_content')";

$db->query($sql);

header("Location: ../index.php?sid=513461163");
?>