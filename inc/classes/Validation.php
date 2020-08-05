<?php

    namespace Itrust;

    class Validation
    {
        private static $salt = "something";
        public static $signedIn = false;

        public static function login($email, $password)
        
        {

            $password   = self::passwordEncrypt($password);
            $email      = self::emailValidation($email);

            $searchUser = Db::getInstance()->getResults("SELECT * FROM users 
            WHERE email  = '{$email}'  AND password = '{$password}' ");

            if ( ! $searchUser) {
                Messages::setMessage('You are not a user', 'error');
            }
   
            if($searchUser){

                foreach($searchUser as $prop){
    
                    $session = new \Itrust\Session();
                    $_SESSION['fname'] = $prop['firstName'];
                    $_SESSION['id'] = $prop['id'];
                    $_SESSION['key'] = md5( self::$salt . $prop['id']);
                    
    
                    if($_SESSION['id']){
    
                        \Itrust\Redirect::to('main.php');
    
                    }
                }
            }

            return $searchUser;
        }

        public static function check_the_login(){
            $session = new \Itrust\Session();
            if(
                isset($_SESSION['id']) 
                && isset($_SESSION['key'])
                && $_SESSION['key'] === md5( self::$salt . $_SESSION['id'])
                ) {
                self::$signedIn = true;
            }
            return self::$signedIn;
        }

        public static function validationRegister($fname, $lname, $username, $email, $pass)
        {

            $fname    = htmlentities($fname);
            $lname    = htmlentities($lname);
            $username = htmlentities($username);
            $password = self::passwordEncrypt($pass);
            $email    = self::emailValidation($email);

            $searchForUser = Db::getInstance()->getResults("SELECT email FROM users WHERE email = '${email}'");
            
            if ( ! $password) {
                Messages::setMessage("Password chars must have at least 4 numbers", 'error');

                return false;
            }
            if ( ! $email) {
                Messages::setMessage("Email is not valid", 'error');

                return false;
            }
            if ($searchForUser) {
                Messages::setMessage("User exists", 'error');
                return false;
            }


            try {
                $newUser = new \Itrust\User();

                // $fname, $lname, $username, $email, $password
                $newUser->firstName = $fname;
                $newUser->lastName = $lname;
                $newUser->username = $username;
                $newUser->email = $email;
                $newUser->setPassword($password);

                $id = $newUser->save();
            }catch (\Exception $e) {
                var_dump($e->getMessage());
            } finally {

            }
            
            if ($id) {
                $session = new \Itrust\Session();
                $_SESSION['fname'] = $fname;
                $_SESSION['id'] = $id;
                $_SESSION['key'] = md5( self::$salt . $id);
                

                if($_SESSION['id']){
                    \Itrust\Redirect::to('main.php');
                }
                return true;
            }


            Messages::setMessage("Register failed", 'error');
            return false;

            
        }

        //check password and make it encrypted
        private static function passwordEncrypt($pass)
        {
            if (strlen($pass) < 4) {
                return false;
            }

            $pass = hash("sha512", $pass);

            return $pass;
        }

        //sanitize email
        private static function emailValidation($email)
        {
            $valEmail = trim($email);

            if ( ! filter_var(strtolower($valEmail), FILTER_SANITIZE_EMAIL)) {
                return false;
            }
            return $valEmail;
        }
    }

    ?>
