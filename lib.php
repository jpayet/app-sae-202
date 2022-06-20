<?php
    session_start();
    require 'secretxyz123.php';

    //Connexion à la base de données
    function conn(){
        $db = null;
        try{
            $db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=sae202_app;charset=UTF8;', USER, PASSWORD);
            $db->query('SET NAMES utf8;');
        } catch (PDOException $e){
            echo "Erreur :".$e->getMessage()."<br />";
            die();
        }
        return $db;
    }

    //Déconnexion à la base de données
    function disconnection(){
        $db = null;
    }

    function dashboard($db){
        if (!empty($_SESSION['user_id'])) {
            $req = $db->prepare('SELECT name, color, profile_pict FROM team INNER JOIN user ON team.id=user._grp WHERE user_id= :user_id');
            try {
                $req->execute(array(
                    ':user_id' => $_SESSION['user_id']
                ));
            } catch (PDOException $e) {
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
            $count_result = $req->rowCount();
            if ($count_result > 0) {
                $column = $req->fetch(PDO::FETCH_ASSOC);
                    echo '<img src="img/uploads/'.$column['profile_pict'].'" alt="profile picture" />';
                    echo '<p>Bienvenue, ' . $_SESSION['user_name'] . '</p>' . "\n";
                    echo '<p>Membre de ' . $column['name'] . '</p>' . "\n";
                    echo '<a href="profile.php">modifier le profil</a> | <a href="logout.php">Déconnexion</a>';
            }
        } else {
            echo '<p> Bienvenue sur Dual Glitch, connectez vous pour accéder à votre QG </p>';
        }
    }

    function getUser($db, $idUser){
        $req=$db->prepare('SELECT * FROM user WHERE user_id = :idUser');
        try {
            $req->execute(array(
                ':idUser' => $idUser
            ));
        } catch (PDOException $e){
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        return $req->fetch();
    }

    function update_user_profile($db, $id, $newPicture){
        $req=$db->prepare('UPDATE user SET profile_pict = :picture WHERE user_id = :id');
        try {
            $req->execute(array(
                ':picture' => $newPicture,
                ':id' => $id
            ));
        } catch (PDOException $e){
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($req->rowCount() == 1){
            header('location: index.php');
        } else {
            echo '<p> Oups... Une erreur est survenue </p>';
            die();
        }
    }

