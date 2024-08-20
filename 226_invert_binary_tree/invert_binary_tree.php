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

class Solution
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root)
    {
        if ($root == null) {
            return null;
        }
        $temp_node = $root->left;
        $root->left = $root->right;
        $root->right = $temp_node;

        $this->invertTree($root->left);
        $this->invertTree($root->right);
        return $root;
    }
}