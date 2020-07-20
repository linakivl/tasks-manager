<?php

use Itrust\Messages;
 
require_once 'vendor/autoload.php';
include_once 'includes/header.php';

    $session = new \Itrust\Session();

    if(!$_SESSION['id']){
      header("Location: index.php");
    }

?>

  <h1> Welcome 
    <?php echo $_SESSION['fname']; ?>
  </h1>
  
  <h2>My tasks</h2>

   
  <form action="tasks.php" method="POST" class="form-tasks">
    <label for="taskText">Title:</label>
    <input type="text" name="taskText" class="inputTasks" placeholder="Task title">
    <label for="description">Description: </label>
    <textarea id="w3review" name="w3review" rows="4" cols="50"> Write you task..</textarea>
    <input type="submit" name="createBtn" value="Create a Task">
    <input type="submit" name="updateBtn" value="Update a Task">
    <input type="submit" name="deleteBtn" value="Delete a Task">
  </form>  



  
  
 