<?php
$db = \Core\App::resolve(\Core\Database::class);
$categories = $db->query("select * from categories",[])->get();
$products = [
    'title'=>'',
    'price'=>'',
    'description'=>'',
    'category'=>''
];
view('admin/products/create.view.php',[
    'categories'=>$categories,
    'products'=>$products,
    'btn'=>'Save',
    'action'=>'/admin/products/create'
]);