<?php
    
    include_once 'includes/header.php';
    $session = new \Itrust\Session();
   
    if(isset($_POST['createTask'])){

        $tittleTask = $_POST['newTittle'];
        $descriptionTask = $_POST['newDescription'];
        $userId = $_SESSION['id'];
        $newTask = new \Itrust\Task();
        $newTask->createTask($tittleTask, $descriptionTask, $userId);
        if($newTask){
            header("Location: tasks.php");
        }
    
    }
?>
    <form action="create.php" method="POST" id="createForm">
        <input type="text" name="newTittle" placeholder="Write the task tittle" required>
        <textarea name="newDescription" autofocus="autofocus"
        placeholder="Write your description.." id="writeDescription" 
        cols="5" rows="10" required></textarea>
        <input type="submit" name="createTask" value="create">
    </form>
