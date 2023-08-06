<?php

$db = \Core\App::resolve(\Core\Database::class);
$transactions = $db->query("SELECT * FROM transactions ORDER BY id DESC",[])->get();

view('admin/orders.view.php',[
    'transactions'=>$transactions
]);