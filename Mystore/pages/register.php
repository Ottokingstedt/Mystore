<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/Mystore/assets/register.css">
</head>
<body>

<section class="box">


<form class="box2" action="/mystore/scripts/post-register-user.php" method="post">
<h1>register user</h1>
<input type="text" name="username" placeholder="Username"> <br>
<input type="password" name="password" placeholder="Password"> <br>
<input type="password" name="confirm-password" placeholder="Confirm password"> <br>
<input type="submit" value="Register">

</form>
</section>

    
</body>
</html>