<?php

    include_once 'includes/header.php';

    $session = new Itrust\Session();
    if(!isset($_SESSION['id'])){
      \Itrust\Redirect::to('index.php');
      die();
    }

    $newReqTask = new Itrust\Task();
    $allTasks = $newReqTask->showTasks($_SESSION['id']);
    //Update or create the jason file where has the info about tasks and display it in search field
    $newReqTask->get_data($_SESSION['id']);
?>
<main>
    <section class="wrapper_allpage">
      <?php include_once 'includes/top-bar.php'?>
      <div class="wrapper_allpage__displayTasks">
        <div class="display__container">
          <div class="display__container--heading">
              <h3>My tasks</h3>
              <a href="create.php">
                <svg id="create_icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
              <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="0" y1="258" x2="512" y2="258" gradientTransform="matrix(1 0 0 -1 0 514)">
                <stop  offset="0" style="stop-color:#80D8FF"/>
                <stop  offset="1" style="stop-color:#EA80FC"/>
              </linearGradient>
              <path style="fill:url(#SVGID_1_);" d="M512,256c0,141.503-114.517,256-256,256C114.497,512,0,397.483,0,256c0-11.046,8.954-20,20-20
                s20,8.954,20,20c0,119.392,96.622,216,216,216c119.392,0,216-96.622,216-216c0-119.392-96.622-216-216-216c-11.046,0-20-8.954-20-20
                s8.954-20,20-20C397.503,0,512,114.517,512,256z M160.406,61.8l25.869-10.716c10.204-4.228,15.051-15.927,10.823-26.132
                s-15.926-15.054-26.132-10.823l-25.869,10.716c-10.204,4.228-15.051,15.927-10.823,26.132
                C138.488,61.148,150.168,66.038,160.406,61.8z M93.366,113.165l19.799-19.799c7.811-7.811,7.811-20.475,0-28.285
                s-20.475-7.811-28.285,0L65.081,84.88c-7.811,7.811-7.811,20.475,0,28.285C72.89,120.974,85.555,120.976,93.366,113.165z
                M24.952,197.099c10.227,4.236,21.914-0.642,26.132-10.823l10.716-25.87c4.228-10.205-0.619-21.904-10.823-26.132
                c-10.207-4.227-21.904,0.619-26.132,10.823l-10.716,25.869C9.901,181.172,14.748,192.871,24.952,197.099z M256,156
                c-11.046,0-20,8.954-20,20v60h-60c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h60v60c0,11.046,8.954,20,20,20
                c11.046,0,20-8.954,20-20v-60h60c11.046,0,20-8.954,20-20s-8.954-20-20-20h-60v-60C276,164.954,267.046,156,256,156z"/>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              </svg>
            </a>
          </div>
          <div class="display__container--tasks" id="table-data">
            <?php foreach($allTasks as $value) : ?>
              <div class="display__container--tasks-box">
                  <div class="display__info">
                    <div class="display__info__task ">
                        <label class="task-info" for="taskTittle">Tittle: </label>
                        <input type="text"  readonly="true" class="tittleName" ondblclick="this.readOnly='';" value="<?php echo $value['tittle'];?>">
                        <label class="task-info" for="taskTittle">Description: </label>
                        <textarea  name="descriptionTask" readonly="true" ondblclick="this.readOnly='';" class="descArea" cols="30" rows="10"> <?php echo $value['description'];?></textarea>
                  
                        <p><span class="task-info">Created by</span> <?php echo $value['firstName']; ?></p>
                        <p><span class="task-info">Date: </span><?php echo $value['createdAt']; ?></p>
                        <p><span class="task-info">Updated:</span> <?php echo $value['updatedAt']; ?></p>
                    </div>
                      <div class="box__task--buttons">
                        <form action="tasks.php" method="POST">
                        <input data-tasks-id="<?php echo $value['taskId']; ?>" type="submit" name="updateBtn" class="updateBtn" value="Update">
                        <input  data-tasks-id="<?php echo $value['taskId']; ?>" type="submit" name="deleteBtn" class=" deleteBtn" value="Delete">
                       
                        <input class="hideUserId" type="hidden" name="userId" value="<?php echo $value['id']; ?>">
                        </form>
                      </div>
                  </div>
             
              </div>
              <?php endforeach ?>
          </div>
        </div>
      </div>
  </section>
</main>
<?php include_once 'includes/footer.php'; ?>

  
  
 