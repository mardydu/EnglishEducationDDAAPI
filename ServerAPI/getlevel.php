<?php
include 'connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if(isset($_GET['playerid'])){
    $playerid = $_GET['playerid'];
}

if(isset($data)){
    $playerid = $data['playerid'];
}

if(isset($playerid)){
    $sql3 = "SELECT level from user_ex1 WHERE playerid = ?";
    $exec3 = $pdo->prepare($sql3);
    $exec3->execute([$playerid]);
    $userlvl = $exec3->fetch();
    $userlvl = $userlvl['level'];
}

$myObj = new stdClass();

if(isset($userlvl)){
    $myObj->playerlevel = $userlvl;
}
$matchJSON = json_encode($myObj);

echo $matchJSON;
?>