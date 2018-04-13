<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Answer Question</title>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery_answer.js"></script>
</head>

<body>
<?php
$q_id = $_SESSION['q_id'];
$q_content = $_SESSION['q_content'];
?>
    <div id="answer-head">
        <div class="d-flex flex-center align-items-end">
            <h1 class="animated fadeIn mb-4">Answer Question</h1>
        </div>
    </div>
    <div id="answer-content-div" class="container">
        <p  id="answer-content-p">
            <?php echo $q_content;?>
        </p>
    </div>
    <div class="container">
        <div id="answer-type-hint" class="flex-center">
            <span>Please type in your answer</span>
        </div>
        <form role="form" action="../database/answer_question.php" method="get" onSubmit="return check();">
            <div id="answer-text-div" class="row">
                <label for="answer"></label>
                <textarea name="answer_content" type="text" class="form-control" id="answer" rows="8" maxlength=500></textarea>
            </div>
            <div id="answer-remain-ch" class="d-flex justify-content-end">
                <span id="answer-rm-num">500</span><span>&nbsp;characters left&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <div id="answer-submit-cancel" class="flex-center">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    &nbsp;&nbsp;Submit</button>
                <button id="answer-cancel" type="button" class="btn btn-primary btn-sm"
                <?php $val = "value='$q_id'"; echo $val;?>>
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                    &nbsp;&nbsp;Cancel</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->

</body>

</html>
