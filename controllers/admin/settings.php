<?php
$db = \Core\App::resolve(\Core\Database::class);
$policy = $db->query("select * from policy",[])->find();
$about = $db->query("select * from about",[])->find();
$contacts = $db->query("select * from contact",[])->get();

view('admin/settings.view.php',[
    'privacyPolicy'=>$policy,
    'about'=>$about,
    'contacts'=>$contacts
]);