<?php
/**
 * Created by PhpStorm.
 * User: joy
 * Date: 16/04/2018
 * Time: 10:15 AM
 */

/**
 * Class con_mysqli [add an error check statement]
 */
class con_mysqli extends mysqli {
    public function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
    }
}

/**
 * @param $keys {Array} [the input keywords array, splited by ' ']
 * @param $is_answered {String} [flag that whether question has been answered]
 * @return string [sql statement]
 */
function generate_sql ($keys, $is_answered){
    $sql = "SELECT Q_ID, Q_CONTENT, Q_TIME, IS_ANSWERED 
            FROM QUESTIONS
            WHERE IS_ANSWERED like '%$is_answered%' ";
    for($i = 0; $i < min(3, count($keys)); $i++){
        $key = $keys[$i];
        $sql .= "AND Q_content like '%$key%' ";
    }
    $sql .= "ORDER BY Q_time DESC ";
    return $sql;
}

/**
 * @param $conte {String} [full question content]
 * @param $width {int} [screen width]
 * @return string [sub question content append by '...']
 */
function get_subcontent ($content, $width){
    $subcontent = $content;
    if($width > 576){
        if (strlen($content) > 30) $subcontent = substr($content,0,30) . '...';
    }
    else {
        if (strlen($content) > 20) $subcontent = substr($content,0,20) . '...';
    }
    return $subcontent;
}

/**
 * echo all the answers
 * @param $answers_array {Array} [answers in a array]
 */
function echo_answer ($answers_array) {
    foreach ($answers_array as $answer){
        echo
            "<p class='answer-p'>".
            $answer['A_CONTENT']."
                </p>
                <div class='d-flex justify-content-end'>
                    <div id=".$answer['A_ID'].'?rating'." class='rating-record'>".$answer['RATING']."&nbsp;&nbsp;</div>
                    <button id=".'?liking'.$answer['A_ID']." type='button' class='like btn btn-sm btn-blue-grey'>
                        <i class='fa fa-thumbs-o-up' aria-hidden='true'></i>
                    </button>
                    <button id=".'?disliking'.$answer['A_ID']." type='button' class='dislike btn btn-sm btn-blue-grey'>
                        <i class='fa fa-thumbs-o-down' aria-hidden='true'></i>
                    </button>
                </div>";
    }
}