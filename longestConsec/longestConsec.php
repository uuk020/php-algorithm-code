<?php
/*
 * 返回数组中由k个连续字符串组成的第一个最长字符串。
 * You are given an array strarr of strings and an integer k.
 * Your task is to return the first longest string consisting of k consecutive strings taken in the array.
 * Example: longest_consec(["zone", "abigail", "theta", "form", "libe", "zas", "theta", "abigail"], 2) --> "abigailtheta"
 * n being the length of the string array, if n = 0 or k > n or k <= 0 return "".
 *
 */
function longestConsec($strarr, $k)
{
    $longest = '';
    // 减去$k是为了当$i自增到$i-$k时候$j的值不能大于数组长度
    for ($i = 0; $i <= count($strarr) - $k; $i++) {
        $string = '';
        // 循环$k范围, 进行拼接字符串
        for ($j = 0; $j < $k; $j++) {
            // $i+$j的作用是根据$i的值来依次拼接字符串($j次数).
            $string .= $strarr[$i + $j];
        }
        // 比较字符串长度
        if (strlen($string) > strlen($longest)) {
            $longest = $string;
        }
    }

    return $longest;
}