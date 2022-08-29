<?php

require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/Product.php";

session_start();

if(isset($_POST["product-id"])){
    $product_db = new ProductsDatabase();
    $product = $product_db->get_one($_POST["product-id"]);

    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = [];
    }
if($product){
$_SESSION["cart"][] = $product;

header("Location: /Mystore/pages/products.php");
die();

}
} else {
    die("Invalid input");
}