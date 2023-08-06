<?php
include 'navbar.php';
?>

<body>
    <div class="content container-fluid">
        <form action="addquestionproc.php" method="post">
            <div class="mb-3">
                <label for="questionText" class="form-label"><b>Text or Passage</b></label>
                <textarea type="text" class="form-control" name="questionText" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="questionq1" class="form-label"><b>Question 1</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq1"></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq1" class="form-label"><b>Answer 1</b></label>
                <select class="form-select" name="answerq1" required>
                    <option value="">Select answer</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq2" class="form-label"><b>Question 2</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq2"></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq2" class="form-label"><b>Answer 2</b></label>
                <select class="form-select" name="answerq2" required>
                    <option value="">Select answer</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq3" class="form-label"><b>Question 3</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq3"></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq3" class="form-label"><b>Answer 3</b></label>
                <select class="form-select" name="answerq3" required>
                    <option value="">Select answer</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq4" class="form-label"><b>Question 4</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq4"></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq4" class="form-label"><b>Answer 4</b></label>
                <select class="form-select" name="answerq4" required>
                    <option value="">Select answer</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionq5" class="form-label"><b>Question 5</b></label>
                <textarea rows="6" type="text" class="form-control" name="questionq5"></textarea>
            </div>
            <div class="mb-3">
                <label for="answerq5" class="form-label"><b>Answer 5</b></label>
                <select class="form-select" name="answerq5" required>
                    <option value="">Select answer</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="qtype" class="form-label"><b>Type</b></label>
                <select class="form-select" name="qtype" required>
                    <option value="">Select type</option>
                    <option <?= $_GET['qtype'] == 'vocab' ? 'selected' : '' ?> value="vocab">vocab</option>
                    <option <?= $_GET['qtype'] == 'grammar' ? 'selected' : '' ?> value="grammar">grammar</option>
                    <option <?= $_GET['qtype'] == 'phrases' ? 'selected' : '' ?> value="phrases">phrases</option>
                    <option <?= $_GET['qtype'] == 'reading' ? 'selected' : '' ?> value="reading">reading</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="qdifficulty" class="form-label"><b>Question Difficulty (1 is the hardest and 5 is the easiest)</b></label>
                <select class="form-select" name="qdifficulty" required>
                    <option value="">Select difficulty</option>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</body>