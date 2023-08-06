<?php
include 'connection.php';

$type = "reading";

$sql = "SELECT * from question WHERE type=?";
$exec = $pdo->prepare($sql);
$exec->execute([$type]);
$question = $exec->fetch(PDO::FETCH_ASSOC);

$myObj = new stdClass();
$myObj->question = $question;
$matchJSON = json_encode($myObj);

echo $matchJSON;
?>