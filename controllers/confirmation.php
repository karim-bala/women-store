<?php
if(str_contains($_SERVER['HTTP_REFERER'], '/cart')) {
    unset($_SESSION['cart']);
} else {
    header('Location: /products');
}
view('confirmation.view.php',[]);