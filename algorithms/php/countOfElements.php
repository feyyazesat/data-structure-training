<?php

function getSublistSize($length)
{
    $i = 2;
    $n = 0;

    while ($i <= $length) {
        if (is_int($length / $i)) {
            if ($length == $i * ($i + 1) / 2) {
                return ($i + 1);
            }
        }

        ++$i;
    }

    return $n;
}

function findSubstractList(array $list)
{
    $length = count($list);

    $n = getSublistSize($length);
    $nth = $n - 1;

    $substractList = [];
    $substractTotal = array_sum($list) / ($length / 2); // A + B + C + D

    /**
     * formula : A = (list[0] + list[1] - list[nth -1]) / 2
     * list[0] = A + B,
     * list[1] = A + C,
     * list[nth - 1] = B + C
     *
     * =>  ((A + B) + (A + C) - (B + C)) / 2
     * => (A + A + (B + C - B - C)) / 2
     * => (2A + 0) / 2 => 2A / 2
     * => A
     */
    $substractList[] = (($list[0] + $list[1]) - $list[$nth]) / 2;

    for ($i = 0; $i < $nth; ++$i) {
        $substractList[] = ($list[$i] - $substractList[0]);
    }

//    $substractList[3] = $substractTotal - ($list[$nth - 1] + $substractList[0]);


    return $substractList;
}


$list = [4, 5, 10, 7, 12, 13];

print_r(findSubstractList($list));

/**
 * P ) [6, 11, 101, 15, 105, 110];
 * S ) [1, 5, 10, 100]
 *
 * P ) [5, 8, 14, 28, 40, 11, 17, 31, 43, 20, 34, 46, 40, 52, 66];
 * S ) [1, 4, 7, 13, 27, 39]
 *
*/
