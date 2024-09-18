<?php

include 'data/tree_node.php';
include 'data/linked_list.php';

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        $memorize = [];
        return $this->climbHelper($n, $memorize);
    }

    function climbHelper($n, &$memorize) {
        if ($n == 0 || $n == 1) {  # Don't really understand case ==1
            return 1;
        }
        $result = in_array($n, $memorize);
        if ($result === false) {
            $memorize[$n] = $this->climbHelper($n - 1, $memorize) + $this->climbHelper($n - 2, $memorize);
        }
        return $memorize[$n];
    }
}


$n = 7;
$solution = new Solution();
print_r($solution->climbStairs($n));

