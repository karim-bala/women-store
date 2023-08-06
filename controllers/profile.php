<?php

use Core\Validation;


if (isset($_POST['update'])){
    $error = [];
    $lastname = filter_input(INPUT_POST,'lastname');
    $firstname = filter_input(INPUT_POST,'firstname');
    $phone = filter_input(INPUT_POST,'phone');
    $address = filter_input(INPUT_POST,'address');
    if (!Validation::string($lastname,1,20)){  $error['lastname'] ='lastname lenght should be between 1 and 20';}
    if (!Validation::string($firstname,1,20)){  $error['firstname'] ='firstname lenght should be between 1 and 20';}
    if (!Validation::phone($phone)){  $error['phone'] ='insert correct phone number';}
    if (!Validation::string($address,1,20)){  $error['address'] ='address lenght should be between 1 and 20';}

    echo $lastname.$firstname.$phone.$address;

    if (!$error){
        //todo
        //update profile
        $db = \Core\App::resolve(\Core\Database::class);
        $db->query("update users set firstname=:firstname,lastname=:lastname,phone=:phone,address=:address where email=:email",[
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'phone'=>$phone,
            'address'=>$address,
            'email'=>$_SESSION['email']
        ]);

        $user = $db->query("select * from users where email=:email",[
            'email'=>$_SESSION['email']
        ])->find();

        // update cockeies
        $_SESSION['name']= $user['lastname']." ".$user['firstname'];
        $_SESSION['phone']= $user['phone'];
        $_SESSION['address']= $user['address'];

        view('profile.view.php',[]);

    }else{
        view('profile.view.php',[
            'error'=>$error
        ]);
    }
}else{
    view('profile.view.php',[]);
}