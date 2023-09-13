<?php

    class FoodService {

        private $db;

        public function __construct($db) {
            $this->db = $db;
        }


        function getAllFood(){
            $sql = "SELECT * FROM food";
            $result = $this->db->query($sql);
            return $result;
        }

    }



?>