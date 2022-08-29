<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";


$is_logged_in = isset($_SESSION["user"]);
$logged_in_user = $is_logged_in ? $_SESSION["user"] : null;
$is_admin = $is_logged_in && $logged_in_user->role == "admin";

if (!$is_admin) {
    http_response_code(401);
    die("Access denied");
}

if (!isset($_GET["id"])) {
    var_dump($_GET["id"]);
}

$users_db = new UserDatabase();

$user = $users_db->get_one_by_id($_GET["id"]);


Template::header(""); ?>

<form class="box2" action="/mystore/admin-script/post-update-user.php?id=<?= $user->id ?>" method="post" enctype="multipart/form-data">
    <p>User Id number:<b><?= $user->id ?></b></p>
    <p>Name: <b><?= $user->username ?></b></p> <br>
    <select name="role">
        <option disabled selected>Role</option>
        <option value="admin">admin</option>
        <option value="customer">customer</option>
    </select>

    <input type="submit" value="Save">
</form>

<form action="/mystore/admin-script/post-delete-user.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <input type="submit" value="Delete product">
</form>