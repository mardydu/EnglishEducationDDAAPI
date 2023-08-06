<?php
include 'navbarplayers.php'
?>
<!DOCTYPE html>

<body>
    <div class="content container-fluid">
    <?php
    require 'connection.php';
    
    $sql = "SELECT user_ex1.name, question.difficulty, question.type, answer_log.score  FROM answer_log INNER JOIN user_ex1 ON user_ex1.user_id = answer_log.user_id INNER JOIN question ON question.question_id = answer_log.question_id";
    $exe = $pdo->prepare($sql);
    $exe->execute();

    ?>
    <div class="table-responsive">
        <table class="table table-striped" id="myTable">
            <thead class="thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Question Difficulty</th>
                    <th scope="col">Question Type</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;

                while ($row = $exe->fetch()) :
                    $i++;
                ?>
                    <tr>
                        <td scope="row"><?= $i; ?></td>
                        <td><pre><?= $row['name']; ?></pre></td>
                        <td><?= $row['difficulty']; ?></td>
                        <td><?= $row['type']; ?></td>
                        <td><?= $row['score']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>