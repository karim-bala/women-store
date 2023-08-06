<?php

use Core\Validation;
if (isset($_SESSION['name'])){
    header('location: /');
}
$lastname = filter_input(INPUT_POST, 'lastname');
$firstname = filter_input(INPUT_POST, 'firstname');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone');
$address = filter_input(INPUT_POST, 'address');
$password = filter_input(INPUT_POST, 'password');
$createdTime = time();

$error = [];

if (!Validation::string($lastname,1,20)){  $error['lastname'] ='lastname lenght should be between 1 and 20';}
if (!Validation::string($firstname,1,20)){  $error['firstname'] ='firstname lenght should be between 1 and 20';}
if (!Validation::email($email)){  $error['email'] ='email not correct';}
if (!Validation::phone($phone)){  $error['phone'] ='insert correct phone number';}
if (!Validation::string($address,1,20)){  $error['address'] ='address lenght should be between 1 and 20';}
if (!Validation::string($password,4,10)){
    $error['password'] ='password lenght should be between 1 and 20';
}else{
    $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
}


if ($error){

    view('register/create.view.php',[
        'error'=> $error
    ]);
}else {
    $db = \Core\App::resolve(\Core\Database::class);
    $user = $db->query("select * from users where email= :email", [
        "email" => $email
    ])->find();

    if ($user) {
        // user email exisit alredy go to login page
        view('login.view.php',[
            'msg'=>'you have an account with this email, please login !'
        ]);
    }
    //todo
    //new registration, insert user info onto DB and check the email address
    $db->query("insert into users(firstname, lastname, email, phone, address, password, created) VALUES (:firstname , :lastname , :email , :phone, :address, :password, :createdTime)",[
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'phone'=>$phone,
        'address'=>$address,
        'password'=>$password,
        'createdTime'=>$createdTime
    ]);

    $_SESSION['name'] = $lastname . ' ' . $firstname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;
    $_SESSION['created-time'] = $createdTime;
    header('Location: /');
}