<?php
require 'connection.php';

$qid = $_GET['qid'];
$qtype = $_GET['qtype'];
$sql = "DELETE FROM question WHERE question_id = $qid";
$exec = $pdo->prepare($sql);
$exec->execute();
header("Location:showquestion.php?qtype=".$qtype);
?>