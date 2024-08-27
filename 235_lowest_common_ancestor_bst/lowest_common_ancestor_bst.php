# Definition for a binary tree node.
from data.tree_node import TreeNode


class Solution:
    def lowestCommonAncestor(self, root: 'TreeNode', p: 'TreeNode', q: 'TreeNode') -> 'TreeNode':
        left_path = self.pre_order(root, p.val)
        right_path = self.pre_order(root, q.val)
        shortest_path = min(len(left_path), len(right_path))
        lca = None
        for i in range(shortest_path):
            if left_path[i] == right_path[i]:
                lca = left_path[i]

        return TreeNode(lca)

    def pre_order(self, root: 'TreeNode', target: int):
        if not root:
            return None

        if root.val == target:
            return [root.val]

        target_path = self.pre_order(root.left, target)
        if not target_path:
            target_path = self.pre_order(root.right, target)

        result = []
        if target_path:
            result = [root.val] + target_path

        return result


# values = [6, 2, 8, 0, 4, 7, 9, None, None, 3, 5]
values = [2, 1]
p = TreeNode(2)
q = TreeNode(1)
root = TreeNode.build_tree_from_list(values)
# TreeNode.print_tree(root)
# p = TreeNode(2)
# q = TreeNode(4)
solution = Solution()
print(solution.lowestCommonAncestor(root, p, q))


class Learn1Solution:
    def lowestCommonAncestor(self, node: 'TreeNode', p: 'TreeNode', q: 'TreeNode') -> 'TreeNode':
        while True:  # Here you don't need to check for node==None because the loop will execute forever but as the 2
            # given nodes are present in the tree we will somehow definitely hit the 1st or 2nd if statement.
            if node.val == p.val or node.val == q.val:  # This is for one of the given nodes==present node
                return node
            if (node.val > p.val and q.val > node.val) or (
                    node.val > q.val and node.val < p.val):  # This is for 2 opposite directions
                return node
            if node.val > p.val and node.val > q.val:  # Both the values will be present on the left side of the
                # present node
                node = node.left
            if p.val > node.val and q.val > node.val:  # Both the values will be present on the right side of the
                # present node
                node = node.right
