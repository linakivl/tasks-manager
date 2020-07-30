<?php

    include_once 'includes/header.php';

    $session = new Itrust\Session();
    if(!isset($_SESSION['id'])){
      \Itrust\Redirect::to('index.php');
      die();
    }

    $newReqTask = new Itrust\Task();
    $allTasks = $newReqTask->showTasks($_SESSION['id']);
    
?>
<main>
    <section class="wrapper_allpage">
      <?php include_once 'includes/top-bar.php'?>
      <div class="wrapper_allpage__displayTasks">
        <div class="sidebar">
            <div class="sidebar__icons">
            <svg class="searchIcon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
			<g>
				<g>
					<path d="M310,190c-5.52,0-10,4.48-10,10s4.48,10,10,10c5.52,0,10-4.48,10-10S315.52,190,310,190z"/>
				</g>
			</g>
			<g>
				<g>
					<path d="M500.281,443.719l-133.48-133.48C388.546,277.485,400,239.555,400,200C400,89.72,310.28,0,200,0S0,89.72,0,200
						s89.72,200,200,200c39.556,0,77.486-11.455,110.239-33.198l36.895,36.895c0.005,0.005,0.01,0.01,0.016,0.016l96.568,96.568
						C451.276,507.838,461.319,512,472,512c10.681,0,20.724-4.162,28.278-11.716C507.837,492.731,512,482.687,512,472
						S507.837,451.269,500.281,443.719z M305.536,345.727c0,0.001-0.001,0.001-0.002,0.002C274.667,368.149,238.175,380,200,380
						c-99.252,0-180-80.748-180-180S100.748,20,200,20s180,80.748,180,180c0,38.175-11.851,74.667-34.272,105.535
						C334.511,320.988,320.989,334.511,305.536,345.727z M326.516,354.793c10.35-8.467,19.811-17.928,28.277-28.277l28.371,28.371
						c-8.628,10.183-18.094,19.65-28.277,28.277L326.516,354.793z M486.139,486.139c-3.78,3.78-8.801,5.861-14.139,5.861
						s-10.359-2.081-14.139-5.861l-88.795-88.795c10.127-8.691,19.587-18.15,28.277-28.277l88.798,88.798
						C489.919,461.639,492,466.658,492,472C492,477.342,489.919,482.361,486.139,486.139z"/>
				</g>
			</g>
			<g>
				<g>
					<path d="M200,40c-88.225,0-160,71.775-160,160s71.775,160,160,160s160-71.775,160-160S288.225,40,200,40z M200,340
						c-77.196,0-140-62.804-140-140S122.804,60,200,60s140,62.804,140,140S277.196,340,200,340z"/>
				</g>
			</g>
			<g>
				<g>
					<path d="M312.065,157.073c-8.611-22.412-23.604-41.574-43.36-55.413C248.479,87.49,224.721,80,200,80c-5.522,0-10,4.478-10,10
						c0,5.522,4.478,10,10,10c41.099,0,78.631,25.818,93.396,64.247c1.528,3.976,5.317,6.416,9.337,6.416
						c1.192,0,2.405-0.215,3.584-0.668C311.472,168.014,314.046,162.229,312.065,157.073z"/>
				</g>
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
			<g>
			</g>
      </svg>
      <input type="text" id="searchInput" class="searchField displayseachField toggleInputSearch toggleWidth" name="searchField" placeholder="Search your task">
			<!-- <div class="list-group"><ul  id="result"></ul></div> -->
            </div>
        </div>
        <div class="display__container">
          <div class="display__container--heading">
            <div class="backbtn">
              <a href="#">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  viewBox="0 0 52.502 52.502" style="enable-background:new 0 0 52.502 52.502;" xml:space="preserve">
                <g>
                  <path style="fill:#590189;" d="M21.524,16.094V4.046L1.416,23.998l20.108,20.143V32.094c0,0,17.598-4.355,29.712,16
                    c0,0,3.02-15.536-10.51-26.794C40.727,21.299,34.735,15.696,21.524,16.094z"/>
                  <path style="fill:#590189;" d="M51.718,50.857l-1.341-2.252C40.163,31.441,25.976,32.402,22.524,32.925v13.634L0,23.995
                    L22.524,1.644v13.431c12.728-0.103,18.644,5.268,18.886,5.494c13.781,11.465,10.839,27.554,10.808,27.715L51.718,50.857z
                    M25.645,30.702c5.761,0,16.344,1.938,24.854,14.376c0.128-4.873-0.896-15.094-10.41-23.01c-0.099-0.088-5.982-5.373-18.533-4.975
                    l-1.03,0.03V6.447L2.832,24.001l17.692,17.724V31.311l0.76-0.188C21.354,31.105,23.014,30.702,25.645,30.702z"/>
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
                <g>
                </g>
                </svg>
            </a>  
            </div>
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
            <div class="frontbtn">
              <a href="#">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 52.495 52.495" style="enable-background:new 0 0 52.495 52.495;" xml:space="preserve">
              <g>
                <path style="fill:#590189;" d="M31.113,16.038V3.99l19.971,20.08l-19.971,20.08V32.102c0,0-17.735-4.292-29.849,16.064
                  c0,0-3.02-15.536,10.51-26.794C11.774,21.371,17.903,15.64,31.113,16.038z"/>
                <path style="fill:#590189;" d="M0.783,50.929l-0.5-2.573c-0.031-0.161-2.974-16.25,10.852-27.753
                  c0.202-0.191,6.116-5.585,18.674-5.585c0.102,0,0.203,0,0.305,0.001V1.566L52.495,24.07L30.113,46.574V32.937
                  c-0.662-0.098-1.725-0.213-3.071-0.213c-5.761,0-16.657,2.073-24.918,15.953L0.783,50.929z M29.808,17.018
                  c-11.776,0-17.297,5.033-17.352,5.084C2.911,30.046,1.878,40.274,2.004,45.149C14.365,27.091,31.127,31.077,31.348,31.13
                  l0.765,0.185v10.411L49.674,24.07L32.113,6.413v10.654l-1.03-0.03C30.65,17.024,30.226,17.018,29.808,17.018z"/>
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
              <g>
              </g>
              </svg>
  </a>


            </div>
            
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

  
  
 