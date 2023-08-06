<?php
$searchEmpty=false;
$itemsPerPage  = 1;
$products;
$offset = 0;
$totalPages= 0;
$db = \Core\App::resolve(\Core\Database::class);
//get all categories from database
$categories = $db->query("select * from categories order by title",[])->get();

//page change
$current_page = isset($_GET['page'])? (int)$_GET['page']:1;

if (isset($_POST['q'])&&isset($_GET['c'])){
    //search bar
    $query = filter_input(INPUT_POST, 'q');
    $category = filter_input(INPUT_GET, 'c');
    $products = $db->query("SELECT * FROM products WHERE category=:category AND CONCAT(`title`, `price`, `description`, `category`) LIKE '%{$query}%'",[
        'category'=>$category,
    ])->get();
    if (!$products){
        $searchEmpty = true;
    }
}elseif(isset($_POST['q'])){
    $query = filter_input(INPUT_POST, 'q');

    $products = $db->query( "SELECT * FROM products WHERE CONCAT(`title`, `price`, `description`, `category`) LIKE '%{$query}%'",[])->get();
    if (!$products){
        $searchEmpty = true;
    }
}elseif (isset($_GET['c'])){
    $offset = ($current_page - 1) * $itemsPerPage;
    $totalItems = $db->query("SELECT count(*) FROM products WHERE category=:category",[
        'category'=> filter_input(INPUT_GET, 'c')
    ])->find();

    $totalPages = ceil($totalItems['count(*)']/$itemsPerPage);
    $products = $db->query("SELECT * FROM products WHERE category=:category LIMIT {$offset},{$itemsPerPage}",[
        'category'=>filter_input(INPUT_GET, 'c')
    ])->get();
}else{

    $offset = ($current_page - 1) * $itemsPerPage;
    $totalItems = $db->query("SELECT count(*) FROM products",[])->find();
    $totalPages = ceil($totalItems['count(*)']/$itemsPerPage);
    $products = $db->query("SELECT * FROM products  LIMIT {$offset},{$itemsPerPage}",[])->get();


}


view('products/create.view.php',[
    'products'=>$products,
    'searchEmpty'=>$searchEmpty,
    'offset'=>$offset,
    'totalPages'=>$totalPages,
    'categories'=>$categories,
    'current_page'=>$current_page,



]);