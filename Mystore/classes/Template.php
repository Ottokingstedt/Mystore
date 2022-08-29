<?php 

require_once __DIR__ . "/UsersDatabase.php";
session_start();

class Template {
    public static function header()
    {
        $is_logged_in = isset($_SESSION["user"]);
        $logged_in_user = $is_logged_in ? $_SESSION["user"] : null;
        $is_admin = $is_logged_in && $logged_in_user->role == "admin";

       $cart_count = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizard Soda</title>
    <!-- === font awesome link ==== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- === Box ICONS === -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="/Mystore/assets/style.css">
</head>
<body>
           
  <!--===== HEADER =====-->

   <header class="l-header">
     <nav class="nav bd-grid">
       <div>
         <a href="#" class="nav__logo"><img src="/Mystore/assets/img/wizards-of-the-coast-logo-png-transparent.png" alt=""></a>
       </div>

       <div class="nav__toggle" id="nav-toggle">
         <i class="bx bx-menu"></i>
       </div>

       <div class="nav__menu" id="nav-menu">
                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

         <ul class="nav__list">
          <li class="nav__item">
            <a aria-current="page" href="/Mystore/index.php" class="nav__link active">Home</a>
          </li>
          <li class="nav__item">
            <a href="/Mystore/pages/products.php" class="nav__link">Product</a>
          </li>
          <li class="nav__item">
            <a  href="/Mystore/pages/contact.php" class="nav__link">Contact</a>
          </li>
          <li class="nav__item">
            <a href="/Mystore/pages/items_cart.php" class="nav__link"><i class="fa-solid fa-basket-shopping">(<?=  $cart_count ?>)</i></a>
          </li>
          <?php if (!$is_logged_in) : ?>
          <li class="nav__item">
            <a href="/Mystore/pages/register.php" class="nav__link">Register</a>
          </li>
          <li class="nav__item">
            <a href="/Mystore/pages/login.php" class="nav__link">Login</a>
          </li>
          <?php elseif ($is_admin) : ?>
          <li class="nav__item">
          <a href="/Mystore/admin-area/admin.php" class="nav__link">Admin Area</a>
          </li>
          <?php endif; ?>
            <?php if ($is_logged_in) : ?>
              <li class="nav__item">
                <p>
                  <b>Welcome</b>
                  <?= $logged_in_user->username ?>
                </p>
              </li>
              <li class="nav__item">
            <a href="/Mystore/pages/order.php" class="nav__link">My orders</a>
              </li>
              <form action="/Mystore/scripts/post-logout.php" method="post">
                <li class="nav__item">
                  <input class="logout" type="submit" value="Logout">
                </li>
              </form>
            <?php endif; ?>
          </ul>

          </div>
      </nav>
  </header>
<?php }


public static function footer()
{ ?> 

    <footer> 
        <h5>All rights reserved ©Wizard-Soda - Designed by Mr Kingis 2022</h5>
        <!-- <div class="w3-xlarge w3-padding-hor-32">
   <a href="#"> <i class="fa fa-facebook-official"></i></a>
   <a href="#"><i class="fa fa-pinterest-p"></i></a>
   <a href="#"><i class="fa fa-twitter"></i></a>
   <a href="#"><i class="fa fa-flickr"></i></a>
   <a href="#"></i></a> -->
 </div>
    </footer>
 
        <!--===== GSAP =====-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>

        <!--===== MAIN JS =====-->
<script src="/Mystore/assets/main.js"></script>
</body>
</html>

<?php }
}
