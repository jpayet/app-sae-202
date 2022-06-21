<?php
    require 'lib.php';

    $id=$_POST['id'];
    var_dump($_FILES);

    $fileFormats=$_FILES["profile_picture"]["type"];
    if (($fileFormats != "image/png") &&
        ($fileFormats != "image/jpg") &&
        ($fileFormats != "image/jpeg") &&
        ($fileFormats != "image/gif")){
            echo '<p>Désolé, le format d\'image n\'est pas reconnu. Veuillez choisir un des formats suivant: PNG, JPEG ou GIF. <p>'."\n";
            die();
    }

    $newPicture = date("Y_m_d_H_i_s")."---".$_FILES["profile_picture"]["name"];

    if (is_uploaded_file($_FILES["profile_picture"]["tmp_name"])){
        if (!move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "img/uploads/".$newPicture)){
            echo '<p> Désolé, il y a eu un problème avec la sauvegarde de votre image <p>'."\n";
            die();
        }
    } else {
        echo '<p> Aucune image importée </p>';
        die();
    }

    $co=conn();
    update_user_profile($co, $id, $newPicture);
    disconnection($co);
