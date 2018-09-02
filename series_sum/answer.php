<?php
/**
 * 规律计算题
 * Your task is to write a function which returns the sum of following series upto nth term(parameter).
 * Series: 1 + 1/4 + 1/7 + 1/10 + 1/13 + 1/16 +...
 * You need to round the answer to 2 decimal places and return it as String.
 * If the given value is 0 then it should return 0.00
 * You will only be given Natural Numbers as arguments.
 */
function series_sum($n)
{
  // Your code here
  $offset = 1;
  if (!is_int($n)) {
      return '$n is not int';
  }
  if ($n === 0) {
      return 0.00;
  }
  for ($i = 0; $i < $n; $i++) {
      $sum += 1 / $offset;
      // 规律: 4 7 10..每次除于的数都是上个数+3
      $offset += 3;
  }
  return round($sum, 2);
}

function series_sum_clever($n)
{
  $sum = 0;
  for($i=0; $i<$n; $i++) {
    //结合循环$i 计算每次要除于的数.为$i的值*3+1得出
     $sum += 1/(1+3*$i);
  }
  return round($sum,2);
}