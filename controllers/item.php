<?php

if(!isset($_GET['id'])) {
    header('Location: /404');
}
if (isset($_GET['id'])){
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }
}
$inCart = false;

if(isset($_POST['cart']) ) {

    $_SESSION['cart'][$_POST['id']] = array(
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'price' => $_POST['price'],
        'description' => $_POST['description'],
        'category' => $_POST['category'],
        'quantity' => $_POST['quantity'],
        'image' => $_POST['image']
    );
}

foreach($_SESSION['cart'] as $i) {
    if($i['id'] == $_GET['id']) {
            $inCart = true;

    }

}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$db = \Core\App::resolve(\Core\Database::class);
$item2 = $db->query("SELECT * FROM products where id=:id",[
    'id'=>$id
])->find();
$images = unserialize($item2['images']);
$relatedItems = $db->query("SELECT * FROM products WHERE category=:category ORDER BY rand()",[
    'category'=>$item2['category']
])->get();




view('item.view.php',[
    'item2'=>$item2,
    'images'=>$images,
    'inCart'=>$inCart,
    'relatedItems'=>$relatedItems
]);