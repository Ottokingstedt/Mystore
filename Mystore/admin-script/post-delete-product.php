<?php
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../admin-script/force-admin.php";

$success = false; 

if(!isset($_GET['id'])){

    $products_db = new ProductsDatabase();

    $success = $products_db->delete($_POST["id"]);
    

} else {
    die("Invalid input"); 
}

if($success){
    header("Location: /mystore/admin-area/admin.php");
    die();
}else{
    die("Error deleting product");
}
