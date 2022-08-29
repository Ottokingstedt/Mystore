<?php 


require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../admin-script/force-admin.php";

$success = false; 

if( 
    isset($_POST["role"]) &&
    isset($_GET["id"]) 
    
){
    $users_db = new UserDatabase();
    $success = $users_db->update($_POST['role'], $_GET['id']);


} else {
    die("Invalid input");
}

if($success){
    header("Location: /mystore/admin-area/admin-view-users.php");
    die();
} else {
    die("Error creating user");
}