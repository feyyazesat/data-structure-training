<?php
/*
 * Question will be added.
 */
function findLeastStickerCount($word, array $sticker, $stickerCount = 0)
{
    if ($word == '' || $word == ' ') {
        return $stickerCount;
    }

    $c = substr($word, 0, 1);
    if (array_key_exists($c, $sticker)) {

        --$sticker[$c];
        $count = 0 - $sticker[$c];
        if ($count > $stickerCount) {
            $stickerCount = $count;
        }
    }
    return findLeastStickerCount(substr($word, 1, strlen($word)), $sticker, $stickerCount);
}

$sticker = ['f' => 0, 'a' => 0, 'c' => 0, 'e' => 0, 'b' => 0, 'o' => 1, 'k' => 0];
$word = "coffee kebab";
$stickerCount = findLeastStickerCount($word, $sticker);

echo $stickerCount * 2 . "$";
