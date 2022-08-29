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

Template::header("");


?>

<?php foreach ($users as $user) : ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <b class="card-title"><?= $user->username ?></b><h5><?= $user->role ?></h5>
                    <p></p>
                    <a href="/mystore/admin-area/admin-users.php?id=<?= $user->id ?>" class="btn btn-primary">Edit</a>
                    </a>
                </div>
            </div>
        </div>
    </div>         
    

<?php endforeach;

?>

<hr>

<section class="box">
<form action="/mystore/admin-script/post-create-user.php" method="POST">
<h1>Create user</h1>
<input type="text" name="username" placeholder="username"> <br>
<input type="password" name="password" placeholder="Password"> <br>
<input type="password" name="confirm-password" placeholder="Confirm password"> <br>

<select name="role">
    <option disabled selected>Role</option>
    <option value="admin">admin</option>
    <option value="customer">customer</option>
</select>

<input type="submit" value="Create">
</form>