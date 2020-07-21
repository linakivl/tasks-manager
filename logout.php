<?php

    include_once 'includes/header.php';
    \Itrust\Session::logout();
    header("Location: index.php");

?>