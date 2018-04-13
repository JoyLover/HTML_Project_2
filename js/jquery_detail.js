$(document).ready(function () {
    //answer button -> go to answer.php
    $("#btn-answer").click(function () {
        window.location.href = "../pages/answer.php";
    });
    //delete button -> delete the quesiton -> back to index.php and have a new search based on previous search conditions
    $("#btn-delete").click(function () {
        if(confirm("Do you want to the question and all it's answers?")){
            window.location.href = "../database/delete_question.php";
        }
        else return;
    });

    //back button -> go to index.php and have a new search based on previous search conditions
    $("#btn-back").click(function () {
        window.location.href = "../index.php?sid=" + Math.random();
    });
    //like button -> rating plus 1 and redisplay it
    $(".like").click(function () {
        var aId = $(this).attr("id").substr(7,);
        like(aId);
    });
    //dislike button -> rating minus 1 and redisplay it
    $(".dislike").click(function () {
        var aId = $(this).attr("id").substr(10,);
        dislike(aId);
    });
});

//like plus 1
function like(answerId) {
    var url = "../database/rating_up.php";
    url = url + "?a_id=" + answerId;
    url = url + "&sid=" + Math.random();
    var ratingId = answerId + "?rating";
    var htmlobj = $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: url,
        dataType: "html",   //expect html to be returned
        async: true,
        success:function (response) {
            $('[id="' + ratingId + '"]').html(response);
        }
    });
}

//dislike minus 1
function dislike(answerId) {
    var url = "../database/rating_down.php";
    url = url + "?a_id=" + answerId;
    url = url + "&sid=" + Math.random();
    var ratingId = answerId + "?rating";
    var htmlobj = $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: url,
        dataType: "html",   //expect html to be returned
        async: true,
        success:function (response) {
            $('[id="' + ratingId + '"]').html(response);
        }
    });
}