<?php

// Định nghĩa lớp ListNode cho một nút của linked list

class ListNode
{
    public $val = 0;    // Giá trị của nút
    public $next = null;   // Tham chiếu đến nút tiếp theo

    public function __construct($val)
    {
        $this->val = $val;
    }


// Hàm để tạo linked list từ mảng cho trước
    static function createLinkedListFromArray($array)
    {
        if (empty($array)) return null;  // Nếu mảng rỗng, trả về null

        $head = new ListNode($array[0]); // Tạo nút đầu tiên của linked list
        $current = $head; // Con trỏ hiện tại bắt đầu từ nút đầu tiên

        // Duyệt qua mảng từ phần tử thứ hai để tạo các nút tiếp theo
        for ($i = 1; $i < count($array); $i++) {
            $current->next = new ListNode($array[$i]); // Tạo nút tiếp theo
            $current = $current->next; // Di chuyển con trỏ đến nút mới tạo
        }

        return $head; // Trả về nút đầu tiên của linked list
    }

// Hàm để in ra linked list
    static function printLinkedList($head)
    {
        $current = $head; // Bắt đầu từ nút đầu tiên
        $output = [];

        // Duyệt qua tất cả các nút cho đến khi hết linked list
        while ($current !== null) {
            $output[] = $current->val; // Lưu giá trị của nút hiện tại vào mảng kết quả
            $current = $current->next; // Di chuyển con trỏ đến nút tiếp theo
        }

        echo implode(' -> ', $output) . "\n"; // In ra linked list dưới dạng chuỗi với các giá trị cách nhau bởi ' -> '
    }
}

// Ví dụ sử dụng
//$array = [1, 2, 3, 4, 5]; // Mảng đầu vào
//$linkedList = createLinkedListFromArray($array); // Tạo linked list từ mảng
//printLinkedList($linkedList); // In ra linked list


