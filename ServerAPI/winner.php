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
    $status = $data['status'];
    $sql = "INSERT into match_history(match_id, playerid, total_score, ranking) values(?, ?, ?, ?)";
    $exe = $pdo->prepare($sql);
    $exe->execute([$matchid, $playerid, $score, $ranking]);
    $sql2 = "UPDATE user_ex1 set last_match_rank=? WHERE user_id = ?";
    $exe2 = $pdo->prepare($sql);
    $exe2->execute([$ranking, $playerid]);
    $sql3 = "UPDATE game set winner_id = ?, status = ? WHERE match_id = ?";
    $exe3 = $pdo->prepare($sql);
    $exe3->execute([$playerid, $status, $matchid]);
    echo 'data inputted!';
  } else {
    // The $data variable does not exist
    // $status = "None";
    echo 'no data!';
  }

?>