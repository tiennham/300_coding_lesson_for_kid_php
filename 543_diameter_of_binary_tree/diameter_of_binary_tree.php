from collections import defaultdict, Counter
from typing import Optional, List

from data.linked_list import ListNode
from data.tree_node import TreeNode


class Solution:
    max_diameter = 0

    def diameterOfBinaryTree(self, root: Optional[TreeNode]) -> int:
        self.diameterTree(root)
        return self.max_diameter

    def diameterTree(self, root: Optional[TreeNode]):
        if root is None:
            return 0

        left_height = self.diameterTree(root.left)
        right_height = self.diameterTree(root.right)
        self.max_diameter = max(self.max_diameter, left_height + right_height)
        return max(left_height, right_height) + 1


# values = [1, 2, 3, 4, 5]
values = [4, -7, -3, None, None, -9, -3, 9, -7, -4, None, 6, None, -6, -6, None, None, 0, 6, 5, None, 9, None, None, -1,
          -4, None, None, None, -2]
root = TreeNode.build_tree_from_list(values)
TreeNode.print_tree(root)
solution = Solution()
print(solution.diameterOfBinaryTree(root))

