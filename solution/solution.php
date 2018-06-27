<?php
/**
 * [solution description] 转化为罗马数字
 * @param    [type] $roman [description]
 * @return   [type] [description]
 */
function solution ($roman) {
  $number = 0;
  $symbolArr = [
      'I' => 1,
      'V' => 5,
      'X' => 10,
      'L' => 50,
      'C' => 100,
      'D' => 500,
      'M' => 1000,
  ];
  // 循环字符串
  for ($i = 0; $i < strlen($roman); $i++) {
       // 对应字符串的字符在罗马数组的值
       $value = $symbolArr[$roman[$i]];
       // 若$i 等于 该字符串的最后一个或者 $i后一个的值小于当前的值则相加
       if ($i == strlen($roman) - 1 || $symbolArr[$roman[$i + 1]] <= $value) {
            $number += $value;
       } else { // 否则减去 排除如 CD, XC这种情况
            $number -= $value;
       }

  }
  return $number;
}

function solution_clever ($roman) {
  $number = 0;
  $numerals = array("CM" => 900, "M" => 1000, "CD" => 400, "D" => 500, "XC" => 90, "C" => 100, "XL" => 40, "L" => 50, "IX" => 9, "X" => 10, "IV" => 4, "V" => 5, "I" => 1);

  foreach ($numerals as $numeral => $value) {
    // 通过str_replace 统计字符串的出现次数
    $roman = str_replace($numeral, "", $roman, $count);
    // 根据次数来计算
    $number += $count * $value;
  }

  return $number;
}