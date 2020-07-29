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
    case 'search-task': {
        $session = new Itrust\Session();
        $searchTask = $newReqTask->get_data($_SESSION['id'], $_POST['inputSearch']);
        if($searchTask){
            foreach($searchTask as $task){

            $output = "<div class='display__container--tasks-box'>
                        <div class='display__info'>
                            <div class='display__info__task'>
                                <label class='task-info' for='taskTittle'>Tittle:</label>
                                <input type='text'  readonly='true' class='tittleName' ondblclick='this.readOnly='';'  value='{$task['tittle']}'>  
                                <label class='task-info' for='taskTittle'>Description: </label>
                                <textarea  name='descriptionTask' readonly='true' ondblclick='this.readOnly='';' class='descArea' cols='30' rows='10'>{$task['description']}</textarea>
                          
                                <p><span class='task-info'>Created by</span> '{$task['firstName']}'</p>
                                <p><span class='task-info'>Date: </span>'{$task['createdAt']}'</p>
                                <p><span class='task-info'>Updated:</span> '{$task['updatedAt']}'</p>
                            </div>
                    
                            <div class='box__task--buttons'>
                                <form action='tasks.php' method='POST'>
                                <input data-tasks-id='{$task['taskId']}' type='submit' name='updateBtn' class='updateBtn' value='Update'>
                                <input  data-tasks-id='{$task['taskId']}' type='submit' name='deleteBtn' class=' deleteBtn' value='Delete'>
                            
                                <input class='hideUserId' type='hidden' name='userId' value='{$task['taskId']}'>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                        ";
            }
            echo $output;
        }
       
        break;
    }
}
die();