<div class="col-2 with-padding">
    <ul>
        <?php 
        while($row = $categories->fetch_assoc()) { ?>
        <li>
            <a class="category-link" href='category.php?id=<?=$row["id"]?>' data-category-id='<?=$row["id"]?>'>
                <div class="category-icon">
                    <img class="icon" src="<?=$row['icon']?>">
                </div><?=$row['name']?>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>