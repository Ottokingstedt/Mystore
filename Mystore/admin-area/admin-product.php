<?php 

require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../admin-script/force-admin.php";

if(!isset($_GET["id"])){
    var_dump($_GET["id"]);
}

$products_db = new ProductsDatabase();

$product = $products_db->get_one($_GET["id"]);

Template::header(""); 

if($product == null): ?>

<h3> No product </h3>

<?php else: ?>

<form class="box2" action="/mystore/admin-script/post-update-product.php?id=<?= $_GET["id"] ?>" method="post" enctype="multipart/form-data">
<h3>Edit products</h3>    

<input type="text" name="title" placeholder="Title" value="<?= $product->title ?>"><br>
    <textarea name="description" placeholder="Description" value="<?= $product->description ?>"></textarea><br>
    <input type="number" name="price" placeholder="Price" value="<?= $product->price ?>"><br>
    <input type="file" name="image" accept="image/*"><br>
    <button class="button" onclick="this.classList.toggle('button--loading')" type="submit" value="Save"><span class="button__text">Save</span></button>
</form>

<p><b>Delete:</b></p>

<form action="/mystore/admin-script/post-delete-product.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <input type="submit" value="Delete product">
</form>


<?php 

endif; 

Template::footer();