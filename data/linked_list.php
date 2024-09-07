<?php

// Định nghĩa lớp ListNode cho một nút của linked list

class ListNode
{
    public $val = 0;    // Giá trị của nút
    public $next = null;   // Tham chiếu đến nút tiếp theo

    public function __construct($val = 0)
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
    static function printLinkedList($head, $limit = 20)
    {
        $current = $head; // Bắt đầu từ nút đầu tiên
        $output = [];
        $count = 0;

        // Duyệt qua tất cả các nút cho đến khi hết linked list
        while ($current !== null && $count <= $limit) {
            $output[] = $current->val; // Lưu giá trị của nút hiện tại vào mảng kết quả
            $current = $current->next; // Di chuyển con trỏ đến nút tiếp theo
            $count++;
        }

        echo implode(' -> ', $output) . "\n"; // In ra linked list dưới dạng chuỗi với các giá trị cách nhau bởi ' -> '
    }

    static function createCycleLinkedListFromArray($array, $pos){
        $array_length = count($array);
        if (
            empty($array) ||
            $pos > count($array)
        ) {
            print_r("Cannot create linked list array\n");
            return null;  // Nếu mảng rỗng, trả về null
        }

        $head = new ListNode($array[0]); // Tạo nút đầu tiên của linked list
        $current = $head; // Con trỏ hiện tại bắt đầu từ nút đầu tiên
        $pos_node = $head;
        $last_node = null;
        // Duyệt qua mảng từ phần tử thứ hai để tạo các nút tiếp theo
        for ($i = 1; $i < $array_length; $i++) {
            $current->next = new ListNode($array[$i]); // Tạo nút tiếp theo
            $current = $current->next; // Di chuyển con trỏ đến nút mới tạo
            if($i == $pos) {
                print_r("i == pos: ".$i."\n\r");
                $pos_node = $current;
            }
            if ($i == $array_length - 1) {
                $last_node = $current;
            }
        }

        $last_node->next = $pos_node;
        return $head; // Trả về nút đầu tiên của linked list
    }

}

// Ví dụ sử dụng
//$array = [1, 2, 3, 4, 5]; // Mảng đầu vào
//$linkedList = createLinkedListFromArray($array); // Tạo linked list từ mảng
//printLinkedList($linkedList); // In ra linked list


