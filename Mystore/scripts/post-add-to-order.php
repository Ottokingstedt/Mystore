<?php 
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

session_start();

$is_logged_in = isset($_SESSION["user"]);
$logged_in_user = $is_logged_in ? $_SESSION["user"] : null;

$cart = $_SESSION["cart"];


if($is_logged_in && count($cart) > 0){
    $order = new Order($logged_in_user->id, "waiting", date("Y-m-d"));
    $orders_db = new OrdersDatabase();

    $order_id = $orders_db->create($order);



    if($order_id == false){
        die("Error creating order");
    }
    
    $success = true; 
    foreach($cart as $product){
        $success = $success && $orders_db->create_order($order_id, $product->id);
    }

    if($success){
        unset($_SESSION["cart"]);
        header("Location: /mystore/pages/order.php");
        die();
    } else {
    die("Error saving order");
    }
     
} else {
    die("Invalid cart / user");
}

