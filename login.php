<?php require 'lib.php'; ?>  

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
            <input type="number" name="id" placeholder="id" required>

            <!-- <label for="mdp"></label> -->
            <input type="password" name="mdp" placeholder="Mot de passe" minlength="8" required>
            <button type="submit" class="sub">Se connecter</button>
        </form>
    </div>

</body>
</html>

<?php
    if (!empty($_SESSION['error'])){
        echo $_SESSION['error'];
    }
?>  