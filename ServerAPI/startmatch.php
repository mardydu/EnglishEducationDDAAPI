<?php
include 'connection.php';


$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (isset($data)) {
    // The $data variable exists
    $num_players = $data['numparticipants'];
    $status = $data['status'];
    $matchnumber = $data['matchnumber'];
    $sql = "INSERT into game(num_participants, status, matchnumber) values(?, ?, ?)";
    $exe = $pdo->prepare($sql);
    $exe->execute([$num_players, $status, $matchnumber]);
    echo 'data inputted!';
  } else {
    // The $data variable does not exist
    // $status = "None";
    echo 'no data!';
  }

?>