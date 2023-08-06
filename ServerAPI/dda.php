<?php
include 'connection.php';

// $json = file_get_contents('php://input');
// $data = json_decode($json, true);
// $data = "something";
if(isset($_POST['userid'])){
  $data = $_POST['userid'];
  // echo "ini data".$data;
}

if (isset($data)) {
    // The $data variable exists
    $userid = $data;
    // $userid = "1";
    $sql = "SELECT question_id, score from answer_log WHERE user_id = $userid";
    $exe = $pdo->query($sql);
    $level = [];
    $score = [];
    while($row = $exe->fetch()){
        array_push($score, (int)$row['score']);
        $questionid = $row['question_id'];
        $sqllevel = "SELECT difficulty from question WHERE question_id = $questionid";
        $exelevel = $pdo->query($sqllevel);
        $hint = $exelevel->fetch();
        $hint = $hint['difficulty'];
        array_push($level, (int)$hint);
    }

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
    $url = "http://127.0.0.1:5000/dda";
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    if(isset($response)){
      $next_level = $response;
      echo $next_level;
    }else{
      $next_level = "5";
    }
    $next_level = "10";
    $sql2 = "UPDATE user_ex1 set level = ? WHERE user_id = ?";
    $exe2 = $pdo->prepare($sql2);
    $exe2->execute([$next_level, $userid]);
    echo 'data inputted!';

  } else {
    // The $data variable does not exist
    // $status = "None";
    echo 'no data!!';
  }



?>