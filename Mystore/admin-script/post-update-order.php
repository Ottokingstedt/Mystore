<?php 
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../admin-script/force-admin.php";

$success = false; 

if(isset($_GET['id']) && isset($_POST['status'])){
    $orders_db = new OrdersDatabase();
    $success = $orders_db->update($_GET['id'], $_POST['status']);
} else {
    die("Invalid input");
}
    if($success){
        header("Location: /mystore/admin-area/admin-orders.php");
        die();
    } else {
    die("Error saving order");
    } 
    
