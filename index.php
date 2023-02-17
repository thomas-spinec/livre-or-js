<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="site.css">
    <link rel="icon" type="images/png" sizes="64x64" href="img/Logo_onglet.png" />
    <script src="scripts/menu.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    session_start();
    require_once 'includes/header.php';
    ?>
    <!-- /Header -->

    <!-- Main -->
    <main>
        <section class="centrage" id="intro">
            <h1>Bienvenue sur ce livre d'or</h1>
            <p>Vous pouvez aller voir les commentaires sur la page dédiée</p>
            <p>Vous pouvez aussi laisser un commentaire, mais pour ça vous devez vous connecter</p>
        </section>

        <section class="centrage" id="goal">
            <h2>Le but du projet:</h2>
            <p>Le but de ce projet est de créer un livre d'or avec une base de données.</p>
            <p>Une page contenant l'inscription et la connexion est présente, il fallait utiliser JS pour éviter le rechargement de page entre l'affichage de l'un des formulaires ou de l'autre.</p>
        </section>
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <?php require_once 'includes/footer.php'; ?>
    <!-- /Footer -->

</body>

</html>