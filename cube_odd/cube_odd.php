<?php
/*
 * 循环数组中奇数幂运算
 * 1.Find the sum of the odd numbers within an array, after cubing the initial integers.(注: 数组奇数三次幂相加)
 * This function will return undefined (NULL in PHP) if any of the values aren't numbers.
 */
function cube_odd(array $a)
{
    $sum = 0;
    // 循环数组, 排除非数字的.
    foreach ($a as $v) {
        if (!is_numeric($v)) {
            return null;
        } elseif (0 != $v % 2) { // 筛选出奇数
            $sum += pow($v, 3);
        }
    }
    return $sum;
}