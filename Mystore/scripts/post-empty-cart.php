<?php

require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/Product.php";

$success = false; 

if(isset($_GET['product-id'])){
    $product_db = new ProductsDatabase();
    $product = $product_db->get_one($_POST["product-id"]);

    // Delete Item
    if(isset($_POST['delete'])){         
        if(false !== $key = array_search($_POST['delete'], $_SESSION['cart'])) { // check item in array
        unset($_SESSION['cart'][$key]); // remove item
        }
} // Empty Cart
else if(isset ($_POST["clear"])){ // remove item from cart 
    unset ($_SESSION['cart']);
}  
if($product){
    header("Location: /Mystore/pages/items-cart.php");
    die("error deleting cart");
}} else {
    die("Invalid input");
} 


  
 
    

