<?php
// checklogin.php
function checkLogin($username, $password) {
    session_start();
    // Kết nối cơ sở dữ liệu
    include_once('dbconnect.php');
    $con = dbConnect();

    // Chuẩn bị câu truy vấn để tìm kiếm tài khoản
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        return "Lỗi kết nối cơ sở dữ liệu: " . $con->error;
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Đóng kết nối trước khi trả về thành công
        $stmt->close();
        $con->close();
        return "success";
    } else {
        $stmt->close();
        $con->close();
        return "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>
