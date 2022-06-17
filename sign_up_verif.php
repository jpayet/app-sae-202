<?php
    require 'lib.php';

    $f_name = htmlentities(trim($_POST['f_name']));
    $l_name = htmlentities(trim($_POST['l_name']));
    $td = htmlentities(trim($_POST['td']));
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];

    if ($mdp == $mdp2){
        $passwd = $mdp;
    } else {
        $_SESSION['error'] = '<p>Les deux mots de passe ne correspondent pas</p>';
        header('location: sign_up.php');
    }

    $co=conn();

    $req=$co->prepare('INSERT INTO user (last_name, first_name, passwd, TD, _grp) VALUES (:last_name, :first_name, :password, :td, 0)');

    try {
        $req->execute(array(
            ':last_name' => ucfirst(mb_strtolower($l_name)),
            ':first_name' => ucfirst(mb_strtolower($f_name)),
            ':password' => password_hash($passwd, PASSWORD_DEFAULT),
            ':td' => mb_strtoupper($td)
        ));
    } catch (PDOException $e){
        echo '<p>Erreur : '.$e->getMessage().'</p>';
        die();
    }

    if ($req->rowCount()==1){
        header('location: login.php');
    } else {
        echo '<p>Erreur lors de la création du compte</p>';
        die();
    }

    disconnection();



