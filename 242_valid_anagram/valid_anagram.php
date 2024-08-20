<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        if (strlen($s) > strlen($t)) {
            return false;
        }
        $count_s = count_chars($s, 0);
        $count_t = count_chars($t, 0);

        for ($i = 0; $i < strlen($s); $i++) {
            if ($count_s[$i] != $count_t[$i]) {
                return false;
            }
        }

        return true;
    }
}