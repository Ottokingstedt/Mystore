<?php 
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";


$is_logged_in = isset($_SESSION["user"]);
$logged_in_user = $is_logged_in ? $_SESSION["user"] : null;
$is_admin = $is_logged_in && $logged_in_user->role == "admin";

if(!$is_admin){
    http_response_code(401);
    die("Access denied");
}

$products_db = new ProductsDatabase();

$products = $products_db->get_all();


Template::header(""); ?>

<h2>Product</h2>

<section class="box">

<form class="box2" action="/mystore/admin-script/post-create-product.php" method="post" enctype="multipart/form-data">
<h3>Create products</h3>    
<input type="text" name="title" placeholder="Title"><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="number" name="price" placeholder="Price"><br>
    <input type="file" name="image" accept="image/*"><br>
    <button class="button" onclick="this.classList.toggle('button--loading')" type="submit" value="Save"><span class="button__text">Save</span></button>
</form>

</section>


<?php foreach ($products as $product) : ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= $product->img_url ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $product->title ?></h5>
                    <p></p>
                    <a href="/mystore/admin-area/admin-product.php?id=<?= $product->id ?>" class="btn btn-primary">Edit</a>
                    </a>
                </div>
            </div>
        </div>
    </div>         
<?php endforeach; ?>


<?php 

Template::footer();