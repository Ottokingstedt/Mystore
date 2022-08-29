<?php 

require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

if(isset($_GET["register"]) && $_GET['register'] == "success"){
    echo "<h2>User registered, please log in</h2>";
}

if(isset($_GET["error"]) && $_GET["error"] == "wrong_pass") : ?>

<h2>Wrong usename or pass!</h2>

<?php endif; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/Mystore/assets/register.css">
</head>
<section class="box">
<form action="/mystore/scripts/post-login.php" method="post">
<h1>Login</h1>
<input type="text" name="username" placeholder="Username"> <br>
<input type="password" name="password" placeholder="Password"> <br>
<button class="button" onclick="this.classList.toggle('button--loading')" type="submit" value="Login"><span class="button__text">Login</span></button>
<nav>
    <a href="/mystore/index.php">home</a>
</nav>
</form>

<?php 

Template::footer();

?>
</section>
