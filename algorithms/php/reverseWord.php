<?php

function reverseWord($word)
{
    if ("" == $word) {
        return $word;
    }

    $subword = reverseWord(mb_substr($word, 1, mb_strlen($word)));

    return $subword . mb_substr($word, 0, 1);
}

print_r(reverseWord("feyyazesat"));

