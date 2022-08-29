<?php 

require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/IPAddressDatabase.php";
// calling Product function 

$product_db = new ProductsDatabase();

$products = $product_db->get_all();

Template::header("");
foreach ($products as $product) : ?>
<div class="wrapper">
    <div class="container">
	<div class="product-card">
		<div class="badge">Hot</div>
		<div class="product-tumb">
			<img src="<?= $product->img_url ?>" alt="">
		</div>
		<div class="product-details">
			<span class="product-catagory">soda</span>
			<h4><a href="/Mystore/pages/products-detail.php?id=<?= $product->id ?>"><?= $product->title ?></a></h4>
			<div class="product-bottom-details">
				<div class="product-price">$<?= $product->price ?></div>
                <form action="/Mystore/scripts/post-add-to-cart.php" method="post">
				<div class="product-links">
                    <input type="hidden" name="product-id" value="<?= $product->id ?>">
                    <input type="submit" value="Add to cart">

                </form>        
				</div>
			</div>
		</div>
	</div>
</div>
</div>
    <?php 
    endforeach;

    template::footer();


// if(!isset($_GET['product_id]) || empty($_GET["product_id"])){
//	echo "product_id not set!";
//	die();
// };

// requrie __DIR__ . '/mystore/classes/CartDatabase';

// $product_id = $_GET['id'];
// $user_id = $_SESSION['id']

// $stmt = $pdo->query("INSERT INTO cart (user_id, product_id, status) VALUE (?, ?, ?));
// $success = $pdo->prepare(stmt)->execute([$user_id, $product_id, '']);

// if($success){
	// header(location: "")
// header("Location: /Mystore/pages/products.php");
// die();

//}
// } else {
 //   die("Invalid input");
//}
//
// $product_id = $_GET ['product_id']

