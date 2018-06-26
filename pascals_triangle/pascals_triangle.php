<?php
/**
 * pascals_triangle 以数组形式输出杨辉三角
 * Write a function that, given a depth (n), returns a single-dimensional array representing Pascal's Triangle to the n-th level.
 * @param    [type] $n 几项
 * @return   [array]
 */
function pascals_triangle($n)
{
  // Your code here
  $orginArr = [1];
  if ($n == 1) return $orginArr;
  $tmp = $orginArr;
  array_push($orginArr, 1);
  $result = array_merge($tmp, $orginArr);
  if ($n == 2) return $result;
  $row = 2;
  // 循环$n大于2的情况
  while ($row <= $n - 1) {
       $oldArr         = $orginArr;
       $orginArr[$row] = 1;
       $row++;
       for ($i = 1; $i < count($oldArr); $i++) {
            $orginArr[$i] = $oldArr[$i] + $oldArr[$i - 1];
       }
       $result = array_merge($result, $orginArr);
  }
  return $result;
}
// 以数组形式输出杨辉三角 聪明的办法
function pascals_triangle_clever($n)
{
    $pascal = [];
    for ($i = 0; $i < $n; $i++) {
        $num = 1;
        for ($j = 0; $j <= $i; $j++) {
            array_push($pascal, $num);
            $num = $num * ($i - $j) / ($j + 1);
        }
    }
    return $pascal;
}