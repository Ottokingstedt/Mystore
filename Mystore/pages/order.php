<?php 

require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/IPAddressDatabase.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";

$is_logged_in = isset($_SESSION["user"]);
$logged_in_user = $is_logged_in ? $_SESSION["user"] : null;


$orders_db = new OrdersDatabase();

$orders = $orders_db->get_order_by_user_id($logged_in_user->id);
$products_id = new ProductsDatabase();

Template::header("");

?>

<h2>Recent Order</h2>

<table>
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody
				    <?php foreach($orders as $order) : ?>
					<tr>
						<td>
						<?= $order->id ?>			
						</td>
						<td>
						<?= $order->order_date ?>
						</td>
						<td>
						<?= $order->status ?>						
						</td>
							<td>
								$10
							</td>
					</tr>
				</tbody>
			</table>		

			<?php endforeach;
?>
Thanks for buying products. Click <a href="/Mystore/pages/products.php">here</a> to continue buy product.
<?php 
Template::footer();

