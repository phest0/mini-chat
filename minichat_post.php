<?php
session_start();
include 'pdo.php';
$pseudo = $_SESSION['userPseudo'];
$message = $_POST['message'];
if (!empty($pseudo) && !empty($message)) {
    $prepared_request = $PDO->prepare('INSERT INTO chat3(pseudo, message) VALUES(:pseudo, :message)');
    $prepared_request->execute(
        array(
            "pseudo" => $pseudo,
            "message" => $message
        )
    );
}

header('Location: minichat.php');
