<?php
require '../controller/connection.php';
require '../controller/queries.php';
$categories = query_categories($conn);
require './head.php';
?>
            <div class="col-5 with-padding">
                <?php 
         mysqli_data_seek($categories, 0);
         while($row = $categories->fetch_assoc()) { ?>
                <div class="row category-items" id="category-<?= $row['id']?>">
                    <ul class="list">
                        <?php
                    $result = query_category_products($conn,$row['id']);
                     while($row1 = $result->fetch_assoc()) {?>
                        <li class='product'>
                            <a href='product.php?id=<?= $row1['id']?>'>
                                <?= $row1['name'] ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="col-5 with-padding">
                <?php 
        mysqli_data_seek($categories, 0);
        while($row = $categories->fetch_assoc()) { ?>
                <img class="category-picture" src="<?php echo $row['picture']?>" id="picture-<?= $row['id']?>">
                <?php } ?>
            </div>
<?php require './footer.php' ?>
<script src="include/main.js"></script>