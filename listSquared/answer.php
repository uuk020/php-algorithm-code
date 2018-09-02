<?php
/**
 * 
 * Divisors of 42 are : 1, 2, 3, 6, 7, 14, 21, 42. These divisors squared are: 1, 4, 9, 36, 49, 196, 441, 1764. The sum of the squared divisors is 2500 which is 50 * 50, a square!

 * Given two integers m, n (1 <= m <= n) we want to find all integers between m and n whose sum of squared divisors is itself a square. 42 is such a number.

 * The result will be an array of arrays or of tuples (in C an array of Pair) or a string, each subarray having two elements, first the number whose squared divisors is a square and then the sum of the squared divisors.

 * #Examples:
 * list_squared(1, 250) --> [[1, 1], [42, 2500], [246, 84100]]
 * list_squared(42, 250) --> [[42, 2500], [246, 84100]]
 *The form of the examples may change according to the language, see Example Tests: for more details.
 */

function listSquared($m, $n) {
    $result = [];
    for (;$m <= $n; $m++) {
        $sum = 0;
        // 低效算法, 循环次数过大
        for ($i = 1; $i <= $m; $i++) {
            // 找出能够整除$m的数
            if ($m % $i == 0) {
                $sum += pow($i, 2);
            }
        }
        // 求平方根
        $sqrt = sqrt($sum);
        if (pow($sqrt, 2) == $sum && $sum % $sqrt == 0) {
            $result[] = [$m, $sum];
        }
    }
    return $result;
}


function listSquared_clever($m, $n) {
    $results = [];
    for ($candidate = $m; $candidate <= $n; $candidate++) {
      $sum = 0;
      // 算出平方根的数, 进行循环(循环次数少)
      for ($divisor = 1; $divisor <= (int)sqrt($candidate); $divisor++) {
        //  找出能够整除sqrt($candidate)的数 也就是除数的.
        if ($candidate % $divisor === 0) {
          $sum += $divisor ** 2;
          /**
           * 排除两个除数相等, 找出$candidate / $divisor的求商, 补齐商数的平方.
           * 如: $candidate = 4时候, 4能够被1,2,4整除. 此时$sum=1*1+2*2; 缺少了4*4.
           */
          if ($candidate / $divisor !== $divisor) {
            $sum += ($candidate / $divisor) ** 2;
          }
        }
      }
      $square = sqrt($sum);
    
      if (filter_var($square, FILTER_VALIDATE_INT)) {
        $results[] = [$candidate, $sum];
      }
    }
    
    return $results;
}