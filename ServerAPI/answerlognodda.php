<?php
include 'connection.php';

$json = file_get_contents('php://input');
$data = json_decode($json, true);
// $data = "something";

if (isset($data)) {
  // The $data variable exists
  $playerid = $data['playerid'];
  $sqlusr = "SELECT user_id, level from user_ex2 WHERE playerid = $playerid";
  $exeusr = $pdo->query($sqlusr);
  while($row = $exeusr->fetch()){
      $userid = $row['user_id'];
      $usrlevel = $row['level'];
  }
  // echo $userid, $usrlevel;
  $questionid = $data['questionid'];
  // $questionid = "1";
  $score = $data['score'];
  // $score = "30";
  $sql = "INSERT into answer_log_nodda(user_id, question_id, score) values(?, ?, ?)";
  $exe = $pdo->prepare($sql);
  $exe->execute([$userid, $questionid, $score]);

  if(isset($usrlevel)){
    if($score == "50"){
      if($usrlevel != 1){
        $next_level = $usrlevel-1;
        $sql2 = "UPDATE user_ex2 set level = ? WHERE user_id = ?";
        $exe2 = $pdo->prepare($sql2);
        $exe2->execute([$next_level, $userid]);
      }
    }
  }
  
  echo ' data inputted!';
} else {
  // The $data variable does not exist
  // $status = "None";
  // $userid = 5;
  echo 'no data!!';
}

?>
