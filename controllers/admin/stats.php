<?php
$days = array();
$orders = array();
$revenue = array();



$now = new DateTime("7 days ago");
$interval = new DateInterval('P1D');
$period = new DatePeriod($now, $interval, 7);
foreach($period as $day) {
    $days[] = $day->format('M d');
}

for ($i=6; $i >= 0 ; $i--){
    $time = time();
    $dateRange = array(
        gmdate('Y-m-d',$time-($i * 24 * 60 * 60)).' 00:00:00 GMT',
        gmdate('Y-m-d', $time - ($i * 24 * 60 * 60)) . ' 22:59:59 GMT',

    );

    $db = \Core\App::resolve(\Core\Database::class);
    $orders[] = $db->query("SELECT * FROM transactions WHERE timestamp >=:range1 AND timestamp <= :range2",[
        'range1'=>$dateRange[0],
        'range2'=>$dateRange[1]
    ])->get();
    $transactions[]= $db->query("SELECT * FROM transactions WHERE timestamp >=:range1 AND timestamp <= :range2",[
        'range1'=>$dateRange[0],
        'range2'=>$dateRange[1]
    ])->get();
    $transactionRevenue = 0;
    foreach ($transactions as $item) {
        $details = unserialize($item['details']);
        foreach ($details as $detail) {
            $transactionRevenue += $detail['price']* $detail['quantity'];
        }
    }
    $revenue[] = $transactionRevenue;
}
echo json_encode(array($days,$orders,$revenue));