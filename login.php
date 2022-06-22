<?php
    require 'lib.php';
    if (isset($_SERVER['HTTP_REFERER'])){
        if ($_SERVER['HTTP_REFERER'] == "https://mmi21h11.mmi-troyes.fr/app-sae-202/Inscription" || $_SERVER['HTTP_REFERER'] == "https://mmi21h11.mmi-troyes.fr/app-sae-202/sign_up.php" ){
            $co=conn();
            $last_user=get_last_user($co);
            disconnection();
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/cascadia-code.min.css"> 
    <link rel="stylesheet" href="css/style.css">

    <title>Connexion</title>
</head>
<body>

    <div class="logo-first">
        <img src="img/Logo.png" alt="">
    </div>
    <div class="center">
        <form action="login_verif.php" method="POST" class="form-co">

            <!-- <label for="id"></label> -->
            <input type="number" name="id" placeholder="id" min="0" required>

            <!-- <label for="mdp"></label> -->
            <input type="password" name="mdp" placeholder="Mot de passe" minlength="8" required>
            <button type="submit" class="sub">Se connecter</button>
        </form>

    </div>
    <?php
            if (!empty($last_user)){
                echo '<p id="last_user">Votre id est : '.$last_user['user_id'].', garder le bien précieusement. Dans le cas où vous le perdriez faites une demande auprès d\'un des membres de Dual Glitch.</p>';
            }
            if (!empty($_SESSION['error'])){
                echo $_SESSION['error'];
                unset ($_SESSION['error']);
            }

        ?>
</body>
</html>

