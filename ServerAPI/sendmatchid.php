<?php
include 'connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if(isset($_GET['matchnumber'])){
    $matchnumber = $_GET['matchnumber'];
    // echo $matchnumber;
}

if(isset($data)){
    $playerid = $data['playerid'];
    $matchnumber = $data['matchnumber'];
}

if(isset($playerid)){
    $sql3 = "SELECT level from user_ex1 WHERE playerid = ?";
    $exec3 = $pdo->prepare($sql3);
    $exec3->execute([$playerid]);
    $userlvl = $exec3->fetch();
    $userlvl = $userlvl['level'];
}

if(isset($matchnumber)){
    $sql = "SELECT match_id FROM game WHERE matchnumber = ?";
    // $sql = "SELECT match_id FROM game ORDER BY match_id DESC LIMIT 1";
    $exec = $pdo->prepare($sql);
    $exec->execute([$matchnumber]);
    $result1 = $exec->fetch();
    $matchid = $result1['match_id'];
    // echo $matchid;
}

$sql2 = "SELECT * from question";
$exec2 = $pdo->prepare($sql2);
$exec2->execute();
$question = $exec2->fetchAll(PDO::FETCH_ASSOC);
// var_dump($question);

// echo $question['answer1'];


$myObj = new stdClass();
if(isset($matchid)){
    $myObj->match_id = $result1['match_id'];
    // echo "ngok";
    // var_dump($myObj);
} else{
    $myObj->match_id = null;
    // echo "ngik";
}

// if(isset($matchnumber)){
//     $myObj->matchnumber = $matchnumber;
// }

$myObj->question = $question;
if(isset($userlvl)){
    $myObj->playerlevel = $userlvl;
}
$matchJSON = json_encode($myObj);
echo $matchJSON;
?>