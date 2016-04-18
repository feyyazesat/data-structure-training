<?php
/**
  * Question : Find the 1(true) bits count for a given number.
  */

/*
 * Approach          : Loop and bit shift untill given number is 0
 * Time Complexity   : O(W(n))
 * Memory Complexity : O(W(2n))
 */
function num1BitsFirstSolution($number)
{
    if ($number <= 0) {
        return 0;
    }

    $countOf1 = 0;

    do {

        if ($number & 1) {
            ++$countOf1;
        }

    } while ($number = $number >> 1);

    return $countOf1;
}

/*
 * Approach          : Loop and bit shift untill given number is 0  (Identical with the first Solution)
 * Time Complexity   : O(W(n))
 * Memory Complexity : O(W(2n))
 */
function num1BitsSecondSolution($number)
{
    if ($number <= 0) {
        return 0;
    }

    for ($c = 0; $number; $number >>= 1) {
        $c += $number & 1;
    }

    return $c;
}

/*
 * Approach          : Loop untill given number is 0 "and" operation between number and (number - 1) write result to number.
 * Time Complexity   : 1(true) bit counts
 * Memory Complexity : 1(true) bit counts
 */
function num1BitsThirdSolution($number)
{
    if ($number <= 0) {
        return 0;
    }

    for ($c = 0; $number; $c++) {
        $number &= $number - 1;
    }

    return $c;
}

// 4
print_r(num1BitsFirstSolution(45));

// 4
print_r(num1BitsSecondSolution(45));

// 4
print_r(num1BitsThirdSolution(45));


