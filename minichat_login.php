<?php
session_start();
include 'pdo.php';

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

if (isset($pseudo) && isset($password)) {

    $user_request = $PDO->query('SELECT pseudo, mot_de_passe FROM user');
    $fetch_user_request = $user_request->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < count($fetch_user_request); $i++) {
        $current = $fetch_user_request[$i];
        if ($current['pseudo'] == $pseudo && $current['mot_de_passe'] == $password) {
            $_SESSION['userPseudo'] = $current['pseudo'];
            break;
        }
    }
}
header("location: minichat.php");
