<?php
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        if ($root == null) {
            return true;
        }

        return $this->isSame($root->left, $root->right);
    }

    function isSame(?TreeNode $left, ?TreeNode $right) {
        if ($left == null && $right == null) {
            return true;
        }

        if ($left == null || $right == null) {
            return false;
        }

        if ($left->val != $right->val) {
            return false;
        }

        return $this->isSame($left->left, $right->right) && $this->isSame($left->right, $right->left);
    }


}
