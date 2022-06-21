  <?php
    require 'lib.php';
    if (empty($_SESSION['user_id'])) {
        $_SESSION['error'] = '<p class="error">Veuillez vous connectez pour accéder à l\'activité</p>';
        header('location: login.php');
    }
  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>core</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/cascadia-code.min.css"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url('img/background-dash.png');">

<div class="goB">
    <a href="index.php"><h2>Retourner à l'accueil</h2></a>
</div>


    <div class="screen">
        <div class="box">
            <div class="forms">
                <form action="break_core_verif.php" method="post" class="form-lign">
                    <label for="core_1"></label>
                    <input type="text" name="core_1" placeholder="Clé N°1" required>
                    <input type="submit" value="Envoyer">
                </form>
            
                <form action="break_core_verif.php" method="post"class="form-lign">
                    <label for="core_2"></label>
                    <input type="text" name="core_2" placeholder="Clé N°2" required>
                    <input type="submit" value="Envoyer">
                </form>
            
                <form action="break_core_verif.php" method="post"class="form-lign">
                    <label for="core_3"></label>
                    <input type="text" name="core_3" placeholder="Clé N°3" required>
                    <input type="submit" value="Envoyer">
                </form>
            
                <form action="break_core_verif.php" method="post"class="form-lign">
                    <label for="core_4"></label>
                    <input type="text" name="core_4" placeholder="Clé N°4" required>
                    <input type="submit" value="Envoyer">
                </form>
                <?php
                    if (isset($_SESSION['invalid'])){
                        echo $_SESSION['invalid'];
                        unset($_SESSION['invalid']);
                    }
                    if (isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                ?>
            </div>
        </div>

        <div class="hearts">
            <img src="img/coeur.png" alt="" class="core-img"  id="heart1">
            <img src="img/coeur.png" alt="" class="core-img"  id="heart2">
            <img src="img/coeur.png" alt="" class="core-img"  id="heart3">
            <img src="img/coeur.png" alt="" class="core-img"  id="heart4">
        </div>
    </div>

    



    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
    
</body>
</html>