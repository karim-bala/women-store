<?php

$edit = false;
$customers=[];

if (isset($_GET['id'])){
    $edit = true;
    echo 'one user';
}
if (isset($_POST['delete'])){
    echo('delete');
}else{



    $db = \Core\App::resolve(\Core\Database::class);
    $customers = $db->query('select * from users',[])->get();
}

view('admin/customers.view.php',[
    'customers'=>$customers,
    'edit'=>false
]);