//check the input answer is empty or not
function check() {
    var answer = $("#answer").val();
    if($.trim(answer) == '') {
        if (confirm("Empty answer!")) {
            return false;
        }
        else return false;
    }
    else {
        alert("Answer submitted");
        return true;
    }
}

$(document).ready(function () {
    //cancel -> quit answer -> go to detail.php and show the new question detail
    $("#answer-cancel").click(function () {
        $q_id = $(this).val();
        if(confirm("Do you want to quit answering?")){
            window.location.href = "detail.php?q_id=" + $q_id + "&sid=" + Math.random();
        }
        else return;
    });
    //show the remaining character when keyup
    $("#answer").keyup(function () {
        var currentLength = $("#answer").val().length;
        var maxLength = $("#answer").attr("maxlength");
        $("#answer-rm-num").html(maxLength - currentLength);
    });
});