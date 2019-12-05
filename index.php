<?php

if (file_exists(__DIR__."/vendor/autoload.php")) {
    require __DIR__."/vendor/autoload.php";
}

use stolyarov\Log;
use stolyarov\QuadraticEq;
use stolyarov\StolyarovException;

$eq=new QuadraticEq();

$a=0;
$b=0;
$c=0;

try {
    function entercheck($num,$letter)
    {
        $pattern = '#^[0-9]*[.]?[0-9]+$#';
        for (;;) {
            $num=readline("Enter $letter=");
            echo "\n";
            if(preg_match($pattern,$num))
            {
                return $num;
            }
            else {
                echo "Inappropriate symbols. Can only type numbers and dot\n";
            }
        }
        return $num;
    }

    $a=entercheck($a,'a');
    $b=entercheck($b,'b');
    $c=entercheck($c,'c');

    $eq->solve($a,$b,$c);
} catch (StolyarovException $e) {
    Log::log("Error: ".$e->getMessage());
}

Log::write();
