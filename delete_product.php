<?php
// check if value was posted
if($_POST){
    // include db and objects files
    include_once 'config/database.php';
    include_once 'objects/product.php';
    //get db con
    $database = new Database();
    $db = $database->getConnection();
    //prepare product objects
    $product = new Product($db);
    // set product id to be deleted
    $product->id = $_POST['object_id'];
    //delete the product
    if($product->delete()){
        echo "Product Was Deleted";
    }else{
        echo "Unable to Delete the product";
    }
}
?>