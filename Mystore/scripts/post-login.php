<?php
sleep(2);

require_once __DIR__ . "/../classes/UsersDatabase.php";

if(isset($_POST["username"]) && isset($_POST["password"])){

    $users_db = new UserDatabase();

    $user = $users_db->get_one_by_username($_POST["username"]);

    var_dump($user);

    if($user && $user->test_password($_POST["password"])){

        session_start();

        $_SESSION["user"] = $user;

        header("Location: /mystore");

        
    }else{
        die("invalid username or password");
    }

}

else{
    die("invaild input");
}
