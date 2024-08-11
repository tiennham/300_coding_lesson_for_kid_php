
<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $num_map = array();
        for($i = 0; $i < count($nums); $i++) {
            $first_addend = $nums[$i];
            $second_addend = $target - $first_addend;
            if(array_key_exists($second_addend, $num_map)) {
                return array($num_map[$second_addend], $i);
            }
            $num_map[$nums[$i]] = $i;
        }
    }
}

$nums = [2, 7, 11, 15, 5, 22, 87, 56, -11];
$target = -9;
$solution = new Solution();
print_r($solution->twoSum($nums, $target));
