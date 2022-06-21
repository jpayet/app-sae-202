<?php
    require 'lib.php';

    if (!empty($_SESSION['user_id'])){
        $id=$_SESSION['user_id'];
    } else{
        $_SESSION['error']='<p class="error">Veuillez vous connectez pour accéder à votre profil</p>';
        header('location: login.php');
    }

    $co=conn();
    $user=getUser($co,$id);
    disconnection($co);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>core</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xz/fonts@1/serve/cascadia-code.min.css"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body style=" background: rgba(21,21,21,1) ">


    <div class="cont">    
        <form action="update_profile.php" method="post" enctype="multipart/form-data" class="form-pro">
            <input type="hidden" name="id" value="<?= $id ?>"/>

            <div class="grp">
                <label for="prenom">Prénom</label>
                <input type="text" name="f_name" value="<?= $user['first_name'] ?>" disabled/>
            </div>

            <div class="grp">
                <label for="nom">Nom</label>
                <input type="text" name="l_name" value="<?= $user['last_name'] ?>" disabled/>
            </div>

            <div class="grp">
                <div class="img-pro">   
                    <label for="picture">Votre photo de profil</label>
                    <input type="file" name="profile_picture" required />
                </div>
             
                <img src="img/uploads/<?= $user['profile_pict'] ?>" alt="Photo de profil" class="pic-pro"/>
            </div>

            <input type="submit" value="Modifier"/>
        </form>
    </div>

</body>
</html>