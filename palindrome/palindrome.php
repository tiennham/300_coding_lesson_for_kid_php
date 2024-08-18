<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = preg_replace("/[^a-z0-9]+/", "", strtolower($s));
        $str_len = strlen($s);
        $s = str_split($s);

        for ($i = 0, $j = $str_len - 1; $i <= $j; $i++, $j--) {
            if ($s[$i] != $s[$j]) {
                return false;
            }
        }
        return true;
    }
}

$solution = new Solution();
$str_test = "A man, a plan, a canal: Panama";
print_r($solution->isPalindrome($str_test));
