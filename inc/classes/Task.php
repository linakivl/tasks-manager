<?php

    namespace Itrust;

    class Task
    {

        private $id;
        public $title;
        public $description;
        public $created_at;
        public $updated_at;


        public function __construct($id = null)
        {
            if ($id) {
                //update , try to find from db
                $recordInDb = Db::getInstance()->getResults("SELECT * FROM tasks WHERE id = " . $id, true);

                if ( ! $recordInDb) {
                    throw new \Exception('There is no task with the given id in db');
                }

                $this->id         = $recordInDb['id'];
                $this->title      = $recordInDb['title'];
                $this->updated_at = $recordInDb['updated_at'];
                $this->created_at = $recordInDb['created_at'];

                //Todo isos na to tsekaro
                $this->description = $recordInDb['description'];
            }
        }

        public function createTask($title, $description){

            $title = htmlentities($title);
            $description = htmlentities($description);
            //create a task
            $sql = Db::getInstance()->execute("INSERT INTO (titles, description) 
            VALUES('{$title}, '{$description}') ");

        }

        public function updateTask($title, $description){


        }

        public function deleteTask($id){


        }

        public function showTask(){

            

        }

        public function save()
        {
            $update = false;

            //check if we are in update
            if ($this->id) {
                $update = true;
            }

            //sql for insert
            $sql = "
        INSERT INTO tasks ( title, description )
        VALUES ( '" . $this->title . "', '" . $this->description . "' )
        ";

            Db::getInstance()->execute($sql);
        }

    }
