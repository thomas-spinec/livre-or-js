<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="site.css">
    <link rel="icon" type="images/png" sizes="64x64" href="img/Logo_onglet.png" />
    <script src="scripts/profil.js"></script>
    <script src="scripts/menu.js"></script>

</head>

<body>
    <!-- Header -->
    <?php
    // class include
    require_once 'class/User.php';
    // instance
    $user = new User();
    session_start();
    require_once 'includes/header.php';

    // test if connected
    if (!$user->isConnected()) {
        header('Location: user.php?sign=conn');
    }
    $login = $user->getLogin();
    ?>
    <!-- /Header -->

    <!-- Main -->
    <main>
        <section class="centrage">
            <section>
                <h1>Profil</h1>
                <p>Bonjour <?= $login ?></p>
            </section>
            <section id="login">
                <section class="background_form">
                    <h2>Modifier le login</h2>
                    <form action="" method="post" id="loginForm">
                        <label for="login">login</label>
                        <input type="text" name="login" class="login" value="<?= $login ?>" required>
                        <p></p>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="password" placeholder="Mot de passe" required>
                        <p></p>
                        <input type="submit" value="Modifier" name="send" id="btnModifLogin">
                        <p></p>
                    </form>
                </section>
            </section>
            <section id="password">
                <section class="background_form">
                    <h2>Modifier le mot de passe</h2>
                    <form action="" method="post" id="passwordForm">
                        <label for="password">Ancien mot de passe</label>
                        <input type="password" name="password" class="password" placeholder="Mot de passe" id="oldPassword" required>
                        <p></p>
                        <label for="newPassword">Nouveau mot de passe</label>
                        <input type="password" name="newPassword" id="newPassword" placeholder="nouveau mot de passe" required>
                        <p></p>
                        <label for="newPassword2">Confirmation du nouveau mot de passe</label>
                        <input type="password" name="newPassword2" id="newPassword2" placeholder="Confirmation du nouveau mot de passe" required>
                        <p></p>
                        <input type="submit" value="Modifier" name="send" id="btnModifPass">
                        <p></p>
                    </form>
                </section>
            </section>
        </section>
    </main>

    <!-- /Main -->

    <!-- Footer -->
    <?php require_once 'includes/footer.php'; ?>
    <!-- /Footer -->

</body>

</html>