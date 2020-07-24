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

        public function __construct($id = false){
            if($id) {
                //has to search for user in db
                $sql = "SELECT * FROM users WHERE id = {$id}";
                $userEntity = Db::getInstance()->getResults($sql);

                if(!$userEntity) {
                    throw new \Exception('Failed to find user');
                }

                $this->id = $id;
                $this->email = $userEntity[0]->email;
                $this->lastName = $userEntity[0]->lastName;
                $this->username = $userEntity[0]->username;
                $this->firstName = $userEntity[0]->firstName;
            }
        }

        public function save() {
            if($this->id) {
                //update
                $sql = "";
            }else {
                //Create
                $sql = "INSERT INTO users (firstName, lastName, username, email, password, active)
            VALUES ('{$this->firstName}', '{$this->lastName}' , '{$this->username}' , '{$this->email}', '{$this->password}' , '{$this->active}')  " ;
            }

            DB::getInstance()->execute($sql);
        }

//        public function createUser(){
//            $searchUser = Db::getInstance()->execute($sql);
//        }
    }
