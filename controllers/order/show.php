<?php

if(!isset($_SESSION['name'])) {
    header('Location: /login');
}
$db = \Core\App::resolve(\Core\Database::class);

$orders = $db->query("SELECT * FROM transactions WHERE email=:email ORDER BY id DESC",[
    'email'=>$_SESSION['email']
])->get();



view('order/show.view.php',[
    'orders'=>$orders
]);