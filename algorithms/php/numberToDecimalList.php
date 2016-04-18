<?php
/**
 * Question :
 * Given an array and a number, add it in such a way where array is [0,0,1] and number is 4 output will be [0,0,5]
 * @example
 * array is [1] and number is 9 output will be [1,0]
 *
 * Time Complexity   : N/A
 * Memory Complexity : N/A
 */
function numberToDecimalList(array $list, $number)
{
    $base = 10;

    $i = count($list) - 1;

    // check and validate $list size according to $number size.
    $length = ceil(log10(abs($number) + 1));
    while (($length - $i - 1) != 0) {
        array_unshift($list, 0);
        ++$i;
    }

    // while till to the $number is 0
    while ($units = $number % $base) {

        if (($res = (($units + $list[$i]) % $base)) == 0) {
            $list[$i] = $units;
        } else {
            $list[$i] = $res;
            $number = ($number - $res) / $base;
        }

        if (0 == $i) {
            break;
        }
        --$i;

    }
}

// output
$number = 111245;  // input number
$list = [0, 0, 3]; // input list
print_r(numberToDecimalList($list, $number));

/**
 *   Array
 *   (
 *       [0] => 1
 *       [1] => 1
 *       [2] => 1
 *       [3] => 2
 *       [4] => 3
 *       [5] => 8
 *   )
 *
 */
