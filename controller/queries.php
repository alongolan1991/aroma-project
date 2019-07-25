<?php
function query_categories($conn){
    $sql = "SELECT * FROM category ORDER BY id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "0 results";
    }

    $conn->close();
}

function query_category_products($conn, $catetory_id){
    $sql = "SELECT name, picture, id, vegan FROM product WHERE category_id ='" . $catetory_id . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "0 results";
    }

    $conn->close();
}

function query_product($conn, $product_id){
    $sql = "SELECT * FROM product WHERE id ='" . $product_id . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>