$(document).ready(function () {
  // Khi người dùng click Đăng ký
  $("#register-btn").click(function () {
    $("#register-btn").attr("disabled", "disabled");
    // Lấy dữ liệu
    var data = {
      username: $("#username").val(),
      password: $("#password").val(),
      email: $("#email").val(),
      fullname: $("#fullname").val(),
    };
    // Gửi ajax
    $.ajax({
      type: "post",
      dataType: "JSON",
      url: "register.php",
      data: data,
      success: function (result) {
        // Có lỗi, tức là key error = 1
        if (result.hasOwnProperty("error") && result.error == "1") {
          var html = "";
          // Lặp qua các key và xử lý nối lỗi
          $.each(result, function (key, item) {
            // Tránh key error ra vì nó là key thông báo trạng thái
            if (key != "error") {
              html += "<li>" + item + "</li>";
            }
          });
          $(".alert-danger").html(html).removeClass("d-none");
          $(".alert-success").addClass("d-none");
        } else {
          // Thành công
          $(".alert-success").html("Đăng ký thành công!").removeClass("d-none");
          $(".alert-danger").addClass("d-none");
          // 4 giay sau sẽ tắt popup
          setTimeout(function () {
            // Ẩn thông báo lỗi
            $("#myModal .close").click();
            $(".alert-danger").addClass("d-none");
            $(".alert-success").addClass("d-none");
          }, 4000);
        }
        $("#register-btn").removeAttr("disabled");
      },
    });
  });

  $("#myModal").on("hidden.bs.modal", function () {
    $(".alert-danger").addClass("d-none");
    $(".alert-success").addClass("d-none");
  });
});
