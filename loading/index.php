<!DOCTYPE html>
<html>

<head>
    <title>Quản lý tiến trình khi gửi ajax</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
</head>

<body>
    <div id="content"></div>
    <div id="loadding" style="display: none; color:red;">Loadding ...</div>
    <button id="clickmetoload" class="">Load Content</button>
    <script language="javascript">
        // Biến kiểm tra
        var ajax_sendding = false;

        $('#clickmetoload').click(function() {
            // Xóa nội dung trong thẻ div content
            // dùng cho trường hợp click lần thứ 2 trở đi
            $('#content').html('');
            $('#clickmetoload').attr('disabled', 'disabled');
            // kiểm tra trạng thái có đang gửi ajax không
            // Nếu đang gửi thì dừng
            // if (ajax_sendding == true) {
            //     $('#clickmetoload').attr('disabled', 'disabled');
            // }

            // Ngược lại thì bắt đầu gửi ajax
            // Nhưng trước hết gán biến ajax_sendding = true để khi người dùng click tiếp 
            // se không có tác dụng
            // ajax_sendding = true;

            // Bật span loaddding lên
            $('#loadding').show();

            // Gửi ajax
            $.ajax({
                url: 'data.php',
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    // Tạo HTML
                    var html = '<table border="1" cellspacing="0" cellpadding="1">';
                    // Vì kết quả trả về dạng JSON nên ta lặp để lấy kết quả
                    $.each(result, function(key, item) {
                        html += '<tr>';
                        html += '<td>' + item['username'] + '</td>';
                        html += '<td>' + item['email'] + '</td>';
                        html += '</tr>';
                    });
                    html += '</table>';

                    // Gán nội dung html vào thẻ content
                    $('#content').html(html);
                    $('#clickmetoload').removeAttr('disabled');
                }
            }).always(function() {
                // ajax_sendding = false;
                $('#loadding').hide();
            });

        });
    </script>
</body>

</html>