<?php

class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $left = 0;
        $right = $n;

        while ($left < $right) {
            $middle = floor(($left + $right) / 2);
            if($this->isBadVersion($middle)){
                $right = $middle;
            } else {
                $left = $middle + 1;
            }
        }
        return $left;
    }
}