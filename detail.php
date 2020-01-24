<?php

include('./includes/functions.php');

$id = ((isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0));
$picture = findOneById($id);


if ($picture === NULL) {
    header('location: gallery.php');
}


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf8">
    <title>Morgan Dawkins - Freelance Photograph - Shot</title>
    <?php include('./includes/head.php'); ?>
</head>
<body id="detail">
    <header>
        <?php include('./includes/header.php'); ?>
    </header>
    <main>
        <div id="hero">
            <!-- Picture title -->
            <h1><?= $picture['title'] ?></h1>
        </div>
        <div class="container">
            <figure>
                <!-- Picture file (large) -->
                <img src="images/large/<?= $picture['slug'] ?>.jpg" alt="<?= $picture['title'] ?>"/>
                <!-- Picture date and location -->
                <figcaption><?= $picture['date'] ." - " .$picture['location'] ?></figcaption>
            </figure>
            <!-- Picture description  -->
            <p><?= $picture['description'] ?></p>
            <p id="pager">
                <?php

                $NextPage = $id + 1;
                $PreviousPage = $id - 1;

                if ($id == 1) {
                  ?>
                    <a href="javascript:void(0)" class="btn disabled">
                        Previous shot
                    </a>
                  <?php  
                }
                else
                {
                    ?>
                    <a href="detail.php?id=<?= $PreviousPage ?>" class="btn">
                        Previous shot
                    </a>
                    <?php
                }

                ?>
                <?php
                    if ($id == getCount()) {
                        ?>
                        <a href="javascript:void(0)" class="btn disabled">
                            Next shot
                        </a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="detail.php?id=<?= $NextPage ?>" class="btn">
                            Next shot
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
