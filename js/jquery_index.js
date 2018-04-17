//get the window size while opening the page
var w_width = $(window).width();
var tag = 1;
var tmp = 1;
if(w_width <= 576)tag = 0;

//automatically response when window size changes
$(window).resize(function () {
    w_width = $(window).width();
    if(w_width <= 576)tmp = 0;
    else tmp = 1;
    if(tag != tmp){
        // $("#keys-btn").html(w_width);
        tag = tmp;
        var inputKeys = $("#input-keys").val();
        var isAnswered = $("input[name='is-answered']:checked").val();
        SearchQst(inputKeys, isAnswered, w_width);
    }
});

//when document is loaded
$(document).ready(function(){
    //get the url search to decide whether to have a search immediately based on the previous search conditions
    if(window.location.search != ''){
        //get the previous search conditions
        var inputKeys = $("#input-keys").val();
        var isAnswered = $("input[name='is-answered']:checked").val();
        w_width = $(window).width();
        if($("#ask-q").attr("id") == "ask-q"){
            SearchQst(inputKeys, isAnswered, w_width, 0);
        }
        else {
            SearchQst(inputKeys, isAnswered, w_width, 1);
        }
    }

    //when search button and "answered yet?" radio are clicked, have a search
    $("#keys-btn,[name='is-answered']").click(function(){
        var inputKeys = $("#input-keys").val();
        var isAnswered = $("input[name='is-answered']:checked").val();
        w_width = $(window).width();
        if($("#ask-q").attr("id") == "ask-q"){
            SearchQst(inputKeys, isAnswered, w_width, 0);
        }
        else {
            SearchQst(inputKeys, isAnswered, w_width, 1);
        }
        // $("#btn-index-div").css("visibility","visible");
    });

    //when ask/cancel button is clicked
    $("#ask-q").click(function () {
        //ask button -> go to ask.php
        if($(this).attr("id") == "ask-q"){
            window.location.href = "pages/ask.php";
        }
        //cacel button -> change back to previous icon and functions and have a search again
        else {
            $("#cancel-edit").html("<i class='fa fa-comment' aria-hidden='true'></i>&nbsp;&nbsp;Ask");
            $("#delete-q").html("<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>\n" + "&nbsp;&nbsp;Edit");
            $("#cancel-edit").attr("id","ask-q");
            $("#delete-q").attr("id","edit-q");
            var inputKeys = $("#input-keys").val();
            var isAnswered = $("input[name='is-answered']:checked").val();
            w_width = $(window).width();
            SearchQst(inputKeys, isAnswered, w_width, 0);
        }
    });

    //when edit/delete button is clicked
    $("#edit-q").click(function () {
        //edit button -> change button icon and functions and show the "delete" checkbox
        if($(this).attr("id") == "edit-q"){
            $("#ask-q").html("<i class='fa fa-times-circle' aria-hidden='true'></i>&nbsp;&nbsp;Cancel");
            $("#edit-q").html("<i class='fa fa-trash' aria-hidden='true'></i>&nbsp;&nbsp;Delete");
            $("#ask-q").attr("id","cancel-edit");
            $("#edit-q").attr("id","delete-q");
            var inputKeys = $("#input-keys").val();
            var isAnswered = $("input[name='is-answered']:checked").val();
            w_width = $(window).width();
            SearchQst(inputKeys, isAnswered, w_width, 1);
        }
        //delete button -> delete all seleted questions and back to previous icon and functions
        else {
            var delete_q_id = $(".delete-checkbox:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');

            if(delete_q_id == ''){
                alert("At least one item must be selected");
                return;
            }

            if(confirm("Do you want to delete all seleted questions?")){
                deleteQst(delete_q_id);

                $("#cancel-edit").html("<i class='fa fa-comment' aria-hidden='true'></i>&nbsp;&nbsp;Ask");
                $("#delete-q").html("<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>\n" + "&nbsp;&nbsp;Edit");
                $("#cancel-edit").attr("id","ask-q");
                $("#delete-q").attr("id","edit-q");

                var inputs = $("#input-keys").val();
                var isAsd = $("input[name='is-answered']:checked").val();
                w_width = $(window).width();
                SearchQst(inputs, isAsd, w_width, 0);
            }
            else return;
        }
    });
});

//delete selected questions
function deleteQst(delete_q_id) {
    var url = "./database/delete_question.php";
    url = url + "?q_id=" + delete_q_id;
    url = url + "&sid=" + Math.random();
    var htmlobj = $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: url,
        async: true
    });
}

//search result
function SearchQst(inputKeys, isAnswered, width, hasCheckbox)
{
    var inputOk = checkInput(inputKeys);

    //Search if meeting the conditions
    if (inputOk)
    {
        document.getElementById("warning-text").style.visibility = "hidden";
        var url = "./database/search_question.php";
        url = url + "?inputkeys=" + inputKeys;
        url = url + "&isanswered=" + isAnswered;
        url = url + "&width=" + width;
        url = url + "&hasCheckbox=" + hasCheckbox;
        url = url + "&sid=" + Math.random();
        // loadXMLDoc(url);
        var htmlobj = $.ajax({
            type: "GET",
            url: url,
            dataType: "html",
            async: true,
            success:function (response) {
                if(response == ''){
                    $("#tb-hint").html('');
                    $("#no-question-hint").css("visibility", "visible");
                }
                else {
                    $("#no-question-hint").css("visibility", "hidden");
                    $("#tb-hint").html(response);
                }
            }
        });
    }
    else return;
}

//check input
function checkInput(inputStr) {
    var reg = /[^0-9a-z\s]+/i;   //Uppercase and lowercase letters and numbers
    if(reg.test(inputStr))
    {
        document.getElementById("warning-text").style.visibility = "visible";
        document.getElementById("input-keys").value = "";
        return false;
    }else {
        document.getElementById("warning-text").style.visibility = "hidden";
        return true;
    }
}
