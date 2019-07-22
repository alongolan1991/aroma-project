<?php
require '../controller/connection.php';
require '../controller/sqlquery.php';
require './head.php';
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $categories = get_category($conn);
    $products = get_categry_content($conn,$queries['id']);
?>
<div class="wrapper">
    <!-- Content here -->
    <?php require './nav.php'; ?>
    <div class="row">
        <?php require './categorySideBar.php'; ?>
        <div class="col-10">
            <div class="productsGrid">
                <?php while($row = $products->fetch_assoc()) { ?>
                <a href="product.php?id=<?=$row['id']?>">
                    <div class="centerText">
                        <img class="medProductPicture" src="<?=$row['picture']?>">
                        <p class="textProduct"><?=$row['name']?></p>
                        <?php if($row['vegan'] == 1) 
                echo "<img style='float:right' src='assets/vegan.png'>";
                ?>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require './footer.php' ?>