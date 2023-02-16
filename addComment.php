<?php
// class include
session_start();
require_once 'class/User.php';
require_once 'class/Comment.php';
// instance
$user = new User();
$comment = new Comment();

// récupération du login et de l'id de la personne co avec les getters
$login = $user->getLogin();
$id = $user->getId();

// ajouter le commentaire 
if (isset($_POST['addComment'])) {
    $commentaire = $_POST['commentaire'];
    $comment->addComment($commentaire, $id);
}
