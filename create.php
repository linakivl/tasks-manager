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
            
            \Itrust\Redirect::to('main.php');
        }
    }
?>
<main>
 <section class="wrapper_allpage">
      <div class="create_container">
          <div class="create_container_box">
            <form action="create.php" method="POST" id="createForm">
                <label for="newTittle">Tittle task:</label>
                <input type="text" name="newTittle" placeholder="Tittle" onfocus="this.vlalue" required>
               
                <textarea name="newDescription" onfocus="this.vlalue"
                placeholder="Write your description.." id="writeDescription" 
                cols="50" rows="10" required></textarea>
                <input type="submit" name="createTask" value="create" id="createTask">
            </form>
          </div>
      </div>
 </section>
</main>
 
<?php   include_once 'includes/footer.php'; ?>