<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)){
            return null;
        }
        $this->db = $db;
    }

    // insert into cartx
    public function insertIntoCart($params = null, $table="cart"){
        if($this->db->con !=null){
            if($params!=null){
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                //create am SQL query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                $result = $this->db->con->query($query_string);

                return $result;
            }
        }
    }


    // to get user_id and item_id
    public function addToCart($userid, $itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );
        }

        // inserting data into cart
        $result = $this->insertIntoCart($params);
        if($result){
            // reload page
            header("Location".$_SERVER['PHP_SELF']);
        }
    }
}