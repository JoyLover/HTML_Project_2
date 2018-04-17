<?php
session_start();

require_once "../db_con.php";

$_SESSION['inputkeys'] = $_GET['inputkeys'];
$_SESSION['isAnswered'] = $_GET['isanswered'];

$keywords = explode(' ', $_GET['inputkeys']);
$keywords = array_filter($keywords);
//the "answered yet?" option
$isAnswered = $_GET['isanswered'];
if($isAnswered == '2')$isAnswered = '';
$width = $_GET['width'];
$hasCheckbox = $_GET['hasCheckbox'];

$sql = generate_sql($keywords, $isAnswered);
$res = $db->query($sql);

if($res->num_rows == 0){
    die();
}

$innerhtml =  "<div class='container'>
                   <table class='table table-bordered table-hover'>
                       <tbody>";

//echo table...
$subscript = 1;
$res->data_seek(0);
while($row = $res->fetch_assoc()){
    //useful info that will be put into the table
    $Q_id = $row['Q_ID'];
    $rand = rand();
    $content = $row['Q_CONTENT'];
    $subcontent = get_subcontent($content, $width);
    $time = substr($row['Q_TIME'],0,10);
    $isAnswered = $row['IS_ANSWERED'];
    //useful info that will be put into the table

    //if the table has checkbox on the first column
    if($hasCheckbox == 0){
        $innerhtml .=
            "<tr>
                <th scope='row' class='center-align'>$subscript</th>";
    }
    //no checkbox
    else{
        $innerhtml .=
            "<tr>
                <th scope='row' class='center-align'>
                    <input class='delete-checkbox' type='checkbox' value=$Q_id>
                </th>";
    }

    //the 2nd and 3rd column
    $innerhtml .=
        "<td id='popup' class='has_underline'><a href='pages/detail.php?q_id=$Q_id&sid=$rand'>
             $subcontent<span>$content</span></a></td>
        <td class='center-align d-none d-sm-block'>$time</td>";

    //'check' or 'close' symbol for the last column
    if($isAnswered == 1){
        $innerhtml .=
                "<td class='center-align'><i class='fa fa-check' aria-hidden='true'></i></td>
            </tr>";
    } else{
        $innerhtml .=
                "<td class='center-align'><i class='fa fa-close' aria-hidden='true'></i></td>
            </tr>";
    }
    $subscript++;
}

$innerhtml .=
             "</tbody>
        </table>
    </div>";

echo $innerhtml;

?>