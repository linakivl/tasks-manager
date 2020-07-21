<?php

include_once 'includes/header.php';
    $session = new Itrust\Session();

    $newReqTask = new Itrust\Task();
    $allTasks = $newReqTask->showTasks($_SESSION['id']);
    
    // print_r($allTasks);
    if(isset($_POST['editBtn'])){
      $_SESSION['taskId'] = $_POST['taskId'];;
      header("Location: edit.php");
    }
?>
<main>
  <section class="wrapper">
      <div class="wrapper__topNav">
          <h2 class="wrapper__topNav--heading">Tasks</h2>
          <div class="wrapper__topNav--text">
              <h2 class="welcome--heading">Welcome <?php echo $_SESSION['fname']; ?></h2>
              <a href="logout.php" class="top__nav-logout">Logout</a>
          </div>
      </div>
  </section>
  <section class="wrapper__container">
      <div class="wrapper__container--box">
          <div class="box__tasks">
              <h2 class="box__tasks--heading">My tasks</h2>
              <a href="create.php" class="createBtn">Create</a>
              <a href="create.php" class="btn">Create</a>
              <?php foreach($allTasks as $value) : ?>
              <div class="box__task">
                  <h3>Tittle: <?php echo $value['tittle'];?></h3>
                  <p>Description: <?php echo $value['description']; ?></p>
                  <p>Created by <?php echo $value['firstName']; ?>|Date: <?php echo $value['createdAt']; ?></p>
                  <p>Updated: <?php echo $value['updatedAt']; ?></p>
                  <form action="tasks.php" method="POST">
                    <div class="box__task--buttons">
                      <input type="submit" name="editBtn" class="btn btn--edit" value="edit">
                      <input type="hidden" name="taskId" value="<?php echo $value['taskId']; ?>">
                    </div>
                  </form>
              </div>
              <?php endforeach ?>
          </div>
      </div>
  </section>
</main>

<!--   
  <h2>My tasks</h2>

   
  <form action="tasks.php" method="POST" class="form-tasks">
    <label for="taskText">Title:</label>
    <input type="text" name="taskText" class="inputTasks" placeholder="Task title">
    <label for="description">Description: </label>
    <textarea id="w3review" name="w3review" rows="4" cols="50"> Write you task..</textarea>
    <input type="submit" name="createBtn" value="Create a Task">
    <input type="submit" name="updateBtn" value="Update a Task">
    <input type="submit" name="deleteBtn" value="Delete a Task">
  </form>   -->



  
  
 