<?php
session_start();
session_unset(); // Hủy tất cả session
session_destroy(); // Kết thúc session
header("Location: index.php"); // Quay lại trang chủ
exit();
?>
