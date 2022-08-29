<?php 
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";


$is_logged_in = isset($_SESSION["user"]);
$logged_in_user = $is_logged_in ? $_SESSION["user"] : null;
$is_admin = $is_logged_in && $logged_in_user->role == "admin";

if(!$is_admin){
    http_response_code(401);
    die("Access denied");
}

$users_db = new UserDatabase();

$users = $users_db->get_all();


require_once __DIR__ . "/../admin-area/admin.php";

Template::header("");

?>

    <!-- second child -->

<div class="bg-light">
    <h3 class="text-center p-2">Welcome to Admin</h3>

    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bf-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"></a>
                <p class="text-dark text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="/Mystore/admin-area/admin-view-product.php" >Insert Products</a></button>
                <button><a href="/Mystore/admin-area/admin-orders.php" >All orders</a></button>
                <button><a href="/Mystore/admin-area/admin-view-users.php">List users</a></button>
            </div>
        </div>
    </div>
</div>

<?php

Template::footer();
