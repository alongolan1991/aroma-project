<?php
require '../controller/connection.php';
require '../controller/queries.php';

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$categories = query_categories($conn);
$products = query_category_products($conn, $queries['id']);
require './head.php';
?>
<div class="col-10">
    <div class="products-grid">
        <?php while($row = $products->fetch_assoc()) { ?>
        <a href="product.php?id=<?=$row['id']?>">
            <div class="center-text">
                <img class="med-product-picture" src="<?=$row['picture']?>">
                <p class="text-product"><?=$row['name']?></p>
                <?php if($row['vegan'] == 1) 
                echo "<img style='float:right' src='assets/vegan.png'>";
                ?>
            </div>
        </a>
        <?php } ?>
        <?php require './footer.php' ?>