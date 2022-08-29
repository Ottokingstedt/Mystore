<?php 

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$success = false; 

if(
    isset($_POST["username"]) && 
    isset($_POST["password"]) && 
    isset($_POST["confirm-password"]) &&

    strlen($_POST["username"]) > 0 && 
    strlen($_POST["password"]) > 0 && 

    $_POST["password"] === $_POST["confirm-password"]
){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = "customer";

    $user = new User($username, $role);
    $user->hash_password($password);

    $users_db = new UserDatabase();

    $existing_user = $users_db->get_one_by_username($username);
   
    // var_dump($user);

if(  $existing_user) {
    die("Username is taken!");
} else {
    $success = $users_db->create($user);
} 

} else {
    die("Invalid input");
}

if($success){
    header("Location: /mystore/pages/login.php?register==success");
} else {
    die("Error saving user");
}
?>