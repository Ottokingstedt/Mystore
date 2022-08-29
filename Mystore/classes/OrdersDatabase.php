<?php

require_once __DIR__ . "/Order.php";
require_once __DIR__ . "/ProductsDatabase.php";

class OrdersDatabase extends Database{ 

public function create(Order $order){
    $query = "INSERT INTO orders (`user_id`, `status`, `order_date`) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($this->conn, $query);

    $stmt->bind_param("iss", $order->user_id, $order->status, $order->order_date);

    $order = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    $success = $stmt->execute();

    if($success){
        return $stmt->insert_id;
    }
} 

public function create_order($order_id, $product_id){
    $query = "INSERT INTO `ordersdetail` (`order_id`,`product_id`) VALUES (?, ?)";

    $stmt = mysqli_prepare($this->conn, $query);

    $stmt->bind_param("ii", $order_id, $product_id);

    $success = $stmt->execute();

    return $success;
}


public function get_all(){
    $query = "SELECT * FROM `orders`";

    $result = mysqli_query($this->conn, $query);

    $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $orders = [];

// var_dump($db_orders);

        foreach($db_orders as $db_order){
            $db_id = $db_order["id"];
            $db_user_id = $db_order["user_id"];
            $db_status = $db_order["status"];
            $db_order_date = $db_order["order_date"];

            $orders[] = new Order($db_user_id, $db_status, $db_order_date, $db_id);
        }

            return $orders;
}

 public function get_order_by_user_id($user_id){

   $query = "SELECT od.id, od.order_id, u.username, o.user_id, o.`order_date`, o.`status` FROM ordersdetail AS od 
   JOIN orders AS o ON od.`order_id` = o.id 
   JOIN users AS u ON o.`user_id` = u.id WHERE o.`user_id` = ?";
    
    $stmt = mysqli_prepare($this->conn, $query);
    
    $stmt->bind_param("i", $user_id);
    
     $stmt->execute();
    
    $result = $stmt->get_result();
    
    $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $orders = [];

        foreach((array)$db_orders as $db_order){
            $order = new Order(
                $db_order["user_id"],
                $db_order["status"],
                $db_order["order_date"],
                $db_order["id"]
            );

            $orders[] = $order;

        }
    
    return $orders;

}

public function update($id, $status){
    $query="UPDATE `orders` SET `status` = ? WHERE id = ?";

    $stmt = mysqli_prepare($this->conn, $query);

    $stmt->bind_param(
        "si",
        $status,
        $id
    );

    $success = $stmt->execute();

    return $success;
}


public function update_order($order_id){
$query = "UPDATE `ordersdetail` JOIN 'orders' AS o ON o.status, o.order_date SET o.status='delivered'
WHERE id = ?";

$stmt = mysqli_prepare($this->conn, $query);

$stmt->bind_param(
    "ss",
    $order_id->status, 
    $order_id->order_date,
    $id
);

return $stmt->execute();
}

public function delete_order($id){
   $query = "DELETE FROM orders WHERE id=?";

   $stmt = mysqli_prepare($this->conn, $query);

   $stmt->bind_param("i", $id);

   return $stmt->execute();
}
}


