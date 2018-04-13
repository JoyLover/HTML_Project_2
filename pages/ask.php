<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ask Question</title>
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
    <script type="text/javascript" src="../js/jquery_ask.js"></script>
</head>

<body>
<!--head-->
    <div id="ask-head">
        <div class="d-flex flex-center align-items-end">
            <h1 class="animated fadeIn mb-4">Ask Question</h1>
        </div>
    </div>
<!--input text area and two buttons-->
    <div class="container">
        <form id="ask-form" role="form" action="../database/ask_question.php" method="get" onSubmit="return check();">
            <div class="row">
                <label for="ask-txt"></label>
                <textarea name="input_q" type="text" class="form-control" id="ask-txt" rows="8" maxlength=500></textarea>
            </div>
            <div id="remain-ch-div" class="d-flex justify-content-end">
                <span id="remain-ch">500</span><span>&nbsp;characters left&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <div id="ask-submit-cancel" class="flex-center">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    &nbsp;&nbsp;Submit</button>
                <button id="cancel-ask" type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                    &nbsp;&nbsp;Cancel</button>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom JavaScript -->

</body>

</html>