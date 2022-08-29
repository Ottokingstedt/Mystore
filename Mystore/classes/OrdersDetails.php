<?php 

class Orderdetails{
    public $id; 
    public $order_id;
    public $product_id;


    public function __construct($id, $order_id, $product_id){
        if($id > 0){
            $this->id - $id; 
        }
        $this->user_id = $order_id;
        $this->status = $product_id;
    }
}