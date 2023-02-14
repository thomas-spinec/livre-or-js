<?php
// class include
require_once 'class/User.php';
// instance
$user = new User();
?>

<header>
    <div class="container">
        <div class="flex">
            <div id="left">
                <h3>Thomas Spinec</h3>
                <h4>Web Developper</h4>
            </div>
            <?php
            // test si l'utilisateur est connecté
            if (isset($_GET['deconnexion'])) {
                if ($_GET['deconnexion'] == true) {
                    $user->disconnect();
                    header('Location: index.php');
                }
            } else if ($user->isConnected()) {
                $login = $user->getLogin();
            ?>

                <div id='center'>
                    <h3>Bonjour <?= $login ?></h3>
                    <a href='index.php?deconnexion=true'><button>Déconnexion</button></a>
                </div>
                <?php

                if ($user == 'admin') {
                    $_SESSION['admin'] = true;
                ?>
                    <nav>
                        <ul>
                            <li><a class='a_head' href='index.php'>Accueil</a></li>
                            <li><a class='a_head' href='profil.php'>Profil</a></li>
                            <li><a class='a_head' href='livre-or.php'>Livre d'or</a></li>
                            <li><a class='a_head' href='admin.php'>Info Utilisateurs</a></li>
                        </ul>
                    </nav>
                <?php
                } else {
                ?>
                    <nav>
                        <ul>
                            <li><a class='a_head' href='index.php'>Accueil</a></li>
                            <li><a class='a_head' href='profil.php'>Profil</a></li>
                            <li><a class='a_head' href='livre-or.php'>Livre d'or</a></li>
                        </ul>
                    </nav>
                <?php
                }
            } else {
                ?>
                <div>
                    <a href='user.php?sign=conn'><button>Connexion</button></a>
                    <a href='user.php?sign=insc'><button>Inscription</button></a>
                </div>
                <div>
                    <a class='a_head' href='index.php'>Accueil</a>
                    <a class='a_head' href='livre-or.php'>Livre d'or</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</header>