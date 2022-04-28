<?php

//1

$a = 0;
while ($a <= 100) {
    if ($a % 3 == 0) {
        echo "$a, ";
    }
    $a++;
}

//2

echo "<hr>";
$b = 0;
do {
    if ($b == 0) {
        echo "$b - это ноль<br>";
    } elseif ($b % 2 == 0) {
        echo "$b - четное число<br>";
    } else {
        echo "$b - нечетное число<br>";
    }
    $b++;
} while ($b <= 10);

//3

echo "<hr>";
$sitiesArray = ['Московская область' => ['Москва', 'Зеленоград', 'Клин'], 'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'], 'Рязанская область' => ['Рязань', 'Касимов', 'Скопин', 'Сасово']];
foreach ($sitiesArray as $state => $sity) {
    echo "$state: " . implode(', ', $sity) . '<br>';
}

//4-5, 9

echo "<hr>";
//производит транслитерацию, включая замену пробелов на _, выводит все в нижнем регистре, чтобы исправить нужно в массив добавить символы в верхнем регистре
function transliteration($string)
{
    if (is_string($string)) {
        $alphabet = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'yi', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'a', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'ъ' => '\'', 'ь' => '\'', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ' ' => '_'];
        return strtr(mb_convert_case($string, MB_CASE_LOWER, "UTF8"), $alphabet);
    } else {
        return '$string не строка';
    }
}
echo transliteration('Дима Лядский Александрович');

//7
echo "<hr>";
for($i = 0; $i < 10; print($i++)) {

}

//8
echo "<hr>";
foreach ($sitiesArray as $state => $sity) {
    $filteredSity = [];
    foreach($sity as $item) {
        if(strstr($item, 'К')) {
            array_push($filteredSity, $item);
        }
    }
    echo "$state: " . implode(', ', $filteredSity) . '<br>';
}