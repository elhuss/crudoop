<?php
//page given in url param , default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//set number of records per page
$records_per_page = 5;
//calculat for the query limit clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>