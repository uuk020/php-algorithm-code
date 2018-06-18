<?php
/**
 * Human readable duration format 转换时间格式
 * Your task in order to complete this Kata is to write a function which formats a duration, given as a number of seconds, in a human-friendly way.
 * The function must accept a non-negative integer. If it is zero, it just returns "now". Otherwise,
 * the duration is expressed as a combination of years, days, hours, minutes and seconds.
 * formatDuration(62)    // returns "1 minute and 2 seconds"
 * formatDuration(3662)  // returns "1 hour, 1 minute and 2 seconds"
 */
function format_duration($seconds)
{
  //排除0的情况
  if ($seconds == 0) return 'now';
  // 时间计算数组
  $date = [
      'year' => 60 * 60 * 24 * 365,
      'day' => 60 * 60 * 24,
      'hour' => 60 * 60,
      'minute' => 60,
      'second' => 1
  ];
  $arr = [];
  // 循环时间数组
  foreach ($date as $k => $v) {
       // 计算时间
       $time = floor($seconds / $v);
       // 若$time不等于0 则键加入s
       if ($time != 0) {
           if ($time > 1) {
               $k = $k . 's';
            }
            // $arr 数组新增计算出的字符串元素
           $arr[] = $time . ' ' . $k;
       }
       // 减去计算好时间, 循环再算其他分钟秒
       $seconds = $seconds - $v * $time;
  }
  // 若时间格式数组大于1
  if (count($arr) > 1) {
      // 选取最后一个元素
      $last = array_slice($arr, -1, 1);
      unset($arr[count($arr) - 1]);
      // 拼接字符串
      $secondTime = ' and ' . $last[0];
      // 数组转换为字符串
      return implode(', ', $arr) . $secondTime;
  }
  return implode(', ', $arr);

}