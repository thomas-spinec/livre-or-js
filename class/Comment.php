<?php
// création de la class

class Comment
{
    // attributs
    private $bdd;

    // constructeur
    public function __construct()
    {
        // connection à la BDD avec PDO
        // en local ////////////////////
        $servername = 'localhost';
        $dbname = 'livreor';
        $db_username = 'root';
        $db_password = '';

        // en ligne ///////////////////
        // $servername = 'localhost';
        // $dbname = 'thomas-spinec_livreor';
        // $db_username = 'adminbdd';
        // $db_password = 'basededonnees';


        // essaie de connexion
        try {
            $this->bdd = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $db_username, $db_password);

            // On définit le mode d'erreur de PDO sur Exception
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connexion réussie"; 
            $this->bdd->exec("set names utf8");
        }
        // si erreur, on capture les exceptions, s'il y en a une on affiche les infos
        catch (PDOException $e) {
            echo "Echec de la connexion : " . $e->getMessage();
            exit;
        }
    }

    // méthodes
    // ajout de commentaire
    public function addComment($commentaire, $idUser)
    {
        // requête pour ajouter un commentaire
        $requete = "INSERT INTO commentaires (commentaire, date, id_utilisateur) VALUES (:commentaire, NOW(), :idUser)";

        // préparation de la requête
        $insert = $this->bdd->prepare($requete);

        // special character
        $commentaire = htmlspecialchars($commentaire);

        // exécution de la requête avec liaison des paramètres
        $insert->execute(array(
            'commentaire' => $commentaire,
            'idUser' => $idUser
        ));

        echo "ok";
    }

    // affichage des commentaires
    public function displayComment()
    {
        // requête pour récupérer tout ce qu'il y a dans la base de données commentaires, ainsi que le login dans la base de donnée utilisateurs correspondant à l'id_utilisateurs de la base de données commentaires
        $requete = "SELECT commentaires.id, commentaires.commentaire, DATE_FORMAT(commentaires.date, '%d/%m/%Y') as date, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY id DESC";

        // exécution de la requête
        $select = $this->bdd->query($requete);

        // récupération dans un fetch ASSOC
        // $result = $select->fetch(PDO::FETCH_ASSOC);
        // affichage des commentaires
        while ($reponse = $select->fetch(PDO::FETCH_ASSOC)) {
?>
            <tr>
                <td class='date'><?= $reponse['date'] ?></td>
                <td class='user'><?= $reponse['login'] ?></td>
                <td class='comm'><?= $reponse['commentaire'] ?></td>
            </tr>
<?php
        }
    }
}
