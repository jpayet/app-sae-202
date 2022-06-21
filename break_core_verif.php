<?php
    require 'lib.php';

    if (!empty($_POST['core_1'])){
        $core_1=$_POST['core_1'];
    }
    if (!empty($_POST['core_2'])){
        $core_2=$_POST['core_2'];
    }
    if (!empty($_POST['core_3'])){
        $core_3=$_POST['core_3'];
    }
    if (!empty($_POST['core_4'])){
        $core_4=$_POST['core_4'];
    }

    $co=conn();

    $req=$co->prepare('SELECT * FROM answer WHERE team_set = :team_color ORDER BY answ_order ASC;');
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
        $_SESSION['color'] = $column2['color'];
        $_SESSION['group_nb'] = $column2['id'];
        $_SESSION['score'] = $column2['score'];
    } else {
        $_SESSION['checked_error']='marche pas';
        header('location: core_base.php');
    }

    try {
        $req->execute(array(
            ':team_color' => $_SESSION['color']
        ));
    } catch (PDOException $e){
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    $count_result=$req->rowCount();

    if ($count_result>0){
        $result=$req->fetchAll(PDO::FETCH_COLUMN, 2);
        if ($_SESSION['score'] < 1) {
            if ($core_1 == $result[0]) {
                try {
                    $req3->execute(array(
                        ':new_score' => 1,
                        ':group_id' => $_SESSION['group_nb']
                    ));
                } catch (PDOException $e) {
                    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                    die();
                }
                $_SESSION['success'] = '<p>BRAVO ! Vous pouvez désormais vous attaquez au 2e coeur</p>';
                header('location: core_base.php');
            } else {
                $_SESSION['invalid'] = '<p>Ce n\'est pas le bon code. Soyez rigoureux !</p>';
                header('location: core_base.php');
            }
        } elseif ($_SESSION['score'] == 1) {
            if ($core_2 == $result[1]) {
                try {
                    $req3->execute(array(
                        ':new_score' => 2,
                        ':group_id' => $_SESSION['group_nb']
                    ));
                } catch (PDOException $e) {
                    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                    die();
                }
                $_SESSION['success'] = '<p>BRAVO ! Vous pouvez désormais vous attaquez au 3e coeur</p>';
                header('location: core_base.php');
            } else {
                $_SESSION['invalid'] = '<p>Ce n\'est pas le bon code. Soyez rigoureux !</p>';
                header('location: core_base.php');
            }
        } elseif ($_SESSION['score'] == 2) {
            if ($core_3 == $result[2]) {
                try {
                    $req3->execute(array(
                        ':new_score' => 3,
                        ':group_id' => $_SESSION['group_nb']
                    ));
                } catch (PDOException $e) {
                    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                    die();
                }
                $_SESSION['success'] = '<p>BRAVO ! Vous pouvez désormais vous attaquez au 4e coeur</p>';
                header('location: core_base.php');
                } else {
                    $_SESSION['invalid'] = '<p>Ce n\'est pas le bon code. Soyez rigoureux !</p>';
                    header('location: core_base.php');
                }
        } elseif ($_SESSION['score'] == 3){
            if ($core_4 == $result[3]) {
                try {
                    $req3->execute(array(
                        ':new_score' => 4,
                        ':group_id' => $_SESSION['group_nb']
                    ));
                } catch (PDOException $e) {
                    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                    die();
                }
                $_SESSION['success'] = '<p>BRAVO ! Vous êtes venu à bout du virus</p>';
                header('location: core_base.php');
            } else {
                $_SESSION['invalid'] = '<p>Ce n\'est pas le bon code. Soyez rigoureux !</p>';
                header('location: core_base.php');
            }
        } else {
            $_SESSION['success'] = '<p>Vous l\'avez battu...C\'est bon...Il est temps d\'arrêter</p>';
            header('location: core_base.php');
        }
    }











