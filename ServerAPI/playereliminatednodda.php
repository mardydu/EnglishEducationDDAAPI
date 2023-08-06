<?php
include 'connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (isset($data)) {
    // The $data variable exists
    $matchid = $data['matchid'];
    $playerid = $data['playerid'];
    $ranking = $data['ranking'];
    $totalscore = $data['total_score'];
    $sql = "INSERT into match_history(match_id, playerid, total_score, ranking) values(?, ?, ?, ?)";
    $exe = $pdo->prepare($sql);
    $exe->execute([$matchid, $playerid, $score, $ranking]);
    $sql2 = "UPDATE user_ex2 set last_match_rank=? WHERE playerid = ?";
    $exe2 = $pdo->prepare($sql);
    $exe2->execute([$ranking, $playerid]);
    echo "data inputted!";
  } else {
    // The $data variable does not exist
    // $status = "None";
    echo "no data!";
  }

?>