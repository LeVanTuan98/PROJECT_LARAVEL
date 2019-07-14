<?php

/*
 * Chuỗi Fibonacy:
 * F(n) =  | 0  , n = 0
 *         | 1  , n = 1
 *         | F(n - 1) + F( n - 2)  , n > 1
 */

function Fibonacy($n){
    if ($n == 0) {return 0;}
    else if ($n == 1) { return 1;}
    else {
        return Fibonacy($n - 1) + Fibonacy($n - 2);
    }
}

echo " Dãy Fibonacy: <br>";
for( $i = 0; $i < 10; $i++) {
    echo Fibonacy($i)." ,";
}


/*
 * In ra 1 tam giác bắt đầu từ 1* đến 100*
 */

function printStar($n) {
    for ( $i = 1; $i <= $n; $i++){
        echo "<br> Dòng thứ $i:    ".str_repeat('*',$i);
    }
}

printStar(100);

/*
 * Sử dụng đệ quy
 */

function printStarRecursive($n,$i){
    echo "<br> Dòng thứ $i:    ".str_repeat('*',$i);
    if($i < $n){
        $i++;
        printStarRecursive($n,$i);
    }
}

printStarRecursive(100,1);


function printStarRecursiveReverse($n,$i){
    echo "<br> Dòng thứ $i:    ".str_repeat('*',$i);
    if($i > 0){
        $i--;
        printStarRecursiveReverse($n,$i);
    }
}

printStarRecursiveReverse(100,100);