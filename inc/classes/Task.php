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

        public function createTask($title, $description, $userId){
                 
            $title = htmlentities($title);
            $description = htmlentities($description);
            //create a task
            $result = Db::getInstance()->execute("INSERT INTO tasks (tittle, description, creatorId) 
            VALUES('{$title}', '{$description}', '{$userId}') ");
            return ($result);

        }

        public function updateTask($taskId, $tittle, $description, $userId){
            
            $tittle = htmlentities($tittle);
            $description = htmlentities($description);
            $sql = "UPDATE tasks SET tittle = '{$tittle}', description = '{$description}', creatorId = '{$userId}' WHERE taskId = '${taskId}' ";
            //update task
            $updateResult = Db::getInstance()->execute($sql);
     
        }

        public function deleteTask($id){
             
            if($id){
                //check record exists
                if($id > 0){
                    $sql = "SELECT * FROM tasks WHERE taskId = '{$id}'";
                    $checkrecords = Db::getInstance()->getResults($sql);
                    if($checkrecords){
                        //delete record
                        $deletequery = "DELETE FROM tasks WHERE taskId = '{$id}'";
                        $result = Db::getInstance()->execute($deletequery);
                       
                        echo json_encode([
                            'status' => true,
                        ]);
                        exit;
                    }
                }
            }

        }
        public function showOneTask($taskId){
            $sql = "SELECT * FROM tasks WHERE taskId = '{$taskId}'";
            $theTask = Db::getInstance()->getResults($sql);
            return $theTask;
        }
        public function showTasks($userId){

            //query get the tasks of this user and show it
            $sql = "SELECT * FROM tasks INNER JOIN users ON tasks.creatorId = users.id WHERE creatorId = '{$userId}' ORDER BY taskId DESC LIMIT 2";
            $result = Db::getInstance()->getResults($sql);
            return $result;

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

        public function get_data($userId, $tasktittle){
 
            $sql = "SELECT * FROM tasks INNER JOIN users ON tasks.creatorId = users.id WHERE `creatorId` = '{$userId}' AND `tittle` LIKE '%".$tasktittle."%'";
            $result = Db::getInstance()->getResults($sql);
            return $result;
        }
    }
