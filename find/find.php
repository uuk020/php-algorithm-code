<?php
/**
 * 在奇数数组中找出偶数或者在偶数数组中找出奇数
 * You are given an array (which will have a length of at least 3, but could be very large) containing integers.
 * The array is either entirely comprised of odd integers or entirely comprised of even integers except for a single integer N.
 * Write a method that takes the array as an argument and returns this "outlier" N.
 * [2, 4, 0, 100, 4, 11, 2602, 36] Should return: 11 (the only odd number)
 * [160, 3, 1719, 19, 11, 13, -21] Should return: 160 (the only even number)
 */
function find($integers)
{
    $odd = [];  //偶数数组
    $even = []; // 奇数数组
    foreach ($integers as $value) {
        // 判断元素是否奇偶数
        if (($value & 1)) {
            // 是的入栈偶数数组
            array_push($odd, $value);
        } else {
            array_push($even, $value);
        }
    }
    // 判断偶数数组个数, 等于1, 说明该$integers数组有偶数
    if (count($odd) == 1) {
        return $odd[0];
    }
    if (count($even) == 1) {
        return $even[0];
    }
}