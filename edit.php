<?php

    include_once 'includes/header.php';
    $session = new Itrust\Session();

    //task id  for update and delete
    echo $_SESSION['taskId'];
    // $edit = new Itrust\Task();
    // $edit->showOneTask($_SESSION['taskId']);
    // var_dump($edit);
?>