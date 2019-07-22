<?php
require '../controller/connection.php';
require '../controller/sqlquery.php';
require './head.php';
    $categories = get_category($conn);
?>
<div class="wrapper">
    <?php require './nav.php'; ?>
    <div class="container1">
        <div class="row">
            <?php require './categorySideBar.php'; ?>
            <div class="col-4">
                <?php 
         mysqli_data_seek($categories, 0);
         while($row = $categories->fetch_assoc()) { ?>
                <div class="row category-items" id="category-<?= $row['id']?>">
                    <ul class="list">
                        <?php
                    $result = get_categry_content($conn,$row['id']);
                     while($row1 = $result->fetch_assoc()) {?>
                        <li class='product'>
                            <a class='product' href='product.php?id=<?= $row1['id']?>'>
                                <?= $row1['name'] ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="col-4">
                <?php 
        mysqli_data_seek($categories, 0);
        while($row = $categories->fetch_assoc()) { ?>
                <img class="category-picture" src="<?php echo $row['picture']?>" id="picture-<?= $row['id']?>">
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require './footer.php' ?>
<script src="include/main.js"></script>