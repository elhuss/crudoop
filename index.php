<?php

//include db and objects and core
include_once 'config/core.php';
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

//instantiate db and objects
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);

// set page header
$page_title = "Read Products";
include_once "layout_header.php";

// contents will be here 
// query products
$stmt = $product->readAll($from_record_num, $records_per_page);
// the page where this paging is used
$page_url = "index.php?";
//count all products in db to calc total pages
$total_rows = $product->countALL();

// read_template.php controls how the product list will be rendered
include_once "read_template.php";
// set page footer
include_once "layout_footer.php";
?>