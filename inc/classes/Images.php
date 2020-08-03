<?php
  namespace Itrust;

    class Images {

        public static function displayImage($userId){

            $sql = "SELECT `status` FROM images WHERE userId = '{$userId}'";
            $result =  Db::getInstance()->getResults($sql);
            if(!$result){
                return false;
            }
            return true;
        }


    }


?>