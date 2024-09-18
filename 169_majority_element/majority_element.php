<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        sort($nums);
        return $nums[floor(count($nums)/2)];
    }
}

$num = [3,2,3];
$solution = Solution();
print($solution->majorityElement($num));

