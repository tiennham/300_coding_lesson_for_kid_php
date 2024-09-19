<?php
include 'data/tree_node.php';
include 'data/linked_list.php';


class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $zero_length = abs(strlen($a) - strlen($b));
        $arr_a = str_split($a);
        $arr_b = str_split($b);
        if(strlen($a) < strlen($b)) {
            for ($i = 0; $i < $zero_length; $i++) {
                array_unshift($arr_a, "0");
            }
        } else {
            for ($i = 0; $i < $zero_length; $i++) {
                array_unshift($arr_b, "0");
            }
        }

        $carry = "0";
        $result = "";
        for ($i = count($arr_a) - 1; $i >= 0; $i--) {
            if ($arr_a[$i] == $arr_b[$i]) {
                $result = $carry . $result;
                if($arr_a[$i] == "0") {
                    $carry = "0";
                } else {
                    $carry = "1";
                }
            } else {
                if($carry == "0") {
                    $result = "1" . $result;
                } else {
                    $result = "0" . $result;
                }
            }
        }

        if($carry == "1"){
            $result = "1" . $result;
        }
        return $result;
    }
}

$a = "1010";
$b = "1011";
$solution = new Solution();
print($solution->addBinary($a, $b));
