<?php

include 'data/tree_node.php';
include 'data/linked_list.php';

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $slow_node = $head;
        $fast_node = $head;
        while($fast_node !== null && $fast_node->next !== null) {
            $slow_node = $slow_node->next;
            $fast_node = $fast_node->next->next;
            if($fast_node === $slow_node) {  // use '==' will be make performance issue
                return true;
            }
        }
        return false;
    }
}


$array = [-1,-7,7,-4,19,6,-9,-5,-2,-555];
$pos = 9;
$linkedList = ListNode::createCycleLinkedListFromArray($array, $pos); // Tạo linked list từ mảng
//print_r("Basic linked list:\n");
//ListNode::printLinkedList($linkedList);

$solution = new Solution();
print_r($solution->hasCycle($linkedList));

