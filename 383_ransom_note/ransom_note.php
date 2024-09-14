<?php

include 'data/tree_node.php';
include 'data/linked_list.php';

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution {

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $find = str_split($magazine);
        foreach (str_split($ransomNote) as $node) {
            $key = array_search($node, $find);
            if ($key === false) {
                return false;
            } else {
                unset($find[$key]);
            }
        }
        return true;
    }
}

$ransomNote = "aa";
$magazine = "ab";
$solution = new Solution();
print_r($solution->canConstruct($ransomNote, $magazine));

