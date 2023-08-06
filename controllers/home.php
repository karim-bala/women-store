<?php

$db = \Core\App::resolve(\Core\Database::class);
$items = $db->query("SELECT * FROM products ORDER BY rand() LIMIT 9")->get();


view('home.view.php',[
    'items'=>$items
]);