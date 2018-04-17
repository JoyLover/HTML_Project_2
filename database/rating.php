<?php
require_once "../db_con.php";

$a_id = $_GET['a_id'];
$sign = $_GET['sign'];
$sql1 = "UPDATE ANSWERS SET RATING = RATING + $sign WHERE A_ID = $a_id";
$sql2 = "SELECT RATING
         FROM ANSWERS
         WHERE A_ID = $a_id";

$db->query($sql1);
$res = $db->query($sql2);

$a_rating = ($res->fetch_assoc())['RATING'];
echo $a_rating.'&nbsp;&nbsp;';

?>