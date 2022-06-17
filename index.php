<?php
    require 'lib.php';

    $co=conn();
    dashboard($co);
    disconnection();

    var_dump($_SESSION['user_name']);
    var_dump($_SESSION['user_id']);