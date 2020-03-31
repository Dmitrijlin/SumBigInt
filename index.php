<?php

/**
 * Функция проверки введённых значений
 * @param $s1
 * @param $s2
 * @throws Exception
 * @return bool
 */
function check($s1, $s2) {
	// Проверка на строки
    if (!is_string($s1) || !is_string($s2)) {
        throw new Exception('Введённые значения не строки!');
    }

    // Смотрим, что в строке только числа
    if (
        !mb_ereg_match('^\d+$', $s1)
        || !mb_ereg_match('^\d+$', $s2)
    ) {
        throw new Exception('В строке должны содержаться только числа!');
    }

    return true;
 }


/**
 * Функция суммирования чисел
 * @param string $s1
 * @param string $s2
 * @return string
 * @throws Exception
 */
function sumBigInt($s1, $s2) {

    try {
        check($s1, $s2);
    } catch (Exception $e) {
        throw $e;
    }

    $len1 = mb_strlen($s1);
    $len2 = mb_strlen($s2);

    // Ищем минимальную длину строки
    if (mb_strlen($s1) > mb_strlen($s2)) {
        $s3 = $s1;
        $s1 = $s2;
        $s2 = $s3;

        $len3 = $len1;
        $len1 = $len2;
        $len2 = $len3;
    }

    $temp = 0;
    $result = '';

    // Проходим минимальную длину строки и складываем числа столбиком
    for ($i = $len1 - 1; $i >= 0; $i--, $len2--) {
        $sum = (int)$s1[$i] + (int)$s2[$len2 - 1] + $temp;
        $temp = 0;

        if ($sum > 9) {
            $temp = 1;
            $sum %= 10;
        }

        $result = $sum . $result;
    }

    // Пока у нас есть остаток, мы добавляем его ко второй строке
    while ($temp == 1) {

        $sum = ($len2 > 0)
            ? (int)$s2[$len2 - 1] + $temp
            : 1;

        $temp = 0;

        if ($sum > 9) {
            $temp = 1;
            $sum %= 10;
        }

        $result = $sum . $result;
        $len2--;
    }

    // Если остались числа, которые не были затронуты, то добавляем их в начало
    if ($len2 > 0) {
        $result = mb_substr($s2,0, $len2) . $result;
    }

    return $result;
}