<?php require 'lib.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/cascadia-code.min.css"> 
    <link rel="stylesheet" href="css/style.css">

    <title>Inscription</title>
</head>
<body>
    <div class="logo-first">
        <img src="img/Logo.png" alt="">
    </div>
    <div class="center">
        <form action="sign_up_verif.php" method="POST" class="form-co">

            <div class="form-twin">
                <!-- <label for="nom">Nom</label> -->
                <input type="text" name="l_name" placeholder="Nom" required>

                <!-- <label for="prenom">Prénom</label> -->
                <input type="text" name="f_name" placeholder="Prénom" required> 
            </div>
    


            <!-- <label for="mdp">Mot de passe</label> -->
            <input type="password" name="mdp" placeholder="Mot de passe" minlength="8" required>

            <!-- <label for="mdp2">Entrez a nouveau votre mot de passe</label> -->
            <input type="password" name="mdp2"  placeholder="Confirmer" minlength="8" required>

                    <!-- <label for="TD">TD</label> -->
            <select name="td"  placeholder="TD">
                <option value="">Votre TD</option>
                <option value="AB">AB</option>
                <option value="CD">CD</option>
                <option value="EF">EF</option>
                <option value="GH">GH</option>
            </select>


            <button type="submit" class="sub">S'inscrire</button>
        </form>
        <?php
            if (!empty($_SESSION['error'])){
                echo $_SESSION['error'];
                unset ($_SESSION['error']);
            }
        ?>
    </div>

</body>
</html>