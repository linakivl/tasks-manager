<?php

    include_once 'includes/header.php';
    $session = new Itrust\Session();
    \Itrust\Session::logout();
    die();
?>