<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Q&A</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
<!--    jquery file-->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery_index.js"></script>
</head>
<body>

<?php
$input_value = $_SESSION['inputkeys'];
$check_option = $_SESSION['isAnswered'];
switch ($check_option){
    case '0':
        $check_array = array('','checked','');
        break;
    case '2':
        $check_array = array('','','checked');
        break;
    default:
        $check_array = array('checked','','');
}
?>

<!--    head-->
    <div id="index-header">
        <div class="d-flex flex-center align-items-end">
            <h1 class="animated fadeIn mb-4">Project 2</h1>
        </div>
    </div>
    <div class="form-container">
        <form role="form">
            <div id="in-form">
                <div class="row">
                    <span id="warning-text" class="offset-xl-3 offset-lg-3 offset-md-3 offset-sm-2">
                        Only letters and numbers are accepted</span>
                </div>
                <div class="row">
                    <input class="form-control form-control-sm col-xl-5 offset-xl-3 \
                                  col-lg-5 offset-lg-3 col-md-5 offset-md-3 \
                                  col-sm-6 offset-sm-2"
                           type="text" placeholder="Please type in at most 3 key words"
                           id="input-keys" aria-label="Search" maxlength=60
                           <?php if(count($input_value)!=0)echo "value='".$input_value."'";
                                 else echo "value=''";?>>
<!--                    echo the previous search conditions-->
                    <button id="keys-btn" type="button"
                            class="col-xl-1 col-lg-2 col-md-2 col-sm-2 btn btn-primary btn-sm">
                        <i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
<!--            answered yet?-->
            <div class="flex-center">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">Answered Yet?</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is-answered" id="inlineRadio1" value='1'
                           <?php echo $check_array[0]?>>
                            <!--echo the previous search conditions-->
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is-answered" id="inlineRadio2" value='0'
                           <?php echo $check_array[1]?>>
                            <!-- echo the previous search conditions-->
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is-answered" id="inlineRadio3" value='2'
                           <?php echo $check_array[2]?>>
<!--                    echo the previous search conditions-->
                    <label class="form-check-label" for="inlineRadio3">All</label>
                </div>
            </div>
        </form>
    </div>
    <div>
        <hr>
    </div>
<!--ask and edit button-->
    <div id="btn-index-div" class="container">
        <div class="d-flex justify-content-end">
            <button id="ask-q" type="button" class="btn btn-sm btn-blue-grey">
                <i class="fa fa-comment" aria-hidden="true"></i>
                &nbsp;&nbsp;Ask</button>
            <button id="edit-q" type="button" class="btn btn-sm btn-blue-grey">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                &nbsp;&nbsp;Edit</button>
        </div>
    </div>

    <div id="no-question-hint">No Matching Questions</div>
    <form role="form">
        <div id="tb-hint"></div>
    </form>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom JavaScript -->

</body>

</html>