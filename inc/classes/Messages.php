<?php
    namespace Itrust;

    class Messages {

            //passing through the message
            public static function setMessage($text, $type){
                if($type == 'success'){
                    $_SESSION['successMsg'] = $text;
                    
                }
                if($type == 'error'){
                    $_SESSION['errorMsg'] = $text;
                }    
            }
          
            //display the message
            public static function displayMessage(){
                
                if(isset($_SESSION['successMsg'])){
                    echo $_SESSION['successMsg'];
                    unset($_SESSION['successMsg']);
                }
                if(isset($_SESSION['errorMsg'])){
                    echo $_SESSION['errorMsg'];
                    unset($_SESSION['errorMsg']);
                }
            }
    }



?>