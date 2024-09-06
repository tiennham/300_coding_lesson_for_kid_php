<?php

include 'data/tree_node.php';

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        $result = $this->heightCal($root);
        print_r($result);
        return $result[1];
    }

    function heightCal($root)
    {
        if ($root == null) {
            return [0, true];
        }
        $left_height_balance = $this->heightCal($root->left);
        if ($left_height_balance[1] === false) {
            return [-99, false];
        }
        $right_height_balance = $this->heightCal($root->right);
        if($right_height_balance[1] === false) {
            return [-99, false];
        }

        if (abs($left_height_balance[0] - $right_height_balance[0]) <= 1) {
            return [max([$left_height_balance[0], $right_height_balance[0]]) + 1, true];
        }

        return [-99, false];
    }
}

// $values = [6, 2, 8, 0, 4, 7, 9, null, null, 3, 5];
// $values = [3, 9, 20, null, null, 15, 7];  # true
// $values = [1, 2, 2, 3, 3, null, null, 4, 4] ; # false
 $values = [1, 2, 2, 3, null, null, 3, 4, null, null, 4]; # false
//$values = [1, 2];  # true
$root = TreeNode::build_tree_from_list($values);
TreeNode::print_tree($root);
$solution = new Solution();
print_r($solution->isBalanced($root));


