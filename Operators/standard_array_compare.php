<?php
/**
 *
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/8/15
 * Time: 9:40
 *
 */

/**
 * 标准数组 比较
 * @param array $op1
 * @param array $op2
 * @return number
 */
function standard_array_compare($op1, $op2) {
    if (count($op1) > count($op2)) {
        return 1;       // $op1 > $op2
    } elseif (count($op1) < count($op2)) {
        return -1;
    }

    foreach ($op1 as $key => $val) {
        if (!array_key_exists($key, $op2)) {
            return null;    // uncomparable
        } elseif ($val > $op2[$key]) {
            return 1;
        } elseif ($val < $op2[$key]) {
            return -1;
        }
    }
    return 0;
}

var_dump(standard_array_compare(['1', 2, '3'], ['1', '02', '3']));

echo "1" <=> 1; // -1