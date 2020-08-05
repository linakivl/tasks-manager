<?php
  namespace Itrust;

    class Images {


        public static $newCreatedName;
        

        public static function displayImage($userId){

            $sql = "SELECT `status` FROM images WHERE userId = '{$userId}'";
            $result =  Db::getInstance()->getResults($sql);
            if(!$result){

                return false;
            }
            var_dump(self::$newCreatedName);
            // Redirect::to("main.php");
        }
        public static function updateImagesTable($userId){
           
            $sql = "INSERT INTO images(`userId`, `status`) VALUES ( '{$userId}' , '1')";
            $result = Db::getInstance()->execute($sql);
            self::displayImage($userId);
        }

        public static function uploadImage($userId,$firstName){

            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileTmpName= $_FILES['file']['tmp_name'];
            $fileError = $_FILES['file']['error'];
            $fileSize = $_FILES['file']['size'];

            //allow jpg
            $fileExtension = explode('.', $fileName);
            $fileActualExtension = strtolower(end($fileExtension));
            $allowed = ['jgp', 'jpeg', 'png'];

            if(in_array($fileActualExtension , $allowed)){
                Messages::setMessage("You can't upload this kind of type", 'error');    
            }
            if(!$fileError === 0){
                Messages::setMessage("There was an error uploading your file!", 'error');
            }
            if($fileSize > 10000000){
                Messages::setMessage("Your file size is big!", 'error');
            }
           
            self::$newCreatedName =  $fileNewName = $userId . $firstName . "." . $fileActualExtension;
            $fileDestination = 'images/usersimg/' . $fileNewName;
            
            move_uploaded_file($fileTmpName, $fileDestination);

            if($fileDestination){
                static::updateImagesTable($userId);
            }
        }

        
        



    }


?>