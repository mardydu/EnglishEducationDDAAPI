<!DOCTYPE html>
<?php
if(isset($_GET['qtype'])){
    $qtype = $_GET['qtype'];
}else{
    $qtype = "vocab";
}
?>

<head>
    <title>Teacher's View of English Education Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Question Types</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $qtype == "vocab" ? 'active' : '' ?>" aria-current="page" href="showquestion.php?qtype=vocab">Vocabulary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $qtype == "grammar" ? 'active' : '' ?>" aria-current="page" href="showquestion.php?qtype=grammar">Grammar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $qtype == "phrases" ? 'active' : '' ?>" aria-current="page" href="showquestion.php?qtype=phrases">Phrases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $qtype == "reading" ? 'active' : '' ?>" aria-current="page" href="showquestion.php?qtype=reading">Reading</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Question
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="showquestion.php?qtype=vocab">Vocab</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="showquestion.php?qtype=grammar">Grammar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="showquestion.php?qtype=phrases">Phrases</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="showquestion.php?qtype=reading">Reading</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>