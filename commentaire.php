<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
    <link rel="stylesheet" href="site.css">
    <link rel="icon" type="images/png" sizes="64x64" href="img/Logo_onglet.png" />
    <script src="scripts/comment.js"></script>
    <script src="scripts/menu.js"></script>
</head>

<body>

    <!-- Include -->
    <?php
    require_once 'class/Comment.php';
    $comment = new Comment();
    ?>
    <!-- /Include -->

    <!-- Header -->
    <?php
    session_start();
    require_once 'includes/header.php';
    ?>
    <!-- /Header -->

    <!-- Main -->
    <main>
        <section id="commentaire" class="container">
            <section class="background_form">
                <h1>Laisser un commentaire</h1>
                <form action="" method="post" id="formCom">
                    <div class="center">
                        <label for="commentaire">Commentaire</label>
                        <textarea name="commentaire" id="comment" cols="60" rows="10" required></textarea>
                        <p></p>
                    </div>
                    <br>
                    <div class="center">
                        <input type="submit" value="Envoyer" id="com">
                        <p></p>
                    </div>
                </form>
            </section>
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <?php
    require_once 'includes/footer.php';
    ?>
    <!-- /Footer -->

</body>

</html>