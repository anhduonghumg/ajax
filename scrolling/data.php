<?php

// Test ajax 
// if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//     sleep(4);
// }

// Thiết lập kết quả trả về là html và charset là utf8 để khỏi lỗi font
header('Content-Type: text/html; charset=utf-8');

// Kết nối database
$conn = mysqli_connect('localhost', 'root', '', 'db_test') or die('Không thể kết nối đến CSDL');
mysqli_set_charset($conn, 'utf8');

// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Kiểm tra trang hiện tại có bé hơn 1 hay không
if ($page < 1) {
    $page = 1;
}

// Số record trên một trang
$limit = 40;

// Tìm start
$start = ($limit * $page) - $limit;

// Câu truy vấn
// Trong câu truy vấn này chúng ta sẽ lấy limit tăng lên 1
// Lý do là vì ta không có viết code đếm record nên dựa vào tổng số kết quả trả về để:
// - Nếu kết quả trả về bằng $limit + 1 thì còn phân trang
// - Nếu kết quả trả về bé hơn $limit + 1 thì nghĩa là hết dữ liệu nên ngưng phân trang
$sql = "select * from tb_customer limit $start," . ($limit + 1);

// Thực hiện câu truy vấn
$query = mysqli_query($conn, $sql) or die('Lỗi câu truy vấn');

// Duyệt kết quả rồi đưa vào mảng result
$result = array();
while ($row = mysqli_fetch_array($query)) {
    // Thêm vào result
    array_push($result, $row);
}

// Hiển thị dữ liệu
$total = count($result);
// Bỏ đi kết quả cuối cùng vì kết quả này dùng để check phân trang thôi
// Tuy nhiên chỉ bỏ ở trường hợp ($total > $limit) nếu không ở trang cuối cùng sẽ mất một row
if ($total > $limit) {
    for ($i = 0; $i < $total - 1; $i++) {
        echo '<div class="item">';
        echo $result[$i]['id'] . ' - ' . $result[$i]['name'] . ' - ' . $result[$i]['website'];
        echo '</div>';
    }
} else {
    for ($i = 0; $i < $total; $i++) {
        echo '<div class="item">';
        echo $result[$i]['id'] . ' - ' . $result[$i]['name'] . ' - ' . $result[$i]['website'];
        echo '</div>';
    }
}

if ($total <= $limit) {
    echo '<script language="javascript">stopped = true; </script>';
}
