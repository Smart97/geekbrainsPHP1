<?php
//1
function matematical($a = 1, $b = 5)
{
    if ($a >= 0 && $b >= 0) {
        return $a - $b;
    } elseif ($a < 0 && $b < 0) {
        return $a * $b;
    } else {
        return $a + $b;
    }
}


//2

$c = rand(0, 15);
switch ($c) {
    case 0:
        echo $c++;
    case 1:
        echo $c++;
    case 2:
        echo $c++;
    case 3:
        echo $c++;
    case 4:
        echo $c++;
    case 5:
        echo $c++;
    case 6:
        echo $c++;
    case 7:
        echo $c++;
    case 8:
        echo $c++;
    case 9:
        echo $c++;
    case 10:
        echo $c++;
    case 11:
        echo $c++;
    case 12:
        echo $c++;
    case 13:
        echo $c++;
    case 14:
        echo $c++;
    case 15:
        echo $c;
}

//3

function summ($a, $b)
{
    return $a + $b;
}
function diff($a, $b)
{
    return $a - $b;
}
function multi($a, $b)
{
    return $a * $b;
}
function div($a, $b)
{
    return $a / $b;
}

//4

function matematical2($arg1 = 1, $arg2 = 2, $opetarion = '+')
{
    switch ($opetarion) {
        case "+":
            return summ($arg1, $arg2);
        case "-":
            return diff($arg1, $arg2);
        case "*":
            return multi($arg1, $arg2);
        case "/":
            return div($arg1, $arg2);
        default: 
            return 'Ошибка';
    }
}

//5

function power($val, $pow) {
    if($pow > 0) {
       return $val * power($val, $pow - 1);
    } else {
       return 1;
    }

}

//6

function correctDate() {
    $hour = date('h');
    $minute = date('m');
    $second = date('s');
    $hourEnding = hourEndingCheck($hour);
    $minuteEnding = minuteAndSecondEndingCheck($minute);
    $secondEnding = minuteAndSecondEndingCheck($second);



    return "$hour час$hourEnding $minute минут$minuteEnding $second секунд$secondEnding";
}


function hourEndingCheck($hour) {
    if($hour == 00 || ($hour >= 5 && $hour <= 20 )) {
        return 'ов';
    } elseif ($hour == 01 || $hour == 21) {
        return 'а';
    } else {
        return '';
    }
}


function minuteAndSecondEndingCheck($time) {
    if((($time - 2) % 10 == 0 || ($time - 3) % 10 == 0 || ($time - 4) % 10 == 0) && ($time != 12 && $time != 13 && $time != 14 )) {   //проверка на все что заканчивается на 2,3,4 кроме промежутка 12-14 (22, 54)
        return 'ы';
    } elseif (($time - 1) % 10 == 0 && $time != 11) {                                                                                                //все что кончается на 1 (51,21)
        return 'а';
    } else {
        return '';
    }
}

echo '<br>';
echo correctDate();