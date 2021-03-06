<?php

use Itrust\Messages;

require_once 'vendor/autoload.php';

    $session = new Itrust\Session();
    if(!isset($_SESSION['id'])){
      \Itrust\Redirect::to('index.php');
      die();
    }

    $newPagination =  $pagination = new \Itrust\Pagination($_SESSION['id'],'tasks');
    $allTasks = $newPagination->get_task_data();
   
    $displayImage = new \Itrust\Images($_SESSION['id'], $_SESSION['fname']);
    $checkImageExist = $displayImage->checkImageExist();
    

    if(isset($_POST['uploadBtn'])){

        $image =  new \Itrust\Images($_SESSION['id'], $_SESSION['fname']);
        $newImage = $image->updateImagesTable();
        if($newImage){
          

            \Itrust\Redirect::to("main.php");
       
        }
        
        
    }

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="css/main-style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
    </head>
<body>
<main>
     <div class="container">
     
     <div class="images-upload displayInputUpload">
        
        <form action="main.php" method="post" enctype="multipart/form-data">
            <a href="#" id="x">x</a>    
            <input type="file" name="file">
            <button type="submit" name="uploadBtn">UPLOAD </button>
            <span><?php echo Messages::displayMessage() ?></span>
               
        </form>
        
        </div>
        <div class="container__sideBar">
            <div class="sideBar__heading">
                <svg id="heading-bars"  viewBox="0 -53 384 384"  xmlns="http://www.w3.org/2000/svg">
                    <path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 
                    16 16s-7.167969 16-16 16zm0 0"/>
                    <path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 
                    0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
                    <path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 
                    16s-7.167969 16-16 16zm0 0"/>
                </svg>
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><h1>App</h1></a>
            </div>
            <div class="container__sideBar--list">
                <ul>
                    <li class="active"><svg class="sidebar-icons" viewBox="0 -1 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m204.5 458.605469v51.855469l-12.539062-10.128907c-1.9375-1.566406-48.035157-38.992187-94.78125-92.660156-64.484376-74.035156-97.179688-140.492187-97.179688-197.519531v-5.652344c0-112.761719 91.738281-204.5 204.5-204.5s204.5 91.738281 204.5 204.5v5.652344c0 4.789062-.253906 9.652344-.714844 14.574218l-39.992187-36.484374c-8.191407-83.15625-78.519531-148.339844-163.792969-148.339844-90.757812 0-164.597656 73.839844-164.597656 164.597656v5.652344c0 96.367187 124.164062 213.027344 164.597656 248.453125zm122.699219-28.660157h59.851562v-59.851562h-59.851562zm-122.699219-310.238281c46.753906 0 84.792969 38.039063 84.792969 84.792969s-38.039063 84.792969-84.792969 84.792969-84.792969-38.039063-84.792969-84.792969 38.039063-84.792969 84.792969-84.792969zm0 39.902344c-24.753906 0-44.890625 20.136719-44.890625 44.890625 0 24.75 20.136719 44.890625 44.890625 44.890625 24.75 0 44.890625-20.140625 44.890625-44.890625 0-24.753906-20.140625-44.890625-44.890625-44.890625zm280.609375 243.222656-11.21875-10.234375v64.058594c0 29.828125-24.269531 54.09375-54.097656 54.09375h-126.332031c-29.828126 0-54.097657-24.265625-54.097657-54.09375v-64.058594l-11.21875 10.234375-26.890625-29.476562 155.371094-141.746094 155.375 141.746094zm-51.121094-46.636719-77.363281-70.574218-77.359375 70.574218v100.457032c0 7.828125 6.367187 14.195312 14.195313 14.195312h126.332031c7.828125 0 14.195312-6.367187 14.195312-14.195312zm0 0"/></svg>
                    <a href="#">Home</a></li>
                    <li><svg  class="sidebar-icons" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                                c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z"/>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                                M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"/>
                        </g>
                    </g>
                   
                    </svg><a href="#">Users</a></li>
                    <li><a href="#">Something</a></li>
                    <li><a href="#">Something</a></li>
                </ul>
            </div>
        </div>
        <div class="container__topBar">
            <div class="tobBar__searchBox">
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
                   
                </svg>
                <input type="text" id="searchInput" class="searchField displayseachField toggleInputSearch toggleWidth" name="searchField" placeholder="Search your task">
            </div>
            <div class="tobBar__icons">
                <svg version="1.1" class="bell-icon" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M467.819,431.851l-36.651-61.056c-16.896-28.181-25.835-60.437-25.835-93.312V224
                            c0-82.325-67.008-149.333-149.333-149.333S106.667,141.675,106.667,224v53.483c0,32.875-8.939,65.131-25.835,93.312
                            l-36.651,61.056c-1.984,3.285-2.027,7.403-0.149,10.731c1.899,3.349,5.461,5.419,9.301,5.419h405.333
                            c3.84,0,7.403-2.069,9.301-5.419C469.845,439.253,469.803,435.136,467.819,431.851z M72.171,426.667l26.944-44.907
                            C118.016,350.272,128,314.219,128,277.483V224c0-70.592,57.408-128,128-128s128,57.408,128,128v53.483
                            c0,36.736,9.984,72.789,28.864,104.277l26.965,44.907H72.171z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M256,0c-23.531,0-42.667,19.136-42.667,42.667v42.667C213.333,91.221,218.112,96,224,96s10.667-4.779,10.667-10.667
                            V42.667c0-11.776,9.557-21.333,21.333-21.333s21.333,9.557,21.333,21.333v42.667C277.333,91.221,282.112,96,288,96
                            s10.667-4.779,10.667-10.667V42.667C298.667,19.136,279.531,0,256,0z"/>
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M302.165,431.936c-3.008-5.077-9.515-6.741-14.613-3.819c-5.099,2.987-6.805,9.536-3.819,14.613
                            c2.773,4.715,4.288,10.368,4.288,15.936c0,17.643-14.357,32-32,32c-17.643,0-32-14.357-32-32c0-5.568,1.515-11.221,4.288-15.936
                            c2.965-5.099,1.259-11.627-3.819-14.613c-5.141-2.923-11.627-1.259-14.613,3.819c-4.715,8.064-7.211,17.301-7.211,26.731
                            C202.667,488.085,226.581,512,256,512s53.333-23.915,53.376-53.333C309.376,449.237,306.88,440,302.165,431.936z"/>
                    </g>
                </g>
                <g>
              
                </svg>
                <figure class="profile-icon">
                    <?php  if(!$checkImageExist) : ?>
                         <a href="#">
                             <img class="figure-image" src="images/default-image.jpg" alt="guest image">
                         </a>
                <?php  else :  foreach($checkImageExist as $image)?>
                
                        <a href="#">
                             <img class="figure-image" src="images/usersimg/<?php echo $image['imageName']?>" alt="guest image">
                         </a>
                <?php endif ?>
                </figure>
                
               
                <a href="logout.php">
                    <svg class="exit-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 471.2 471.2" style="enable-background:new 0 0 471.2 471.2;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M227.619,444.2h-122.9c-33.4,0-60.5-27.2-60.5-60.5V87.5c0-33.4,27.2-60.5,60.5-60.5h124.9c7.5,0,13.5-6,13.5-13.5
                                s-6-13.5-13.5-13.5h-124.9c-48.3,0-87.5,39.3-87.5,87.5v296.2c0,48.3,39.3,87.5,87.5,87.5h122.9c7.5,0,13.5-6,13.5-13.5
                                S235.019,444.2,227.619,444.2z"/>
                            <path d="M450.019,226.1l-85.8-85.8c-5.3-5.3-13.8-5.3-19.1,0c-5.3,5.3-5.3,13.8,0,19.1l62.8,62.8h-273.9c-7.5,0-13.5,6-13.5,13.5
                                s6,13.5,13.5,13.5h273.9l-62.8,62.8c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4l85.8-85.8
                                C455.319,239.9,455.319,231.3,450.019,226.1z"/>
                        </g>
                    </g>
                    
                </svg>
                </a>
            </div>
        </div>
        <div class="container__mainTable">
           <div class="top-mainTable">
               <a href="main.php"><h2 class="mainTable__heading">Tasks</h2></a>
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
             
              </svg>
            </a> 
           
           </div>
           <div class="tableBox">
                <div class="tableBox__headings">
                    <p>Tittle</p>
                    <p>Description</p>
                    <p>Created</p>
                    <p>Updated</p>
                    <p>Action</p>
                </div>
                <div class="tableBox__paragraphs" id="table-data">
                   
                <?php foreach($allTasks as $details) : ?>

                    <div class="tableBox__paragraphs_row">
                        <div class="taskInfo" data-tasks-id="<?php echo $details['taskId']; ?>">
                            <div class="taskInfo_details">
                                <p><?php echo $details['tittle']?></p>
                                <p><?php echo $details['description']?></p>
                                <p><?php echo $details['createdAt']?></p>
                                <p><?php echo $details['updatedAt']?></p>
                                <p>
                                    <svg version="1.1"   class="action-col__icons editBtn"  id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512.049 512.049" style="enable-background:new 0 0 512.049 512.049;" xml:space="preserve">
                                        <path id="pen-1"  d="M510.266,4.855c-2.053-3.202-5.675-5.045-9.472-4.821c-59.397,7.72-117.708,22.251-173.781,43.307
                                            c-2.545,0.942-4.635,2.819-5.845,5.248l-14.699,29.419l-10.88-10.859c-3.299-3.291-8.352-4.06-12.48-1.899
                                            c-31.521,15.354-61.254,34.134-88.661,56c-8.967,14.776-15.014,31.136-17.813,48.192l-7.083-14.187
                                            c-2.636-5.268-9.044-7.402-14.312-4.766c-0.817,0.409-1.577,0.92-2.264,1.523c-4.267,3.691-102.187,91.477-56.021,193.728
                                            c9.738,23.845,33.427,38.983,59.157,37.803c1.259,0,2.517,0,3.819,0c82.048-3.456,210.304-118.656,223.488-155.904
                                            c1.953-5.558-0.969-11.647-6.526-13.6c-0.316-0.111-0.637-0.207-0.962-0.288l-35.584-8.917l77.419-12.8
                                            c3.368-0.563,6.263-2.704,7.787-5.76l85.333-170.667C512.635,12.174,512.399,8.064,510.266,4.855z"/>
                                        <path id="pen-2"  d="M10.682,512.034C4.791,512.042,0.008,507.273,0,501.382c-0.003-1.844,0.473-3.658,1.38-5.263
                                            C94.671,331.17,168.335,200.908,357.967,107.788c5.302-2.598,11.706-0.406,14.304,4.896c2.598,5.302,0.406,11.706-4.896,14.304
                                            c-183.744,90.197-256,217.941-347.413,379.733C18.043,510.027,14.503,512.053,10.682,512.034z"/>
                                        <g>
                                        </g>
                                    
                                        </svg>
                                            <svg  class="action-col__icons deleteButton" viewBox="-43 0 512 512" 
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="m269.644531 88.976562h-113.0625c-8.285156 0-15-6.714843-15-15v-45.933593c0-15.460938 
                                            12.570313-28.042969 28.023438-28.042969h87.011719c15.453124 0 28.027343 12.582031 28.027343 28.042969v45.933593c0 8.285157-6.71875 
                                            15-15 15zm-98.0625-30h83.0625v-28.976562h-83.0625zm85.035157-28.976562h.007812zm0 0" fill="#bec3d2"/>
                                            <path d="m381.691406 122.664062c-2.839844-3.078124-6.835937-4.828124-11.023437-4.828124h-315.109375c-4.1875 0-8.1875 
                                            1.75-11.027344 4.828124-2.839844 3.078126-4.261719 7.203126-3.925781 11.378907l27.125 335.394531c1.929687 23.867188 22.183593 
                                            42.5625 46.105469 42.5625h198.550781c23.925781 0 44.175781-18.695312 46.105469-42.5625l27.125-335.394531c.339843-4.175781-1.085938-8.300781-3.925782-11.378907zm0 0"
                                            fill="#bec3d2"/>
                                            <path d="m55.558594 117.835938c-4.1875 0-8.1875 1.75-11.027344 4.828124-2.839844 3.078126-4.261719 7.203126-3.925781 
                                            11.378907l27.125 335.394531c1.929687 23.867188 22.183593 42.5625 46.105469 42.5625h99.277343v-394.164062zm0 0" fill="#dce1eb"/>
                                            <path d="m425.453125 128.085938-19.636719-58.855469c-2.042968-6.125-7.773437-10.253907-14.226562-10.253907h-356.957032c-6.453124 0-12.1875 
                                            4.128907-14.226562 10.253907l-19.636719 58.855469c-1.523437 4.574218-.7578122 9.605468 2.0625 13.515624 2.816407 3.914063 7.347657 6.230469 
                                            12.167969 6.230469h396.222656c4.824219 0 9.351563-2.316406 12.171875-6.230469 2.816407-3.910156 3.582031-8.941406 2.058594-13.515624zm0 0"
                                            fill="#dce1eb"/>
                                            <path d="m287.332031 465.976562c-.261719 0-.523437-.003906-.792969-.019531-8.269531-.429687-14.628906-7.488281-14.199218-15.761719l14.085937-270.398437c.429688-8.273437 
                                            7.472657-14.640625 15.757813-14.199219 8.273437.429688 14.628906 7.488282 14.199218 15.761719l-14.082031 270.398437c-.417969 8.007813-7.042969 
                                            14.21875-14.96875 14.21875zm0 0" fill="#9196aa"/>
                                            <path d="m139.554688 465.976562c-7.910157 0-14.527344-6.1875-14.960938-14.183593l-14.753906-270.398438c-.449219-8.273437 5.890625-15.34375 
                                            14.160156-15.792969 8.265625-.453124 15.347656 5.886719 15.796875 14.160157l14.75 270.398437c.453125 8.273438-5.886719 15.34375-14.160156 
                                            15.792969-.277344.015625-.554688.023437-.832031.023437zm0 0" fill="#bec3d2"/>
                                            <path d="m213.277344 465.976562c-8.28125 0-15-6.714843-15-15v-270.398437c0-8.285156 6.71875-15 15-15 8.285156 0 15 6.714844 15 
                                            15v270.398437c0 8.285157-6.714844 15-15 15zm0 0" fill="#9196aa"/>
                                            <path d="m198.277344 180.578125v270.398437c0 8.226563 6.628906
                                            14.902344 14.835937 14.992188v-300.382812c-8.207031.089843-14.835937 6.761718-14.835937 14.992187zm0 0" fill="#bec3d2"/>
                                            <path d="m171.582031 58.976562v-28.976562h41.53125v-30h-43.507812c-15.453125 0-28.023438 12.582031-28.023438 28.042969v45.933593c0 
                                            8.285157 6.714844 15 15 15h56.53125v-30zm0 0" fill="#dce1eb"/>
                                            <path  d="m36.289062 58.976562c-6.453124 0-12.1875 4.128907-14.230468 10.253907l-19.632813 
                                            58.855469c-1.523437 4.574218-.757812 9.605468 2.0625 13.515624 2.816407 3.914063 7.347657 6.230469 12.167969 6.230469h198.109375v-88.855469zm0 0" 
                                        fill="#f2f6fc"/>
                                        </svg>
                                </p>
                                </div>
                                <div class="hideUpdate display">
                                    <div class="hideUpdate__container">
                                        <div>
                                            <label class="task-info" for="taskTittle">Tittle: </label>
                                            <input type="text"  readonly="true" class="tittleName" ondblclick="this.readOnly='';" value="<?php echo $details['tittle'];?>">
                                        </div>
                                        <div>
                                            <label class="task-info" for="taskTittle">Description: </label>
                                            <textarea  name="descriptionTask" readonly="true" ondblclick="this.readOnly='';" class="descArea"  rows="3" cols="40"> <?php echo $details['description'];?></textarea> 
                                        </div>
                                        
                                            <input data-tasks-id="<?php echo $details['taskId']; ?>" type="submit" name="updateBtn" class="updateBtn" value="Update">
                                        
                                    </div>
                                </div>  
                        </div> 
                    </div>
                   <?php endforeach ?>
                </div>  
            </div> 
            <div class="pagination__table">
                <ul class="pagination__table_ul">
                <?php  
                    $current_page = $pagination->current_page();
                    $pages = $pagination->get_pagination_num();   
                    for($i = 1; $i <= $pages; $i++) : 
                ?>   
                <li class="<?php echo ($current_page == $i) ? 'current-page': '' ?>">
                    <a class="<?php echo ($current_page == $i) ? 'current-a': '' ?>" href="?page=<?php echo $i?>">
                    <?php echo $i; ?>
                    </a>
                </li>   
                <?php endfor?>
                </ul>
            </div> 
        </div>
     </div>
    <?php include 'includes/footer.php'?>
</body>
</html>