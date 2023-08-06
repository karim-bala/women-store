
<?php

if(!isset($_SESSION['name'])) {
    header('Location: /login');
}

if(!isset($_GET['id'])) {
    header('Location: /profile');
}

$db = \Core\App::resolve(\Core\Database::class);

$transactions = $db->query("SELECT * FROM transactions WHERE email=:email and id = :id ORDER BY id DESC",[
    'email'=>$_SESSION['email'],
    'id'=>filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)
])->get();

if ($transactions){
    $details = unserialize($transactions[0]['details']);
}

view('order/showdetails.view.php',[
    'details'=>$details
]);