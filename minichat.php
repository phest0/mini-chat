<?php
session_start();
include 'pdo.php';

$chat_request = $PDO->query('SELECT pseudo, message FROM chat3');
$fetch_chat_request = $chat_request->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./style/style.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5">Chat</h2>
                <div class="container">

                    <?php for ($i = 0; $i < count($fetch_chat_request); $i++) {
                        $current = $fetch_chat_request[$i];
                        if ($i % 2) { ?>

                            <!-- message 1 start -->

                            <div class="row">
                                <div class="col d-flex flex-row flex-row-reverse">
                                    <!-- message 1 -->
                                    <div class="message-candidate w-75">
                                        <div class="row">
                                            <div class="col-8 col-lg-6">
                                                <img src="http://imgc.allpostersimages.com/images/P-473-488-90/68/6896/2GOJ100Z/posters/despicable-me-2-minions-movie-poster.jpg" class="message-photo">
                                                <h4 class="message-name"> <?php echo htmlspecialchars($current['pseudo']); ?> </h4>
                                            </div>

                                        </div>
                                        <div class="row message-text">
                                            <?php echo htmlspecialchars($current['message']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- message 1 end -->

                        <?php continue;
                        } ?>

                        <!-- message 2 start -->

                        <div class="row">
                            <div class="col">
                                <div class="message-hiring-manager">
                                    <div class="row">
                                        <div class="col-8 col-lg-6">
                                            <img src="http://imgc.allpostersimages.com/images/P-473-488-90/68/6896/2GOJ100Z/posters/despicable-me-2-minions-movie-poster.jpg" class="message-photo">
                                            <h4 class="message-name"><?php echo htmlspecialchars($current['pseudo']); ?></h4>
                                        </div>

                                    </div>
                                    <div class="row message-text ">
                                        <?php echo htmlspecialchars($current['message']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }  ?>

                    <!-- message 2 end -->

                    <!-- typing start -->
                    <?php if (isset($_SESSION['userPseudo'])) { ?>

                        <form method="post" action="minichat_post.php" class="mt-5">
                            <div class="form-group col-4">
                                <label for="pseudo">Bonjour <b><?php echo $_SESSION['userPseudo']; ?></b> !</label>
                                <!-- <input type="text" class="form-control" id="pseudo" type="text" name="pseudo"> -->
                            </div>

                            <div class="form-group col-12">
                                <label for="message">Message</label>
                                <input type="text" class="form-control" id="message" name="message">
                                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                                <a class="btn btn-danger mt-3 ml-2" href="minichat_logout.php">Se déconnecter</a>
                            </div>

                        </form>

                    <?php } else { ?>

                        <form method="post" action="minichat_login.php">
                            <div class="form-group col-4">
                                <label for="pseudo">Pseudo</label>
                                <input type="text" class="form-control" id="pseudo" type="text" name="pseudo">
                            </div>

                            <div class="form-group col-4">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                            </div>
                        </form>

                    <?php } ?>
                    <!-- //typing end -->

                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>