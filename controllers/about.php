<?php

$db = \Core\App::resolve(\Core\Database::class);

$about = $db->query("select * from about",[])->find();
$fb = $db->query("select * from contact where name=:name",[
    'name'=>'facebook'
])->find();
$tw = $db->query("select * from contact where name=:name",[
    'name'=>'twitter'
])->find();

$ig = $db->query("select * from contact where name=:name",[
    'name'=>'instgram'
])->find();

$phone = $db->query("select * from contact where name=:name",[
    'name'=>'phone'
])->find();

$address = $db->query("select * from contact where name=:name",[
    'name'=>'address'
])->find();

$email = $db->query("select * from contact where name=:name",[
    'name'=>'email'
])->find();

view('about.view.php',[
    'about'=>$about['about'],
    'address'=>$address['value'],
    'phone'=>$phone['value'],
    'email'=> $email['value'],
    'fb'=>$fb['value'],
    'tw'=>$tw['value'],
    
]);