<?php
// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
        echo "<input type='text' class='form-control' placeholder='Type product name or description...' name='s' id='srch-term' required {$search_value} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";
// create product button
echo "<div class='right-button-margin'>
<a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>
</div>";
//display the products if there are any
if($total_rows>0){
echo "<table class='table table-hover table-responsive table-bordered'>";
echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Price</th>";
    echo "<th>Description</th>";
    echo "<th>Category</th>";
    echo "<th>Actions</th>";
echo "</tr>";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    
    echo "<tr>";
        echo "<td>{$name}</td>";
        echo "<td>{$price}</td>";
        echo "<td>{$description}</td>";
        echo "<td>";
            $category->id = $category_id;
            $category->readName();
            echo $category->name;
        echo "</td>";
        echo "<td>";
        // read oen , edit, delete buttons
        echo "<a href='read_one.php?id={$id}' class='btn btn-primary margin-left'>
            <span class='glyphicon glyphicon-list'></span>Read
        </a>
        <a href='update_product.php?id={$id}' class='btn btn-info left-margin'>
            <span class='glyphicon glyphicon-edit'></span> Edit
        </a>

        <a delete-id='{$id}' class='btn btn-danger delete-object'>
            <span class='glyphicon glyphicon-remove'></span> Delete
        </a>";
        echo "</td>";
    echo "</tr>";
}
echo "</table>";
    //paging buttons here
    include_once 'paging.php';
}else{//tell the user there are no products
    echo "<div class='alert alert-info'> No Products Found </div>";
}
?>