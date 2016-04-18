<?php
/*
 * Arrays are already dynamic in php.
 * So there is no chance to create static arrays as like in the static languages.
 * This is just a training of a dynamic array implementation.
 */

function add(array &$array, $value, $index = 0)
{
    global $size;

    $inputSize = count($array);

    if ($inputSize >= $size) {
        resize($array);
    }

    $array[$index] = $value;

    return ++$index;
}


function resize(array &$array)
{
    global $size;

    $inputSize = count($array);
    $newSize   = $inputSize * 2;

    $newArray  = array_fill(0, $newSize, null);

    for ($i = 0; $i < $newSize; ++$i) {
        if ($i >= $size) {
            $newArray[$i] = null;
            continue;
        }

        $newArray[$i] = $array[$i];
    }

    $array = $newArray;
}


function delete(array &$array, $index)
{
    $inputSize = count($array);
    if ($inputSize < $index || $index < 0) {
        exit('Index is out of range');
    }

    $newArray = [];
    foreach ($array as $key => $val) {

        if ($key == $index) {
            continue;
        }

        $newArray[$key] = $val;
    }

    $array = $newArray;
}



/*
 * Examples
 */

$size = 5;
$array = array_fill(0, $size, null); // int array[5];

$index = add($array, 1, 0);

print_r($array);
