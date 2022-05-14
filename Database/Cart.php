<?php

class Cart
{
 public  $db=null;


 public function __construct(DBController $db)
  {
    if(!isset($db->con))
    {
        return null;
    }
  $this->db=$db;
 }

//insert into cart table
public function insertIntoCart($params=null,$table="cart")
{
    
    if($this->db->con!=null)
    {
        if($params!=null)
        {
           $columns=implode(',',array_keys($params));
         //  print_r($params);
           $values=implode(',',array_values($params));
       //    print_r($values);
           //execute query
           $query_string=sprintf("INSERT INTO %s(%s) VALUES (%s)",$table,$columns,$values);
           $result=$this->db->con->query($query_string);
        }
    }
}

public function addToCart($userid,$itemid)
{
    
    if(isset($userid)&& isset($itemid))
    {
     $params=array(
         "user_id"=>$userid,
         "item_id"=>$itemid
     );
     //FOR RELAODING THE WINDOW OR PAGE
     $result=$this->insertIntoCart($params);
    //  if($result)
    //  {
    //      header("Location",$_SERVER['PHP_SELF']);
    //  }
          
    }
}

//get itemid of shopping cart list
public function getCardId($cartlist=null,$key="item_id")
{
    if($cartlist!=null)
    {
        $card_id=array_map(function($value)use($key){
            return $value[$key];
        },$cartlist);
        return $card_id;
    }
}

public function deleteItem($itemid=null,$table='cart')
{
    if(isset($itemid))
    {
        $result=$this->db->con->query(" DELETE FROM {$table} WHERE item_id={$itemid}");
             if($result)
     {
        //  header("Location",$_SERVER['PHP_SELF']);
     }
     return $result;  
    }
}
public function getSum($arr)
{
    if(isset($arr))
    {
        $sum=0;
        foreach($arr as $item)
        {
          $sum+=floatval($item[0]);
        }

    return sprintf("%.2f",$sum);
    }
}

//dleting from cart and adding it to whilist tables
 public function saveForLater($item_id=null,$saveTable='wishlist',$fromTable='cart'){
     if($item_id!=null)
     {
       $query=" INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id}; ";
       $query .="DELETE FROM {$fromTable} WHERE item_id={$item_id};";
    //    $result =$this->db->con->query(" INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id} ;");
       $result =$this->db->con->multi_query($query);
       if($result)
       {
        //    header("Location:",$_SERVER['PHP_SELF']);
       }
       return $result;
     }
 }





}

?>