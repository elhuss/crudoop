<?php
//core.php holds pagination variables
include_once 'config/core.php';
//inc db and ob files
include_once 'config/database.php';
include_once 'objects/category.php';
include_once 'objects/product.php';
//instantiate db and product ob
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);

// get search term
$search_term = isset($_GET['s']) ? $_GET['s'] : '';

$page_title = "You Searched For \"{$search_term}\"";
include_once 'layout_header.php';

//query products
$stmt = $product->search($search_term, $from_record_num, $records_per_page);
// specify the page where paging is used
$page_url = "search.php?s={$search_term}";
//count total rows - used for pagination
$total_rows =$product->countAll_BySearch($search_term);
//read_template.php control how the product list will be rendered
include_once 'read_template.php';
// layout_footer holds our js and closing tags
include_once 'layout_footer.php';
?>