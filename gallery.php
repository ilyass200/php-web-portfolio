<?php

include('./includes/functions.php');

$page = (isset($_GET['page']) ? $_GET['page'] : NULL);


if ($page === NULL || !is_numeric($page)) {
    $page = 0;

}

$page = $page * 6;
$pictures = findPaged(6,$page);

if (count($pictures) === 0) {
    $page = 0;
    $page = $page * 6;
    $pictures = findPaged(6,$page);
}


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf8">
    <title>Morgan Dawkins - Freelance Photograph - Gallery</title>
    <?php include('./includes/head.php'); ?>
</head>
<body id="gallery">
    <header>
        <a href="index.html">
            <img src="css/logo.png" alt="Morgan Dawkins - Freelance Photograph">
        </a>
    </header>
    <main>
        <div id="hero">
            <h1>My greatest shots</h1>
        </div>
        <div class="container">
            <div id="pictures">
                <?php

                    foreach ($pictures as $picture) {
                        ?>
                        <a href="./detail.php?id=<?= $picture['id'] ?>" title="Picture <?= $picture['title'] ?>">
                        <img src="./images/medium/<?= $picture['slug'] ?>.jpg" alt="Picture <?= $picture['title'] ?>">
                        <br>Picture <?= $picture['title'] ?>
                        </a><?php
                        }

                        ?>
            </div>
            <p id="pager">
                <?php 

                $ThisPageId = $page / 6;
                $NextPageId = $ThisPageId + 1;
                $PreviousPageId = $ThisPageId - 1;

                if ($ThisPageId === 0) {
                    ?>
                    <a href="javascript:void(0)" class="btn disabled">
                        Previous page
                    </a>
                    <?php
                }
                else
                {
                    ?>
                    <a href="gallery.php?page=<?= $PreviousPageId ?>" class="btn">
                        Previous page
                    </a>
                    <?php
                }

                ?>
                <?php 
                if ($pictures[count($pictures) - 1]['id'] !== getCount()) {
                ?>
                    <a  href="gallery.php?page=<?= $NextPageId  ?>" class="btn">
                        Next page
                    </a>
                <?php
                }
                else
                {
                ?>
                    <a href="javascript:void(0)" class="btn disabled">
                        Next page
                    </a>
                <?php    
                }

                ?>


            </p>
        </div>
    </main>
    <footer>
        <?php include('./includes/footer.php'); ?>
    </footer>
</body>
</html>
