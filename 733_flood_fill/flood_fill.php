<?php
class Solution {

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color) {
        $num_rows = count($image);
        $num_cols = count($image[0]);
        $replacement = $color;
        $target = $image[$sr][$sc];
        if ($target == $replacement){
            return $image;
        }
        $queue = [[$sr, $sc]];
        while (count($queue)) {
            $r_c = array_pop($queue);
            $r = $r_c[0];
            $c = $r_c[1];
            $cell_val = $image[$r][$c];
            if (0 <= $r && $r < $num_rows && 0 <= $c && $c < $num_cols && $cell_val == $target){
                $image[$r][$c] = $replacement;
                if ($r + 1 < $num_rows){
                    $queue[] = [$r + 1, $c];
                }
                if ($r - 1 >= 0){
                    $queue[] = [$r - 1, $c];
                }
                if ($c + 1 < $num_cols){
                    $queue[] = [$r, $c + 1];
                }
                if ($c - 1 >= 0){
                    $queue[] = [$r, $c - 1];
                }
            }
        }
        return $image;
    }
}

$image = [[1,1,1],[1,1,0],[1,0,1]];
$sr = 1;
$sc = 1;
$color = 2;

$solution = new Solution();
print_r($solution->floodFill($image, $sr, $sc, $color));


