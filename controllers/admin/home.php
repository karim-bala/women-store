<?php


require (base_path('controllers/admin/util.php'));
$db = \Core\App::resolve(\Core\Database::class);

if(isset($_POST['export'])) {
    exportDB($host, $name, $user, $password);
}

if(isset($_POST['import'])) {
    importDB($db);
}


if(isset($_POST['send-email'])) {
    $title = filter_input(INPUT_POST, 'title');
    $message = filter_input(INPUT_POST, 'message');
    if($_POST['flexRadioDefault'] == 'all') {
        $emails = array();
        $statement = $pdo->prepare("SELECT * FROM users");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $data) {
            $emails[] = $data['email'];
        }
        sendEmail($emails, $title, $message, $key);
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        sendEmail(array($email), $title, $message, $key);
    }
}

$dateRange = array(
    gmdate('Y-m-d') . ' 00:00:00 GMT',
    gmdate('Y-m-d') . ' 22:59:59 GMT'
);

$orderCount = $db->query("SELECT count(*) FROM transactions
                WHERE timestamp >= '$dateRange[0]' 
                    AND timestamp <= '$dateRange[1]'")->find()['count(*)'];

$revenue = 0;
$transactions = $db->query("SELECT * FROM transactions WHERE timestamp >=:range1 AND timestamp <= :range2",[
    'range1'=>$dateRange[0],
    'range2'=>$dateRange[1]
])->get();

foreach($transactions as $transaction) {
    $details = unserialize($transaction['details']);
    foreach($details as $detail) {
        $revenue += $detail['price'] * $detail['quantity'];
    }
}

$userCount = $db->query("SELECT count(*) FROM users")->find()['count(*)'];


view('admin/home.view.php',[
    'orderCount'=>$orderCount,
    'revenue'=>$revenue,
    'userCount'=>$userCount,
]);