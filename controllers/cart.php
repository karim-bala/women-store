<?php

require base_path('controllers/admin/util.php');
require base_path('Core/invoice.php');


if(isset($_POST['remove'])) {

    $id = filter_input(INPUT_POST, 'remove', FILTER_SANITIZE_NUMBER_INT);

    unset($_SESSION['cart'][$id]);

}
if (isset($_POST['checkout'])){
    if(!isset($_SESSION['name'])) {
        header('Location: /login');
    } else {
        $details = serialize($_SESSION['cart']);
        $timestamp = gmdate('Y-m-d h:i:s');
        $db = \Core\App::resolve(\Core\Database::class);
        $db->query("INSERT INTO transactions (name, email, address, details, timestamp) VALUES (:name, :email, :address, :details, :timestamp)",[
            'name'=>$_SESSION['name'],
            'email'=>$_SESSION['email'],
            'address'=>$_SESSION['address'],
            'details'=>$details,
            'timestamp'=>$timestamp
        ]);


        header('Location: /confirmation');
    }
}
view('cart.view.php',[]);
