<?php

    namespace Itrust;
    
    class Session {

        public static $loggedIn = "false";

        public function __construct()
        {
            session_start();

        }

        //*in stage
        private function check_the_login(){

            if(!isset($_SESSION['userId'])) {
                unset($this->userId);
                $this->signedIn = false;
            }
        }

       public static function logout(){
            session_unset();
            session_destroy();
       }

       
    }
   
?>