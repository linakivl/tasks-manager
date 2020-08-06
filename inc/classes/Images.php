<?php
  namespace Itrust;

    class Images {

        private $userIdPhoto;
        private $userfNamePhoto;
        private $newName;


        public function __construct($userId, $userfName)
        {
              $this->userIdPhoto = $userId;  
              $this->userfNamePhoto = $userfName;  
        }

        public function checkImageExist(){

            $sql = "SELECT `imageName` FROM images WHERE userId = '{$this->userIdPhoto}'";
            $result =  Db::getInstance()->getResults($sql);

            if(!$result){

                return false;
            }
            return $result;
        }
        
     

        public function updateImagesTable(){ 
           
            //if not.. update
            if($this->checkImageExist()){

                foreach($this->checkImageExist() as $value){

                    $imageExistName = $value['imageName'];
                    $path = "images/usersimg/$imageExistName";
                    $link = unlink($path);

                    if($link){
                        $sql = "UPDATE images SET imageName = '{$this->newName}'";
                    }
                }

            }else{
                 //check if the userid exist
                $sql = "INSERT INTO images(`userId`, `imageName`) VALUES ( '{$this->userIdPhoto}' , '{$this->newName}' )";
                
            }
            $result = Db::getInstance()->execute($sql); 
            Redirect::to("main.php");
        }

        public  function uploadImage(){

            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileTmpName= $_FILES['file']['tmp_name'];
            $fileError = $_FILES['file']['error'];
            $fileSize = $_FILES['file']['size'];
            
    
            $fileExtension = explode('.', $fileName);
            $fileActualExtension = strtolower(end($fileExtension));
            $allowed = ['jpg', 'jpeg', 'png'];

            if(!in_array($fileActualExtension , $allowed)){
                Messages::setMessage("You can't upload this kind of type", 'error');    
            }
            if(!$fileError === 0){
                Messages::setMessage("There was an error uploading your file!", 'error');
            }
            if($fileSize > 10000000){
                Messages::setMessage("Your file size is big!", 'error');
            }
           
            $fileNewName = $this->userIdPhoto . $this->userfNamePhoto . "." . $fileActualExtension;
            $this->newName = $fileNewName; 
            $fileDestination = 'images/usersimg/'.$fileNewName;
            
            $move = move_uploaded_file($fileTmpName, $fileDestination);
         
            if($fileDestination){
               $this->updateImagesTable();
            }
        }

        
        



    }


?>