// biến kiểm tra dữ liệu ajax nếu đang gửi thì ko đc gửi thêm
var is_busy = false;

// biến lưu trư trang hiện tại
var page = 1;

// Biến lưu trữ trạng thái phân trang
var stopped = false;

$(document).ready(function () {
  $(window).scroll(function () {
    // e append nội dung
    $e = $("#content");

    // e hiển thị loading
    $loading = $("#loading");

    // Nếu đang ở cuối thì thực hiện ajax
    if ($(window).scrollTop() + $(window).height() >= $e.height()) {
      // Nếu đang gửi ajax thì dừng
      if (is_busy == true) {
        return false;
      }

      // nếu hết dữ liệu thì ngưng
      if ($stopped == true) {
        return false;
      }

      // Thiết lập dữ liệu gửi ajax
      is_busy = true;

      // tăng số trang lên +1
      page++;

      // hiển thị dữ liệu
      $loading.removeClass("hidden");

      // gửi ajax
      $.ajax({
        type: "get",
        dataType: "text",
        url: "data.php",
        data: { page: page },
        success: function (result) {
          $element.append(result);
        },
      }).always(function () {
        // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
        $loading.addClass("hidden");
        is_busy = false;
      });
      return false;
    }
  });
});
