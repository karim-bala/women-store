<?php
use Core\Router;
session_start();
const BASE_PATH = __DIR__ . "/";//          "C:\Users\bala\Desktop\e-commerce\womenstor\"

require BASE_PATH . 'Core/functions.php';
spl_autoload_register(function ($class){
    $class= str_replace("\\",DIRECTORY_SEPARATOR,$class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');



$router = new Router();
$router->get('/','controllers/home.php');
$router->get('/register','controllers/register/create.php');
$router->post('/register','controllers/register/store.php');
$router->get('/login','controllers/login.php');
$router->post('/login','controllers/login.php');
$router->get('/logout','controllers/logout.php');
$router->get('/profile','controllers/profile.php');
$router->post('/profile','controllers/profile.php');
$router->get('/about','controllers/about.php');
$router->get('/products','controllers/products/create.php');
$router->post('/products','controllers/products/create.php');
$router->get('/item','controllers/item.php');
$router->post('/item','controllers/item.php');
$router->get('/orders','controllers/order/show.php');
$router->get('/order-details','controllers/order/showdetails.php');
$router->get('/cart','controllers/cart.php');
$router->post('/cart','controllers/cart.php');
$router->get('/confirmation','controllers/confirmation.php');







$router->get('/admin/login','controllers/admin/log/login.php');
$router->get('/admin/register','controllers/admin/log/register.php');
$router->post('/admin/register','controllers/admin/log/register.php');
$router->post('/admin/login','controllers/admin/log/login.php');
$router->get('/admin/logout','controllers/admin/log/logout.php');
$router->get('/admin/home','controllers/admin/home.php');
$router->get('/admin/customers','controllers/admin/customers.php');
$router->post('/admin/customers','controllers/admin/customers.php');
$router->post('/admin/products','controllers/admin/products.php');
$router->get('/admin/products','controllers/admin/products.php');
$router->get('/admin/products/create','controllers/admin/products/create.php');
$router->post('/admin/products/create','controllers/admin/products/store.php');
$router->post('/admin/products/update','controllers/admin/products/update.php');
$router->get('/admin/products/update','controllers/admin/products/update.php');
$router->get('/admin/stats','controllers/admin/stats.php');
$router->get('/admin/orders','controllers/admin/orders.php');
$router->get('/admin/settings','controllers/admin/settings.php');
$router->get('/admin/faq','controllers/admin/faq.php');




//require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method_r = $_POST['_method']??$_SERVER['REQUEST_METHOD'];
$router->routeToController($uri,$method_r);
