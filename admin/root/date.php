<?php
require '../root/connect.php';
$sql_daily_revenue = "select sum(orders.total_price) as total_price, DAY(orders.created_at) AS day, month(orders.created_at) AS month from orders group BY DAY(orders.created_at), month";
$result_daily_revenue = mysqli_query($connect, $sql_daily_revenue);

$arr_daily_revenue = [];

$sql_daily_revenue = "select sum(orders.total_price) as total_price, DAY(orders.created_at) AS day, month(orders.created_at) AS month from orders group BY DAY(orders.created_at), month";
    $result_daily_revenue = mysqli_query($connect, $sql_daily_revenue);

    $arr_daily_revenue = [];

    for ($i = 1; $i <= 12; $i++) {
        for ($j=1; $j <= cal_days_in_month(1, $i, date('Y')); $j++) { 
            if (empty($arr_daily_revenue[$i])) {
                $arr_daily_revenue[$i] = [
                    'name' => $i,
                    'id' => $i,
                ];
            }
            $arr_daily_revenue[$i]['data'][$j] = [
                $j, 0
            ];    
        }
    }

    
    foreach($result_daily_revenue as $daily_revenue) {
        $arr_daily_revenue[$daily_revenue['month']]['data'][$daily_revenue['day']] = [
            (int) $daily_revenue['day'], (int) $daily_revenue['total_price']
        ];
    }
    
    $dailyRevenueValue = array_values($arr_daily_revenue);
    $length = count($dailyRevenueValue);
    for ($i=0; $i < 12; $i++) { 
        $dailyRevenueValue[$i]['data'] = array_values($dailyRevenueValue[$i]['data']);
        
    }
    echo json_encode($dailyRevenueValue);
    
    die();