<?php

use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

$container->bind("Core\Database",function (){
    $config = require base_path('config.php');
    return new Database($config['database'],'karim','karim');
});

App::setContainer($container);

/*
$db = App::resolve(Database::class);

$about = $db->query("select * from about")->get();

dd($about);

exit();
*/