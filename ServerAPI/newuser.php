<?php
include 'connection.php';

// $leveldefault = 5;

$json = file_get_contents('php://input');
$data = json_decode($json, true);
// $data = "something";

if (isset($data)) {
    // The $data variable exists
    $playerid = $data['playerid'];
    // $playerid = "testing";
    $username = $data['username'];
    // $username = "testing";
    $level = [];
    $score = [];

    $url = "http://127.0.0.1:5000/dda";
    $myObj = new stdClass();
    $myObj->score = $score;
    $myObj->level = $level;
    $options = array(
      'http' => array(
        'method'  => 'POST',
        'content' => json_encode($myObj),
        'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    if(isset($response)){
      $next_level = $response;
      echo $next_level;
    }else{
      $next_level = "5";
    }

    $sql = "INSERT into user_ex1(playerid, name, level) values(?, ?, ?)";
    $exe = $pdo->prepare($sql);
    $exe->execute([$playerid, $username, $next_level]);
    echo "data inputted!";
  } else {
    // The $data variable does not exist
    // $status = "None";
    echo "no post";
  }