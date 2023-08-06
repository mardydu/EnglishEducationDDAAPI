<?php
require 'connection.php';

$qid = $_POST['qid'];
$qtext = $_POST['questionText'];
$q1 = $_POST['questionq1'];
$qa1 = $_POST['answerq1'];
$q2 = $_POST['questionq2'];
$qa2 = $_POST['answerq2'];
$q3 = $_POST['questionq3'];
$qa3 = $_POST['answerq3'];
$q4 = $_POST['questionq4'];
$qa4 = $_POST['answerq4'];
$q5 = $_POST['questionq5'];
$qa5 = $_POST['answerq5'];
$qtype = $_POST['qtype'];
$qdiff = $_POST['qdifficulty'];

$sql = "UPDATE question SET text = ?, question1 = ?, question2 = ?, question3 = ?, question4 = ?, question5 = ?, answer1 = ?, answer2 = ?, answer3 = ?, answer4 = ?, answer5 = ?, type = ?, difficulty = ? WHERE question_id = ?";
$exec = $pdo->prepare($sql);
$exec->execute([$qtext, $q1, $q2, $q3, $q4, $q5, $qa1, $qa2, $qa3, $qa4, $qa5, $qtype, $qdiff, $qid]);

$location = 'Location: showquestion.php?qtype='.$qtype;
header($location);

?>