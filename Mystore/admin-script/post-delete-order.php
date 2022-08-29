<?php 

require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../admin-script/force-admin.php";

$success = false; 

if(!isset($_GET['id'])){

    $orders_db = new OrdersDatabase();

    $success = $orders_db->delete_order($_POST['id']);

} else {
    echo "Invalid input";
}
if ($success){
    header("location: /mystore/admin-area/admin-orders.php");
} else {
    echo "Error deleting order";
}