<?php
include 'connection.php';

$leveldefault = 5;

$json = file_get_contents('php://input');
$data = json_decode($json, true);
// $data = "something";

if (isset($data)) {
    // The $data variable exists
    $playerid = $data['playerid'];
    // $playerid = "testing";
    $username = $data['username'];
    // $username = "testing";
    $next_level = $leveldefault;

    $sql = "INSERT into user_ex2(playerid, name, level) values(?, ?, ?)";
    $exe = $pdo->prepare($sql);
    $exe->execute([$playerid, $username, $next_level]);
    echo "data inputted!";
  } else {
    // The $data variable does not exist
    // $status = "None";
    echo "no post";
  }