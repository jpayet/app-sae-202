<?php
    require 'lib.php';
    
    //Récupération des indos du formulaire
    $id=$_POST['id'];
    $mdp=$_POST['mdp'];

    $co=conn();

    //On prépare la requête
    $req=$co->prepare("SELECT * FROM user WHERE user_id LIKE :id");

    //On lance la requête et on la stock dans $result
    $result=$req->execute(array(
        //On défini les variables présentent dans la requête préparée
        'id' => $id
    ));

    $result_nb=$result->rowCount();
    if ($result_nb>0){
        $column=$result->fetch(PDO::FETCH_ASSOC);
        if ($id == $column['user_id']){
            if (password_verify($mdp, $column['passwd'])) {
                $_SESSION['user_name'] = $column['first_name'];
                header('location: index.php'); //à changer avec le nom de la page ou sera redirigé l'user apres s'être co
            } else {
                $_SESSION['error'] = '<p class="error">Le mot de passe saisi est incorrect</p>';
                header('location: login.php');
            }
        } else {
            $_SESSION['error'] = '<p class="error">L\'identifiant n\'est pas valide</p>';
            header('location: login.php');
        }
    }

    disconnection();
    