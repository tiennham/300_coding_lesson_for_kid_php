from collections import defaultdict, Counter
from typing import Optional

from data.linked_list import ListNode


class Solution:
    def reverseList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        prev = None
        current = head
        while current:
            temp = current.next
            current.next = prev
            prev = current
            current = temp

        return prev

