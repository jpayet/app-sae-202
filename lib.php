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
        $req = $db->prepare('SELECT name, color FROM group INNER JOIN user ON group.id=user._grp WHERE user_id= :user_id');
        try {
            $req->execute(array(
                ':user_id' => $_SESSION['user_id']
            ));
        } catch (PDOException $e){
            echo '<p>Erreur : '.$e->getMessage().'</p>';
            die();
        }
        $count_result = $req->rowCount();
        if ($count_result > 0) {
            while ($column = $req->fetch(PDO::FETCH_ASSOC)) {
                echo '<p>Bienvenue, ' . $_SESSION['user_name'] . '</p>'."\n";
                echo '<p>Membres de ' . $column['name']. '</p>'."\n";
            }
        }
    }

