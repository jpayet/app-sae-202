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
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>"/>

        <label for="prenom">Prénom</label>
        <input type="text" name="f_name" value="<?= $user['first_name'] ?>" disabled/>

        <label for="nom">Nom</label>
        <input type="text" name="l_name" value="<?= $user['last_name'] ?>" disabled/>

        <img src="img/uploads/<?= $user['profile_pict'] ?>" alt="Photo de profil"/>
        <label for="picture">Votre photo de profil</label>
        <input type="file" name="profile_picture" required />

        <input type="submit" value="Modifier"/>
    </form>
