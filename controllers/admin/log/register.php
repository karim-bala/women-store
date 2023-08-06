<?php
$error = false;
if (isset($_POST['submit'])){
    $email =  filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password');
    $vrfPassord = filter_input(INPUT_POST,'vrfpassword');

    if ($password===$vrfPassord){
        $db = \Core\App::resolve(\Core\Database::class);
        $user = $db->query("select * from admin where email=:email",[
            'email'=>$email
        ])->find();

        if (!$user){
            $db->query("insert into admin (email,password)values(:email,:password)",[
                'email'=>$email ,
                'password'=>password_hash($password,PASSWORD_DEFAULT)
            ]);

            $_SESSION['emailAdmin']= $email;
            header('/admin/home');
        }else{
            $error = true;
        }
    }else{
        $error = true;
    }
}
view('/admin/log/register.view.php',[
    'error'=> $error
]);