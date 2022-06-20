<?php
    require 'lib.php';

    $core_1=$_POST['core_1'];
    $core_2=$_POST['core_2'];
    $core_3=$_POST['core_3'];
    $core_4=$_POST['core_4'];

    $co=conn();

    $req=$co->prepare('SELECT * FROM answer WHERE team_set = :team_color');
    $req2=$co->prepare('SELECT * FROM user INNER JOIN team ON user._grp=team.id WHERE user_id = :idUser');
    $req3=$co->prepare('UPDATE team SET score = :new_score WHERE id = :group_id ');

    try {
        $req2->execute(array(
            ':idUser' => $_SESSION['user_id']
        ));
    } catch (PDOException $e){
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    $count_result2=$req2->rowCount();

    if ($count_result2==1){
        $column2=$req2->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id']['color'] = $column2['color'];
        $_SESSION['user_id']['group_nb'] = $column2['id'];
    }

    try {
        $req->execute(array(
            ':team_color' => $_SESSION['user_id']['color']
        ));
    } catch (PDOException $e){
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    $count_result=$req->rowCount();

    if ($count_result>0){
        $result=$req->fetchAll(PDO::FETCH_COLUMN, 3);
        if ($core_1 == $result[0]){
            try {
                $req3->execute(array(
                    ':newScore' => 1,
                    ':group_id' => $_SESSION['user_id']['group_nb']
                ))                 ;
            } catch (PDOException $e) {
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
        } else {
            $_SESSION['invalid'] = '<p></p>'
        }
    }











