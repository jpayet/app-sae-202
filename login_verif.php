<?php
    require 'lib.php';
    
    //Récupération des infos du formulaire
    if (!empty($_POST['id']) || !empty($_POST['mdp'])){
        $id=$_POST['id'];
        $mdp=$_POST['mdp'];
    } else {
        $_SESSION['error'] = '<p class="error">Veuillez remplir tous les champs</p>';
        header('location: login.php');
    }

    $co=conn();

    //On prépare la requête
    $req=$co->prepare('SELECT * FROM user WHERE user_id LIKE :id');

    try {
        //On lance la requête et on la stock dans $result
        $req->execute(array(
            //On défini les variables présentent dans la requête préparée
            ':id' => $id
        ));
    } catch (PDOException $e){
        echo '<p>Erreur :'.$e->getMessage().'</p>';
        die();
    }

    $count_result=$req->rowCount();
    if ($count_result>0){
        $column=$req->fetch(PDO::FETCH_ASSOC);
        if ($id == $column['user_id']){
            if (password_verify($mdp, $column['passwd'])) {
                $_SESSION['user_name'] = $column['first_name'];
                $_SESSION['user_id'] = $column['user_id'];
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
    