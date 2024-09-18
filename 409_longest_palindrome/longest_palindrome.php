<?php

include 'data/tree_node.php';
include 'data/linked_list.php';

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $arr = str_split($s);
        $palindrome_len = 0;
        $odd_palindrome = [];
        foreach ($arr as $c) {
            $key = array_search($c, $odd_palindrome);
            if ($key !== false) {
                unset($odd_palindrome[$key]);
                $palindrome_len += 2;
            } else {
                $odd_palindrome[] = $c;
            }
        }
        if (count($odd_palindrome) > 0) {
            $palindrome_len += 1;
        }
        return $palindrome_len;
    }
}


$n = "abccccdd";
$solution = new Solution();
print_r($solution->longestPalindrome($n));

