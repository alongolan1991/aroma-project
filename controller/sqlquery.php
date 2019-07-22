<?php
function get_category($conn){
    $sql = "SELECT * FROM category ORDER BY id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
        
    } else {
        echo "0 results";
    }
    $conn->close();
}

function get_categry_content($conn, $catetory_id){
    $sql = "SELECT name,picture,id,vegan FROM product WHERE categoryid ='" . $catetory_id . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
        
    } else {
        echo "0 results";
    }
    $conn->close();

}

function get_product_content($conn, $product_id){
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