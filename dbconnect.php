<?php
// dbconnect.php

function dbConnect() {
    $servername = "127.0.0.1"; 
    $username = "root";        
    $password = "@Csc2322003";  
    $dbname = "shop_system";        
    $port = 3306;            

    // Tạo kết nối
    $con = new mysqli($servername, $username, $password, $dbname, $port);

    // Kiểm tra kết nối
    if ($con->connect_error) {
        die("Kết nối thất bại: " . $con->connect_error);
    }

    // Trả về đối tượng kết nối
    return $con;
}
?>
