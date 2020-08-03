<?php

namespace Itrust;

class Pagination{

    private $id, $table, $total_records, $limit = 10;

    public function __construct($id, $table){
        $this->id = $id;
        $this->table = $table;
        $this->set_total_records();

    }

    public function  set_total_records(){

        $sql = "SELECT creatorId FROM $this->table WHERE creatorId = $this->id";
        $result = Db::getInstance()->getResults($sql);
        return  $this->total_records = count($result);
      
    }

    public function current_page(){
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    public function get_task_data(){

        $startPage = 0;
        if($this->current_page() > 1){

            $startPage = ($this->current_page() * $this->limit) -  $this->limit;

        }
        $tasks = "SELECT * FROM $this->table WHERE creatorId = $this->id ORDER BY createdAt DESC 
        LIMIT $this->limit  OFFSET  $startPage ";
        
        $data = Db::getInstance()->getResults($tasks);
        
        return $data;

    }

    public function get_pagination_num(){
        return ceil($this->total_records / $this->limit);
    }

}




?>