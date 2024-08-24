<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $total = 0;
        $res = $nums[0];

        foreach ($nums as $n) {
            if ($total < 0) {
                $total = 0;
            }
            $total += $n;
            $res = max($res, $total);
        }
        return $res;
    }
}
