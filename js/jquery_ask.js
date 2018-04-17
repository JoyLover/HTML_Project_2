$(document).ready(function () {
    //display remaining character when keyup
    $("#ask-txt").keyup(function () {
        var currentLength = $("#ask-txt").val().length;
        var maxLength = $("#ask-txt").attr("maxlength");
        $("#rm-ch").html(maxLength - currentLength);
    });
    //cancel button -> go to index.php and have a new search
    $("#cancel-ask").click(function () {
        if(confirm("Do you want to quit asking?")){
            window.location.href = "../index.php?sid=" + Math.random();
        }
        else return;
    });
});

//check the input question is empty or not
function check() {
    var question = $("#ask-txt").val();
    if($.trim(question) == '') {
        if (confirm("Empty Question!")) {
            return false;
        }
        else return false;
    }
    else {
        alert("Completed");
        return true;
    }
}