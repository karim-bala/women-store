<?php

$db = \Core\App::resolve(\Core\Database::class);

if (isset($_POST['delete'])){

    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);

    $db->query("delete from products where id=:id",[
        'id'=>$id
    ]);
}
$items  =$db->query("select * from products",[])->get();

//todo add image column to table to show product to admin

view('admin/products.view.php',[
    'edit'=>false,
    'items'=>$items
]);