<?php
echo "<ul class='pagination'>";
//button for first page
if($page>1){
    echo "<li><a href='{$page_url}' title='go to the  first page'>";
        echo "First";
    echo "</a></li>";
}
//calculate total pages
$total_pages = ceil($total_rows / $records_per_page);
// range of links to show
$range = 2;
//display link to current page
$initial_num = $page - $range;
$condition_limit_num = ($page + $range)  + 1;
for($x=$initial_num; $x<$condition_limit_num; $x++){
    //be sure $x is greater than 0 and less than or equal total page
    if(($x > 0) && ($x <= $total_pages)){
        //current page
        if($x == $page) {
            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
        }else{
            //not current page
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}
// button for last page
if($page<$total_pages){
    echo "<li><a href='" .$page_url. "page={$total_pages}' title='Last page is {$total_pages}.'>";
        echo "Last";
    echo "</a></li>";
}
echo "</ul>";
?>