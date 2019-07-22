<?php
require '../controller/connection.php';
require '../controller/sqlquery.php';
require './head.php';
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $categories = get_category($conn);
    $products = get_product_content($conn,$queries['id']);
?>
<div class="wrapper">
    <!-- Content here -->
    <?php require './nav.php'; ?>
    <div class="row">
        <?php require './categorySideBar.php'; ?>
        <div class="col-3">
            <?php  while($row = $products->fetch_assoc()) { 
            $meal_value = $row['gram'] / 100;
            ?>
            <h4 class="productHeader"><?= $row['name']?></h4>
            <?php if($row['vegan'] == 1) 
                echo "<img src='assets/vegan.png'>";
            ?>
            <p class="productDescription"> <?=$row['description']?></p>
            <?php if(!is_null($row['gram'])){ ?>
            <p class="productHeader"> ערכים תזונתיים </p>
            <p class="productHeader"> מנה = <?=$row['gram']?> גרם </p>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>במנה</th>
                        <th>ב-100 גרם</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border_bottom">
                        <td>אנרגיה (קלוריות)</td>
                        <td><?= round($row['energy'] * $meal_value,1) ?></td>
                        <td><?= $row['energy'] ?></td>
                    </tr>
                    <tr class="border_bottom">
                        <td>חלבונים (גרם)</td>
                        <td><?= round($row['protein'] * $meal_value,1) ?></td>
                        <td><?= $row['protein'] ?></td>
                    </tr>
                    <tr class="border_bottom">
                        <td>פחמימות (גרם)</td>
                        <td><?= round($row['carbohydrate'] * $meal_value,1) ?></td>
                        <td><?= $row['carbohydrate'] ?></td>
                    </tr>
                    <tr class="border_bottom">
                        <td>סך השומנים (גרם)</td>
                        <td><?= round($row['fats'] * $meal_value,1) ?></td>
                        <td><?= $row['fats'] ?></td>
                    </tr>
                    <tr class="border_bottom">
                        <td>חומצות שומן רוויות (גרם)</td>
                        <td><?= round($row['fatty_acids'] * $meal_value,1) ?></td>
                        <td><?= $row['fatty_acids'] ?></td>
                    </tr>
                    <tr class="border_bottom">
                        <td>כולסטרול (מ"ג)</td>
                        <td><?= round($row['cholesterol'] * $meal_value,1) ?></td>
                        <td><?= $row['cholesterol'] ?></td>
                    </tr>
                    <tr class="border_bottom">
                        <td>נתרן (מ"ג)</td>
                        <td><?= round($row['sodium'] * $meal_value,1) ?></td>
                        <td><?= $row['sodium'] ?></td>
                    </tr>
                </tbody>
            </table>
            <?php } ?>
        </div>
        <div class="col-4">
            <img class="bigProductPicture" src='<?= $row['picture']?>'>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require './footer.php' 
?>