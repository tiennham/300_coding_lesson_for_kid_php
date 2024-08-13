<?php

 class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
         $this->val = $val;
         $this->next = $next;
     }
 }

 class Solution
 {
     function mergeTwoLists($list1, $list2) {
         $head_node = new ListNode(0);
         $ret_node = $head_node;
         while($list1 != null or $list2 != null) {
             if ($list1 != null && $list2 != null){
                 if ($list1->val < $list2->val) {
                     $head_node->next = new ListNode($list1->val);
                     $list1 = $list1->next;
                 } else {
                     $head_node->next = new ListNode($list2->val);
                     $list2 = $list2->next;
                 }
             } elseif ($list1 != null) {
                 $head_node->next = new ListNode($list1->val);
                 $list1 = $list1->next;
             } else {
                 $head_node->next = new ListNode($list2->val);
                 $list2 = $list2->next;
             }

             $head_node = $head_node->next;
         }
         return $ret_node->next;
     }
 }

// l1 = [1, 2, 4]
$l1_node_1 = new ListNode(1);
$l1_node_2 = new ListNode(2);
$l1_node_4 = new ListNode(4);
$l1_node_1->next = $l1_node_2;
$l1_node_2->next = $l1_node_4;

//l2 = [1, 3, 4]
$l2_node_1 = new ListNode(1);
$l2_node_3 = new ListNode(3);
$l2_node_4 = new ListNode(4);
$l2_node_1->next = $l2_node_3;
$l2_node_3->next = $l2_node_4;

$solution = new Solution();
$merged_linkedlist = $solution->mergeTwoLists($l1_node_1, $l2_node_1);

$current_node = $merged_linkedlist;
$list_str = "";
while ($current_node != null){
    $list_str = $list_str . " => " . $current_node->val;
    $current_node = $current_node->next;
}

print_r($list_str);

