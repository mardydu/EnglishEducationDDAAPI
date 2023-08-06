<?php
include 'connection.php';

$type = "vocab";

$sql = "SELECT * from question WHERE type=?";
$exec = $pdo->prepare($sql);
$exec->execute([$type]);
$question = $exec->fetchAll(PDO::FETCH_ASSOC);

$myObj = new stdClass();
$myObj->question = $question;
$matchJSON = json_encode($myObj);

echo $matchJSON;
?>