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
