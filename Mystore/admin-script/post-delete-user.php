<?php 

require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../admin-script/force-admin.php";


$success = false;

if(!isset($_GET['id'])){

 $users_db = new UserDatabase();
   $success = $users_db->delete($_POST['id']);

} else {
    echo "Invalid input";
}
if($success){
    header("Location: /mystore/admin-area/admin-view-users.php");

} else {
    echo "Error deleting user";
}