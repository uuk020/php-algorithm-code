<?php
/*
 * 用字母表数字替换字符串的字母
 * In this kata you are required to, given a string, replace every letter with its position in the alphabet.
 * If anything in the text isn't a letter, ignore it and don't return it.
 * As an example:
   alphabet_position('The sunset sets at twelve o\' clock.');
   Should return "20 8 5 19 21 14 19 5 20 19 5 20 19 1 20 20 23 5 12 22 5 15 3 12 15 3 11" as a string.
 */
function alphabet_position(string $s): string
{
    // 字母表数组
    $letterArr = [1 => 'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    // 将参数$s全部小写, 转换为目标数组
    $targetArr = str_split(strtolower($s));
    $result    = '';
    // 循环目标数组
    foreach ($targetArr as $value) {
        // 循环字母表数组
        foreach ($letterArr as $k=>$v) {
            // 比较两个数组中值,若相等, 取出字母表数组中键
            if ($value == $v) {
                $result .= $k.' ';
            }
        }
    }
    // 去除右边空格.
    return rtrim($result);
}

function alphabet_position_clever(string $s): string
{
    $value = '';
    // 根据正则表达式排除非字符的字符串, 转换为目标数组, 并循环
    foreach(str_split(preg_replace('/[^a-z]/i', '', $s)) as $letter) {
        // 求每个大写英文字符 ASCII 码值.
        // A在ASCII表是第65,依次排序25个字母,所以要减去64得到26个字母表正确数字
        // https://baike.baidu.com/pic/ASCII/309296/0/c2fdfc039245d688c56332adacc27d1ed21b2451?fr=lemma&ct=single#aid=0&pic=c2fdfc039245d688c56332adacc27d1ed21b2451
        $letterToNumber = ord(strtoupper($letter)) - 64;
        // 拼接字符串
        $value .= " {$letterToNumber}";
    }
    return trim($value);
}