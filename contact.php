<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf8">
    <title>Morgan Dawkins - Freelance Photograph - Contact</title>
    <?php include('./includes/head.php'); ?>
</head>
<body id="contact">
    <header>
        <?php include('./includes/header.php'); ?>
    </header>
    <main>
        <div id="hero">
            <h1>Contact me</h1>
        </div>
        <div class="container">
            <div class="row">
                <div id="content" class="column">
                    <h2 class="content-head">Pellentesque habitant morbi</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                        gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                    </p>
                    <p>
                        Aliquam sed dolor mi. Maecenas eu tortor neque. Phasellus ornare, purus sit
                        amet ultricies fermentum, erat ex sollicitudin odio, at aliquam quam ex non
                        risus. Quisque sit amet tincidunt nisl. Quisque mauris nisl, interdum quis
                        dapibus nec, blandit eget augue. Cras fringilla, enim sed euismod scelerisque,
                        leo tellus viverra massa, nec congue sem nisi ut turpis. Nam eu ipsum sed eros
                        fringilla maximus a non augue. Orci varius natoque penatibus et magnis dis
                        parturient montes.
                    </p>
                </div><!-- end first column -->
                <div class="column">
                    <form method="POST">
                        <p class="error">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Your full name">
                            <span>Please enter your name</span>
                        </p>
                        <p class="error">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Your email address">
                            <span>Please enter a valid email address</span>
                        </p>
                        <p class="error">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Your message" rows="8"></textarea>
                            <span>Please enter your message</span>
                        </p>
                        <p>
                            <button type="submit" name="submit" class="button">
                                Send
                            </button>
                        </p>
                    </form>

                    <?php

                    if (isset($_POST['submit'])) {


                    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset( $_POST['message']) && !empty($_POST['message'])) {
                        
                            if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL )) {
                                $user = rtrim(implode(':', $_POST), ':');
                                $file = fopen("./data/users.txt","a");
                                fwrite($file,$user.PHP_EOL);
                                fclose($file);
                            }
                            else
                            {
                                echo "<p style='color:#FA5858;'>Oops, email invalide !</p>";
                            }
                        }
                        else
                        {
                            echo  "<p style='color: #FA5858;'>veuillez remplir tous les champs</p>";
                        }

                    }

                    ?>

                </div><!-- end second column -->
            </div><!-- end row -->
        </div>
    </main>
    <footer>
        <?php include('./includes/footer.php'); ?>
    </footer>
</body>
</html>
