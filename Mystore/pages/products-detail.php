<?php 

require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/IPAddressDatabase.php";

$products = isset($_SESSION["detail"]);

$products_db = new ProductsDatabase();

$product = $products_db->get_one($_GET["id"]);

Template::header(""); 

?>
<body class="body2">
<div class="wrapper2">
    <div class="product-img">
      <img src="<?= $product->img_url ?>" height="520" width="627">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1><?= $product->title ?></h1>
        <h2>by Wizard Soda</h2>
        <p><?= $product->description ?></p>
      </div>
      <form action="/Mystore/scripts/post-add-to-cart.php" method="post">
      <div class="product-price-btn">
        <p><span><?= $product->price ?></span>$</p>
        <input type="hidden" name="product-id" value="<?= $product->id ?>">
        <input type="submit" value="Add to cart"></div>
      </form>
    </div>
  </div>
</body>

</html>
<?php

Template::footer("");