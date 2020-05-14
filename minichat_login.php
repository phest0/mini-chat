<?php
session_start();
include 'pdo.php';

$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

// if (!empty($pseudo) && !empty($password)) {

//     $user_request = $PDO->query('SELECT pseudo, mot_de_passe FROM user');
//     $fetch_user_request = $user_request->fetchAll(PDO::FETCH_ASSOC);

//     for ($i = 0; $i < count($fetch_user_request); $i++) {
//         $current = $fetch_user_request[$i];
//         if ($current['pseudo'] == $pseudo && $current['mot_de_passe'] == $password) {
//             $_SESSION['userPseudo'] = $current['pseudo'];
//             break;
//         }
//     }
// }

if (!empty($pseudo) && !empty($password)) {

    $preparedRequest = $PDO->prepare('SELECT * FROM user where pseudo=:pseudo and mot_de_passe=:password');
    $preparedRequest->execute(
        array(
            'pseudo' => $pseudo,
            'password' => $password
        )
    );

    $user = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
    if (count($user) == 1) {
        $_SESSION['userPseudo'] = $user[0]['pseudo'];
    }
}

header("location: minichat.php");
