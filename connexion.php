<?php
// class include
session_start();
require_once 'class/User.php';
// instance
$user = new User();

// test si le login est dispo
if (isset($_POST['verifLogin'])) {
    $login = $_POST['verifLogin'];
    $user->isUserExist($login);
}

// inscription
if (isset($_POST['send'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->connect($login, $password);
}
