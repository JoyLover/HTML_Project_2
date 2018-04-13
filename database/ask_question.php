<?php
session_start();
$con = mysqli_connect("localhost", "root", "root", "qa");
if (mysqli_connect_errno())
{ 
    echo "Cannot connect to mysql: " . mysqli_connect_error(); 
}

//It's so important here. Almost wasted me half a day to figure it out!
$question_content = addslashes($_GET['input_q']);

//Insert question content.
$sql = "INSERT INTO Questions(Q_content)
        VALUES
        ('$question_content')";

mysqli_query($con, $sql);
mysqli_close($con);

header("Location: ../index.php?sid=513461163");
?>