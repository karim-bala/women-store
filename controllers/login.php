<?php

if (isset($_SESSION['name'])){
    header('location: /');
}

if (isset($_POST['login'])){

$error= false;
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,'password');

// get info from DB

$db = \Core\App::resolve(\Core\Database::class);
$user = $db->query("select * from users where email=:email",[
    'email'=>$email
])->find();

if ($user){
    if (password_verify($password,$user['password'])){
        $_SESSION['name']=$user['lastname']." ".$user['firstname'];
        $_SESSION['email']=$user['email'];
        $_SESSION['phone']=$user['phone'];
        $_SESSION['address']=$user['address'];
        $_SESSION['created-time']=$user['created'];
        header('location: /');
    }else{
        $error = true;
    }
}else{
    $error = true;
}
    view('login.view.php',[
        'error'=>$error
    ]);

}else{

    view('login.view.php',[
        'error'=>false
    ]);
}