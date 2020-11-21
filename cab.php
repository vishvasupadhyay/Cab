<?php

$arr = array("charbagh"=>0, "indiranagar"=>10,"bbd"=>30, "barabanki"=>60, "faizabad"=>100, "basti"=>150, "gorakhpur"=>210);

$pick = $_POST['pickup'];
$drop = $_POST['drop'];
$cab = $_POST['cab'];
$luggage = $_POST['luggage'];
$myarr = array($pick, $drop, $cab, $luggage);
$pickup_distance;
$drop_distance;
foreach($arr as $key => $value) {
    if($key==$pick){
        $pickup_distance = $arr[$key];
    } else if($key==$drop) {
        $drop_distance = $arr[$key];
    }
}
$final_distance = abs($pickup_distance-$drop_distance);
// $final_distance = abs($fd);
// echo abs($final_distance);

//calculating luggage price

$l_price;
if($luggage<=10 && $luggage > 0){
    $l_price = 50;
} else if($luggage >10 && $luggage <= 20) {
    $l_price = 100;
} else if($luggage > 20) {
    $l_price = 200;
} else {
    $l_price = 0;
}

// fare calculation

$fare = 0;
if($cab=='cedmicro') {
    if($final_distance <=10) {
        $fare = $fare + 50 + $final_distance*13.5;
    } else if($final_distance > 10 && $final_distance <= 60) {
        $rem = $final_distance - 10;
        $fare = $fare + 50 + (10*13.5) + ($rem*12);
    } else if($final_distance > 60 && $final_distance <= 160) {
        $rem = $final_distance - 60;
        $fare = $fare + 50 + (10*13.5) + (50*12) + ($rem*10.20) ;
    } else if($final_distance > 160) {
        $rem = $final_distance - 160;
        $fare = $fare + 50 + (10*13.5) + (50*12) + (100*10.20) + ($rem*8.50);
    }
} else if($cab=='cedmini') {
    if($final_distance <=10) {
        $fare = $fare + 150 + $final_distance*14.5;
    } else if($final_distance > 10 && $final_distance <= 60) {
        $rem = $final_distance - 10;
        $fare = $fare + 150 + (10*14.5) + ($rem*13);
    } else if($final_distance > 60 && $final_distance <= 160) {
        $rem = $final_distance - 60;
        $fare = $fare + 150 + (10*14.5) + (50*13) + ($rem*11.20) ;
    } else if($final_distance > 100) {
        $rem = $final_distance - 160;
        $fare = $fare + 150 + (10*14.5) + (50*13) + (100*11.20) + ($rem*9.50) ;
    }
    $fare = $fare + $l_price;
} else if($cab=='cedroyal') {
    if($final_distance <=10) {
        $fare = $fare + 200 + $final_distance*15.5;
    } else if($final_distance > 10 && $final_distance <= 60) {
        $rem = $final_distance - 10;
        $fare = $fare + 200 + (10*15.5) + ($rem*14);
    } else if($final_distance > 60 && $final_distance <= 160) {
        $rem = $final_distance - 60;
        $fare = $fare + 200 + (10*15.5) + (50*14) + ($rem*12.20) ;
    } else if($final_distance > 100) {
        $rem = $final_distance - 160;
        $fare = $fare + 200 + (10*15.5) + (50*14) + (100*12.20) + ($rem*10.50) ;
    }
    $fare = $fare + $l_price;
} else if($cab=='cedsuv') {
    if($final_distance <=10) {
        $fare = $fare + 250 + $final_distance*16.5;
    } else if($final_distance > 10 && $final_distance <= 60) {
        $rem = $final_distance - 10;
        $fare = $fare + 250 + (10*16.5) + ($rem*15);
    } else if($final_distance > 60 && $final_distance <= 160) {
        $rem = $final_distance - 160;
        $fare = $fare + 250 + (10*16.5) + (50*15) + ($rem*13.20) ;
    } else if($final_distance > 160) {
        $rem = $final_distance - 160;
        $fare = $fare + 250 + (10*16.5) + (50*15) + (100*13.20) + ($rem*11.50) ;
    }
    $fare = $fare + (2*$l_price);
}
echo "<strong>Calculated Fare : ".$fare."</strong>";
?>