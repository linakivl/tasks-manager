<?php

    namespace Itrust;

    class Validation
    {
        public static function login($email, $password)
        {

            $password   = self::passwordEncrypt($password);
            $email      = self::emailValidation($email);

            $searchUser = Db::getInstance()->getResults("SELECT * FROM users 
            WHERE email  = '{$email}'  AND password = '{$password}' ");

            if ( ! $searchUser) {
                Messages::setMessage('You are not a user', 'error');
            }
            Session::$loggedIn = true;

            return $searchUser;
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
                $newUser = new User($fname, $lname, $username, $email, $password);
            }catch (\Exception $e) {
                var_dump($e->getMessage());
            } finally {

            }

            $id = $newUser->createUser();

            Messages::setMessage("You are user now", 'success');

            return true;
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
