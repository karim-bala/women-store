<?php
if (isset($_SESSION['emailAdmin'])){
    header('location: /admin/home');
}

if (isset($_POST['submit'])){

    $error= false;
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password');

// get info from DB

    $db = \Core\App::resolve(\Core\Database::class);
    $user = $db->query("select * from admin where email=:email",[
        'email'=>$email
    ])->find();

    if ($user){
        if (password_verify($password,$user['password'])){
            $_SESSION['emailAdmin']=$user['email'];
            header('location: /admin/home');
        }else{
            $error = true;
        }
    }else{
        $error = true;
    }
    view('admin/log/login.view.php',[
        'error'=>$error
    ]);

}else{

    view('admin/log/login.view.php',[
        'error'=>false
    ]);
}
