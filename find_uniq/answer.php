<?php
/**
 * There is an array with some numbers. All numbers are equal except for one. Try to find it!
 * findUniq([ 1, 1, 1, 2, 1, 1 ]) === 2
 * findUniq([ 0, 0, 0.55, 0, 0 ]) === 0.55
 *
 * @param array $a
 * @return void
 */
function find_uniq($a) {
    // 排序从小到大
    sort($a);
    // 比较
    return $a[0] === $a[1] ? end($a) : $a[0];
}

