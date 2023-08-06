<?php
include 'navbar.php';
if (isset($_GET['qtype'])) {
    $qtype = $_GET['qtype'];
} else {
    $qtype = "vocab";
}
?>
<!DOCTYPE html>

<body>
    <div class="content container-fluid">
    <h3 id="lblLevel">All levels</h3>
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter Level
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" onclick="filterLevel('')">All levels</a></li>
                        <li><a class="dropdown-item" onclick="filterLevel(5)">Level 5</a></li>
                        <li><a class="dropdown-item" onclick="filterLevel(4)">Level 4</a></li>
                        <li><a class="dropdown-item" onclick="filterLevel(3)">Level 3</a></li>
                        <li><a class="dropdown-item" onclick="filterLevel(2)">Level 2</a></li>
                        <li><a class="dropdown-item" onclick="filterLevel(1)">Level 1</a></li>
                    </ul>
                </div>
            </div>
            <div class="btn-group ml-2" role="group" aria-label="Second group">
                <a class="btn btn-outline-primary ml-2" href="addquestion.php?qtype=<?=$qtype;?>">Add Question</a>
            </div>
        </div>
    </div>
    <?php
    require 'connection.php';
    
    $sql = "SELECT * FROM question WHERE type = ?";
    $exe = $pdo->prepare($sql);
    $exe->execute([$qtype]);

    ?>
    <div class="table-responsive">
        <table class="table table-striped" id="myTable">
            <thead class="thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Text</th>
                    <th scope="col">Question 1</th>
                    <th scope="col">Answer 1</th>
                    <th scope="col">Question 2</th>
                    <th scope="col">Answer 2</th>
                    <th scope="col">Question 3</th>
                    <th scope="col">Answer 3</th>
                    <th scope="col">Question 4</th>
                    <th scope="col">Answer 4</th>
                    <th scope="col">Question 5</th>
                    <th scope="col">Answer 5</th>
                    <th scope="col">Type</th>
                    <th scope="col">Level</th>
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
                        <td><pre><?= $row['text']; ?></pre></td>
                        <td>
                            <pre><?= $row['question1']; ?></pre>
                        </td>
                        <td><?= $row['answer1']; ?></td>
                        <td>
                            <pre><?= $row['question2']; ?></pre>
                        </td>
                        <td><?= $row['answer2']; ?></td>
                        <td>
                            <pre><?= $row['question3']; ?></pre>
                        </td>
                        <td><?= $row['answer3']; ?></td>
                        <td>
                            <pre><?= $row['question4']; ?></pre>
                        </td>
                        <td><?= $row['answer4']; ?></td>
                        <td>
                            <pre><?= $row['question5']; ?></pre>
                        </td>
                        <td><?= $row['answer5']; ?></td>
                        <td><?= $row['type']; ?></td>
                        <td><?= $row['difficulty']; ?></td>
                        <td><a href="editquestion.php?qid=<?= $row['question_id'] ?>" class="btn btn-warning">Edit</a></td>
                        <!-- <a href="deletequestion.php?qid=$row['question_id']&qtype= $qtype;" class="btn btn-danger">Delete</a> -->
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>
    <script>
        function filterLevel(level) {
            var filter, table, tr, td, i, txtValue, lblLevel;
            filter = level;
            if (level==''){
                lblLevel = "All levels";
            }else{
                lblLevel = "Filtered Level: "+level;
            }
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            document.getElementById("lblLevel").innerHTML = lblLevel;
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[13];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>