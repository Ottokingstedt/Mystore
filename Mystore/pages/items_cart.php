<?php
error_reporting(0);
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/IPAddressDatabase.php";

if (isset($_GET['id']) && !isset($_POST['update'])) {
	$item = new ProductsDatabase();
	$item->id = $product->id;
	$item->name = $product->name;
	$item->price = $product->price;
	// Check product is existing in cart
	$index = 1;
	if (isset($_SESSION['cart'])) {
		$cart = unserialize(serialize($_SESSION['cart']));
		for ($i = 0; $i < count($cart); $i++)
			if ($cart[$i]->id == $_GET['id']) {
				$index = $i;
				break;
			}
	}
	if ($index == 1)
		$_SESSION['cart'][] = $item;
}

// Delete product in cart
if (isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}

// clear cart 
if (isset($_GET['clear'])){
	$_SESSION['cart'] = array();
}


Template::header("");

?>

<?php:
echo isset($error) ? $error : ''; ?>
<main id="content_0">
	<section class="cart-container">
		<h3>Shopping cart</h3>
			<form method="post">
					<table>
						<thead>
							<tr>
								<th>Delete</th>
								<th>Id</th>
								<th>title</th>
								<th>Image</th>
								<th>Price</th>
							</tr>
						</thead>
					<?php
					$cart = unserialize(serialize($_SESSION['cart']));
					$s = 0;
					$index = 0;
					for ($i = 0; $i < count($cart); $i++) {
						$s += $cart[$i]->price = $cart[$i]->price;
					?>
						<tbody id="carttable">
							<tr>
								<td><a class="remove" href="/Mystore/pages/items_cart.php?index=<?= $index; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
								<td><?= $cart[$i]->id; ?></td>
								<td><?= $cart[$i]->title; ?></td>
								<td class="imgsize"> <img src="<?= $cart[$i]->img_url; ?>" alt="" style="width: 100px; height: auto;"></td>
								<td><?= $cart[$i]->price; ?></td>
							</tr>
							</tbody>
							<?php
								$index++;
							}
						
							?>
								<?php 
									if(empty($_SEESION[`cart`])){
									} else {
										echo"<tr><td colspan='5'>Your Cart is Empty></td></tr>";
									}
							 ?>
							<table id="carttotals">
							<tr>
								<td>Sum</td>
							</tr>
							<tr>
								<td>$<span id="total"><?= $s; ?></span></td>
							</tr>
				</table>
			</form>
			<div class="cart-buttons">
			<form action="/Mystore/scripts/post-add-to-order.php" method="post">
				<input type="submit" value="Order now">
			</form>
			</div>
			<input type="submit" value="Clear cart" ></a>
			</div>
	</section>
</main>

<br>
<a href="/Mystore/pages/products.php">Continue Shopping</a>

<?php

Template::footer();
