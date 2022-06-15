<?php
    require 'lib.php';
    $_SESSION=array();
    session_destroy();
    header('location: index.php');
