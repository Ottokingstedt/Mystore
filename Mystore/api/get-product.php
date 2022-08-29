<?php 

require __DIR__ . "/../classes/ProductsDatabase.php";

header("Content-Type: application/json; charset-utf-8");

if(!isset($_GET["id"])){
    $product_db = new ProductsDatabase();
    $product = $product_db->get_one($_GET["id"]);

    echo json_encode($product);
    die();

} else {
    http_response_code(400);
    echo json_encode("Invalid input");
    die();
}