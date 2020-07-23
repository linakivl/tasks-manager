<?php 

if( ! isset($_POST['action'])) exit;
require_once 'vendor/autoload.php';

$newReqTask = new Itrust\Task();

switch ($_POST['action']) {

    case 'delete-task': {

        $newReqTask->deleteTask($_POST['deleteVal']); 
        break;
    } 
    case 'update-task': {

        $newReqTask->updateTask($_POST['updateVal'], $_POST['tittle'], $_POST['description'],$_POST['userId']);
        break;
    }
}

die;
