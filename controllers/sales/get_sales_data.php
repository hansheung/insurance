<?php
require_once '../connection.php';

$query = "SELECT start_date, SUM(total) AS total_sales FROM `user_policies` GROUP BY start_date;";

$results = mysqli_query($cn, $query);
$rows = mysqli_fetch_all($results, MYSQLI_ASSOC);

$labels = [];
$sales = [];

foreach($rows as $row){
    $labels[] = $row['start_date'];
    $total_sales[] = $row['total_sales'];
};


$data = [
    "labels" => $labels,
    "datasets" => [
        [
            "label" => "Digital Goods",
            "backgroundColor" => "rgba(60,141,188,0.9)",
            "borderColor" => "rgba(60,141,188,0.8)",
            "pointRadius" => false,
            "pointColor" => "#3b8bba",
            "pointStrokeColor" => "rgba(60,141,188,1)",
            "pointHighlightFill" => "#fff",
            "pointHighlightStroke" => "rgba(60,141,188,1)",
            "data" => $total_sales
        ]
        
    ]
];

header('Content-Type: application/json');
echo json_encode($data);