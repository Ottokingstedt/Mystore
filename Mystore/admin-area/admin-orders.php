<?php 
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";


$is_logged_in = isset($_SESSION["user"]);
$logged_in_user = $is_logged_in ? $_SESSION["user"] : null;
$is_admin = $is_logged_in && $logged_in_user->role == "admin";

if(!$is_admin){
    http_response_code(401);
    die("Access denied");
}

$orders_id = new OrdersDatabase();

$orders = $orders_id->get_all();
$products_id = new ProductsDatabase();

$products = $products_id->get_all();

Template::header("");
?> 
<section class="sec1">
<h1>Order recent</h1>

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
    <form class="box2" action="/mystore/admin-script/post-update-order.php?id=<?=  $order->id ?>" method="post" enctype="multipart/form-data">
                        <select name="status">
    <option disabled selected>status</option>
    <option value="waiting">waiting</option>
    <option value="delivered">delivered</option>
                        </select>
    <input type="submit" value="save">
    </form>
						<?= $order->status ?>						
						</td>
                        <td>
                        <form action="/mystore/admin-script/post-delete-order.php" method="post">
    <input type="hidden" name="id" value="<?= $order->id ?>">
    <input type="submit" value="Delete Order">
                        </form>
                        </td>
                        <?php endforeach; ?>
					</tr>
				</tbody>
			</table>		
            </section>
            <?php 
Template::footer();
