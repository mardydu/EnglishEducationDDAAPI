<?php
require 'connection.php';

$qid = $_GET['qid'];
include 'navbar.php';
$sql = "SELECT * FROM question WHERE question_id = $qid";
$exe = $pdo->query($sql);
$exe->execute();
$questionData = $exe->fetch();
?>

<body>
    <div class="content container-fluid">
        <form action="editquestionproc.php" method="post">
            <div class="mb-3">
                <label for="questionText" class="form-label"><b>Text or Passage</b></label>
                <textarea type="text" class="form-control" name="questionText" rows="5"><?= $questionData['text']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="questionq1" class="form-label"><b>Question 1</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq1"><?= $questionData['question1']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq1" class="form-label"><b>Answer 1</b></label>
                <select class="form-select" name="answerq1">
                    <option <?= $questionData['answer1'] == "A" ? 'selected' : '' ?> value="A">A</option>
                    <option <?= $questionData['answer1'] == "B" ? 'selected' : '' ?> value="B">B</option>
                    <option <?= $questionData['answer1'] == "C" ? 'selected' : '' ?> value="C">C</option>
                    <option <?= $questionData['answer1'] == "D" ? 'selected' : '' ?> value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq2" class="form-label"><b>Question 2</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq2"><?= $questionData['question2']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq2" class="form-label"><b>Answer 2</b></label>
                <select class="form-select" name="answerq2">
                    <option <?= $questionData['answer2'] == "A" ? 'selected' : '' ?> value="A">A</option>
                    <option <?= $questionData['answer2'] == "B" ? 'selected' : '' ?> value="B">B</option>
                    <option <?= $questionData['answer2'] == "C" ? 'selected' : '' ?> value="C">C</option>
                    <option <?= $questionData['answer2'] == "D" ? 'selected' : '' ?> value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq3" class="form-label"><b>Question 3</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq3"><?= $questionData['question3']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq3" class="form-label"><b>Answer 3</b></label>
                <select class="form-select" name="answerq3">
                    <option <?= $questionData['answer3'] == "A" ? 'selected' : '' ?> value="A">A</option>
                    <option <?= $questionData['answer3'] == "B" ? 'selected' : '' ?> value="B">B</option>
                    <option <?= $questionData['answer3'] == "C" ? 'selected' : '' ?> value="C">C</option>
                    <option <?= $questionData['answer3'] == "D" ? 'selected' : '' ?> value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq4" class="form-label"><b>Question 4</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq4"><?= $questionData['question4']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq4" class="form-label"><b>Answer 4</b></label>
                <select class="form-select" name="answerq4">
                    <option <?= $questionData['answer4'] == "A" ? 'selected' : '' ?> value="A">A</option>
                    <option <?= $questionData['answer4'] == "B" ? 'selected' : '' ?> value="B">B</option>
                    <option <?= $questionData['answer4'] == "C" ? 'selected' : '' ?> value="C">C</option>
                    <option <?= $questionData['answer4'] == "D" ? 'selected' : '' ?> value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq5" class="form-label"><b>Question 5</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq5"><?= $questionData['question5']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq5" class="form-label"><b>Answer 5</b></label>
                <select class="form-select" name="answerq5">
                    <option <?= $questionData['answer5'] == "A" ? 'selected' : '' ?> value="A">A</option>
                    <option <?= $questionData['answer5'] == "B" ? 'selected' : '' ?> value="B">B</option>
                    <option <?= $questionData['answer5'] == "C" ? 'selected' : '' ?> value="C">C</option>
                    <option <?= $questionData['answer5'] == "D" ? 'selected' : '' ?> value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="qtype" class="form-label"><b>Type</b></label>
                <select class="form-select" name="qtype">
                    <option <?= $questionData['type'] == "vocab" ? 'selected' : '' ?> value="vocab">vocab</option>
                    <option <?= $questionData['type'] == "grammar" ? 'selected' : '' ?> value="grammar">grammar</option>
                    <option <?= $questionData['type'] == "phrases" ? 'selected' : '' ?> value="phrases">phrases</option>
                    <option <?= $questionData['type'] == "reading" ? 'selected' : '' ?> value="reading">reading</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="qdifficulty" class="form-label"><b>Question Difficulty (1 is the hardest and 5 is the easiest)</b></label>
                <select class="form-select" name="qdifficulty">
                    <option <?= $questionData['difficulty'] == "5" ? 'selected' : '' ?> value="5">5</option>
                    <option <?= $questionData['difficulty'] == "4" ? 'selected' : '' ?> value="4">4</option>
                    <option <?= $questionData['difficulty'] == "3" ? 'selected' : '' ?> value="3">3</option>
                    <option <?= $questionData['difficulty'] == "2" ? 'selected' : '' ?> value="2">2</option>
                    <option <?= $questionData['difficulty'] == "1" ? 'selected' : '' ?> value="1">1</option>
                </select>
            </div>
            <input type="hidden" name="qid" value="<?=$qid;?>">
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
</body>