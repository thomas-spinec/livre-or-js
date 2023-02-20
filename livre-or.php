<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
    <link rel="stylesheet" href="site.css">
    <link rel="icon" type="images/png" sizes="64x64" href="img/Logo_onglet.png" />
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
        <section class="container">
            <section id="livre-or">
                <h1>Livre d'or</h1>
                <table class="commentaires">
                    <thead>
                        <tr>
                            <th class="date">Posté le</th>
                            <th class="user">Par l'utilisateur</th>
                            <th class="comm">Commentaires</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $comments = $comment->displayComment();
                        ?>
                    </tbody>
                </table>
            </section>
            <section id="leaveComment">
                <?php
                if ($user->isConnected()) {
                ?>
                    <br>
                    <div class="center">
                        <a href='commentaire.php'><button>Laisser un commentaire</button></a>
                    </div>
                <?php
                } else {
                ?>
                    <div class="center">
                        <p>Vous devez être connecté pour laisser un commentaire</p>
                        <a href='user.php?sign=conn'><button>Se connecter</button></a>
                    </div>
                <?php
                }
                ?>
            </section>
        </section>
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <?php require_once 'includes/footer.php'; ?>
    <!-- /Footer -->


</body>