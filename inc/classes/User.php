<?php
    namespace Itrust;

    class User {
        
        public 
        $firstName,
        $lastName,
        $username,
        $email,
        $role,
        $active = 1,
        $failedLogins,
        $last_failed_login;

        private 
        $id,
        $password;

        public function __construct($fname, $lname, $username, $email, $password){
            $this->firstName = $fname;
            $this->lastName = $lname;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function createUser(){
            
             $sql = "INSERT INTO users (firstName, lastName, username, email, password, active)
            VALUES ('{$this->firstName}', '{$this->lastName}' , '{$this->username}' , '{$this->email}', '{$this->password}' , '{$this->active}')  " ; 
            $searchUser = Db::getInstance()->execute($sql);
            
        }
    }
