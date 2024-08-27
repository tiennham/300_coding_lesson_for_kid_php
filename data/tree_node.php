<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val) {
        $this->val = $val;
    }

    static function build_tree_from_list($list)
    {
        if (empty($list)) {
            return null;
        }

        $root = new TreeNode($list[0]);
        $queue = [[$root, 0]];

        while (!empty($queue)) {
            list($node, $i) = array_shift($queue);

            $leftIndex = 2 * $i + 1;
            $rightIndex = 2 * $i + 2;

            if (isset($list[$leftIndex]) && $list[$leftIndex] !== null) {
                $node->left = new TreeNode($list[$leftIndex]);
                $queue[] = [$node->left, $leftIndex];
            }

            if (isset($list[$rightIndex]) && $list[$rightIndex] !== null) {
                $node->right = new TreeNode($list[$rightIndex]);
                $queue[] = [$node->right, $rightIndex];
            }
        }

        return $root;
    }

    static function print_tree($root)
    {
        if ($root === null) {
            return;
        }

        $queue = [[$root, 0]];
        $currentLevel = 0;
        $output = "";

        while (!empty($queue)) {
            list($node, $level) = array_shift($queue);

            if ($level > $currentLevel) {
                $output .= "\n";
                $currentLevel = $level;
            }

            $output .= $node->val . " ";

            if ($node->left !== null) {
                $queue[] = [$node->left, $level + 1];
            }

            if ($node->right !== null) {
                $queue[] = [$node->right, $level + 1];
            }
        }

        echo $output . "\n";
    }
}

