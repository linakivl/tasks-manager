<?php

    namespace Itrust;
    
    class Session {

        // public static $loggedIn = "false";
       

        public function __construct()
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function logout(){
                session_unset();
                session_destroy();
                \Itrust\Redirect::to('index.php');
        }

       
    }
   
?>