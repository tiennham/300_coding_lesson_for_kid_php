<?php
include 'data/tree_node.php';
include 'data/linked_list.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head) {
        $slow = $head;
        $fast = $head;
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }
}


$values = [1, 2, 3, 4, 5];
$head = ListNode::createLinkedListFromArray($values);
$solution = new Solution();
$middle_node = $solution->middleNode($head);
ListNode::printLinkedList($middle_node);
