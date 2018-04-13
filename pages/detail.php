<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Question details</title>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">
<!--    jquery file-->
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery_detail.js"></script>
</head>

<body>
<?php
$con = mysqli_connect("localhost", "root", "root", "qa");
if (mysqli_connect_errno())
{
    echo "Cannot connect to mysql: " . mysqli_connect_error();
}

$Q_id = $_GET['q_id'];
$_SESSION['q_id'] = $Q_id;

$sql2 = "SELECT Answers.A_id, A_content, A_rating
         FROM Answers
         INNER JOIN QandA
         ON Answers.A_id = QandA.A_id
         WHERE Q_id = $Q_id
         ORDER BY A_rating DESC;";
$sql1 = "SELECT Q_content
         FROM Questions
         WHERE Q_id = $Q_id;";
$results1 = mysqli_query($con, $sql1);
$results2 = mysqli_query($con, $sql2);

$Q_content = mysqli_fetch_array($results1)['Q_content'];
$_SESSION['q_id'] = $Q_id;
$_SESSION['q_content'] = $Q_content;

$answers_array = array();
while($row = mysqli_fetch_array($results2)){
    array_push($answers_array, $row);
}
?>

    <div id="detail-head">
        <div class="d-flex flex-center align-items-end">
            <h1 class="animated fadeIn mb-4">Question Detail</h1>
        </div>
    </div>
    <div id="q-content-div" class="container">
<!--        echo the question content-->
        <p id="qcontnt">
            <?php
            echo $Q_content;
            ?>
        </p>
<!--        three buttons-->
        <div id="detail-ask-delete-back" class="d-flex justify-content-end">
            <button id="btn-answer" type="button" class="btn btn-primary btn-sm">
                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                &nbsp;&nbsp;Answer
            </button>
            <button id="btn-delete" type="button" class="btn btn-primary btn-sm">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
                &nbsp;&nbsp;Delete</button>
            <button id="btn-back" type="button" class="btn btn-primary btn-sm">
                <i class="fa fa-reply" aria-hidden="true"></i>
                &nbsp;&nbsp;Back</button>
        </div>
    </div>
<!--echo all the answers-->
    <div id="detail-answer" class="container">
        <?php
        foreach ($answers_array as $answer){
            echo
                "<p class='answer-p'>".
                    $answer['A_content']."
                </p>
                <div class='d-flex justify-content-end'>
                    <div id=".$answer['A_id'].'?rating'." class='rating-record'>".$answer['A_rating']."&nbsp;&nbsp;</div>
                    <button id=".'?liking'.$answer['A_id']." type='button' class='like btn btn-sm btn-blue-grey'>
                        <i class='fa fa-thumbs-o-up' aria-hidden='true'></i>
                    </button>
                    <button id=".'?disliking'.$answer['A_id']." type='button' class='dislike btn btn-sm btn-blue-grey'>
                        <i class='fa fa-thumbs-o-down' aria-hidden='true'></i>
                    </button>
                </div>";
        }
        ?>
    </div>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom JavaScript -->

</body>

</html>
