<?php
/*
 * 循环某个范围的数,算出每个数的平方,根据第二个参数中数字,看该数字在得出结果出现几次
*/
function nbDig($n, $d)
{
    // your code
    $str = '';
    for ($i = 0; $i <= $n; $i++) {
        // 计算数字后拼接字符串
        $str .= (string)pow($i, 2);
    }
    // substr_count计算字串出现的次数
    $count = substr_count($str, (string)$d);
    return $count;
}
/**
 * Take an integer n (n >= 0) and a digit d (0 <= d <= 9) as an integer. Square all numbers k (0 <= k <= n) between 0 and n.
 * Count the numbers of digits d used in the writing of all the k**2. Call nb_dig (or nbDig or ...)
 * the function taking n and d as parameters and returning this count.
 * n = 10, d = 1, the k*k are 0, 1, 4, 9, 16, 25, 36, 49, 64, 81, 100
 * We are using the digit 1 in 1, 16, 81, 100. The total count is then 4.
 */