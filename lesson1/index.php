<?php 
// 1 часть
    $a = 5;
    $b = '05';
    var_dump($a == $b); // Почему true? -- при сравнении без учета типа данных строка "5" равна числу 5, поэтому true
    var_dump((int)'012345'); // Почему 12345? -- при приведении строки к числу первые 0 опускается?
    var_dump((float)123.0 === (int)123.0); // Почему false?  -- разные типы данных
    var_dump((int)0 === (int)'hello, world'); // Почему true? --- при приведении строки к числу строка становится 0, если в начале нет чисел
// 2 часть

    $a = 5;
    $b = 10;
    $a += $b;
    $b = $a - $b;
    $a = $a - $b;
    var_dump($a); 
    var_dump($b);