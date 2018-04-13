<?php 
session_start();

$con = mysqli_connect("localhost", "root", "root", "qa");
if (mysqli_connect_errno())
{
    echo "Cannot connect to mysql: " . mysqli_connect_error();
}

$keywords = explode(' ', $_GET['inputkeys']);
$isAnswered = $_GET['isanswered'];
$width = $_GET['width'];
$hasCheckbox = $_GET['hasCheckbox'];

$_SESSION['inputkeys'] = $_GET['inputkeys'];
$_SESSION['isAnswered'] = $isAnswered;

//the "answered yet?" option
if($isAnswered == '2')$isAnswered = '';

//$keywords = explode(' ', 'is');
$keywords = array_filter($keywords);

//Find questions related to the input keywords.
switch (count($keywords)){
    case 0:
        $sql = "SELECT Q_id, Q_content, Q_time, isAnswered 
                FROM Questions
                WHERE isAnswered like '%$isAnswered%'
                ORDER BY Q_time DESC";
        break;
    case 1:
        $sql = "SELECT Q_id, Q_content, Q_time, isAnswered 
                FROM Questions
                WHERE isAnswered like '%$isAnswered%'
                AND Q_content like '%$keywords[0]%'
                ORDER BY Q_time DESC";
        break;
    case 2:
        $sql = "SELECT Q_id, Q_content, Q_time, isAnswered 
                FROM Questions
                WHERE isAnswered like '%$isAnswered%'
                AND Q_content like '%$keywords[0]%'
                AND Q_content like '%$keywords[1]%'
                ORDER BY Q_time DESC";
        break;
    default:
        $sql = "SELECT Q_id, Q_content, Q_time, isAnswered 
                FROM Questions
                WHERE isAnswered = $isAnswered
                AND Q_content like '%$keywords[0]%'
                AND Q_content like '%$keywords[1]%'
                AND Q_content like '%$keywords[2]%'
                ORDER BY Q_time DESC";
}
$results = mysqli_query($con, $sql);

//no result -> no table
if(mysqli_num_rows($results) == 0){
    die();
}

echo "<div class='container'>
          <table class='table table-bordered table-hover'>
              <tbody>";

//echo table...
$subscript = 1;
while($row = mysqli_fetch_array($results)){
    $Q_id = $row['Q_id'];
    $rand = rand();
    $content = $row['Q_content'];
    $subcontent = $content;
    if($width > 576){
        if (strlen($content) > 30) $subcontent = substr($content,0,30) . '...';
    }
    elseif($width <= 576){
        if (strlen($content) > 20) $subcontent = substr($content,0,20) . '...';
    }

    $time = substr($row['Q_time'],0,10);
    $isAnswered = $row['isAnswered'];
    if($hasCheckbox == 0){
        if($isAnswered == 1){
            echo
                "<tr>
                    <th scope='row' class='center-align'>$subscript</th>
                    <td id='popup' class='has_underline'><a href='pages/detail.php?q_id=$Q_id&sid=$rand'>
                    $subcontent<span>$content</span></a></td>
                    <td class='center-align d-none d-sm-block'>$time</td>
                    <td class='center-align'><i class='fa fa-check' aria-hidden='true'></i></td>
                </tr>";
        }else {
            echo
                "<tr>
                    <th scope='row' class='center-align'>$subscript</th>
                    <td id='popup' class='has_underline'><a href='pages/detail.php?q_id=$Q_id&sid=$rand'>
                    $subcontent<span>$content</span></a></td>
                    <td class='center-align d-none d-sm-block'>$time</td>
                    <td class='center-align'><i class='fa fa-close' aria-hidden='true'></i></td>
                </tr>";
        }
        $subscript++;
    }
    else{
        if($isAnswered == 1){
            echo
                "<tr>
                    <th scope='row' class='center-align'>
                        <input class='delete-checkbox' type='checkbox' value=$Q_id>
                    </th>
                    <td id='popup' class='has_underline'><a href='pages/detail.php'>$subcontent<span>$content</span></a></td>
                    <td class='center-align d-none d-sm-block'>$time</td>
                    <td class='center-align'><i class='fa fa-check' aria-hidden='true'></i></td>
                </tr>";
        }else {
            echo
                "<tr>
                    <th scope='row' class='center-align'>
                        <input class='delete-checkbox' type='checkbox' value=$Q_id>
                    </th>
                    <td id='popup' class='has_underline'><a href='pages/detail.php'>$subcontent<span>$content</span></a></td>
                    <td class='center-align d-none d-sm-block'>$time</td>
                    <td class='center-align'><i class='fa fa-close' aria-hidden='true'></i></td>
                </tr>";
        }
        $subscript++;
    }
}
echo
             "</tbody>
        </table>
    </div>";


?>