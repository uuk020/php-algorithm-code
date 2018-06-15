<?php
/**
 * 13的可分性规则
 * When you divide the successive powers of 10 by 13 you get the following remainders of the integer divisions:1, 10, 9, 12, 3, 4.
 * Then the whole pattern repeats.
 * Hence the following method: Multiply the right most digit of the number with the left most number in the sequence shown above,
 * the second right most digit to the second left most digit of the number in the sequence. The cycle goes on and you sum all these products.
 * Repeat this process until the sequence of sums is stationary.
 * Example: What is the remainder when 1234567 is divided by 13?
 * 7×1 + 6×10 + 5×9 + 4×12 + 3×3 + 2×4 + 1×1 = 178
 * We repeat the process with 178:
 * 8x1 + 7x10 + 1x9 = 87 and again with 87: 7x1 + 8x10 = 87
 */
function thirt($n) {
    $sequence = [1,10,9,12,3,4];
    $sum = 0;
    // 将字符串转换为数组, 再把数组相反
    $arr = array_reverse(str_split($n));
    // 循环数组
    for ($i = 0; $i < count($arr); $i++) {
      // 通过余数来循环出$sequence数组的值 因为$sequence有6个所以除于6求余数.
      $sum += $arr[$i] * $sequence[$i % 6];
    }
    // 判断$n 是否等于$sum, 第一次是不想等, 递归调用 thirt函数, 此时形参$n等于$sum.
    return ($n === $sum) ? $n : thirt($sum);
}