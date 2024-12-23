<?php
if (isset($_SESSION['users']) && count($_SESSION['users']) > 0) {
    echo "<div class='container mt-4'>";
    echo "<div class='row'>"; 

    // form bảng
    echo "<div class='col-md-8'>"; 

    echo "<div class='col-md-12'>"; 
    echo "<h3 class='text-primary mb-3'>Danh sách khách hàng</h3>";
    echo "<div class='col-md-12 mb-3 d-flex justify-content-between'>"; 
    echo "<input type='text' id='searchBox' class='form-control w-100' placeholder='Tìm kiếm khách hàng (tên, email, số điện thoại)...'>";
    echo "</div>";
    echo "<div class='table-responsive' style='max-height: 400px;'>";
    echo "<table class='table table-bordered table-hover table-striped table-sm shadow-sm'>"; 

    echo "<thead class='bg-primary text-white'>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>Họ tên</th>
                <th class='text-center'>Email</th>
                <th class='text-center'>Điện thoại</th>
                <th class='text-center'>Địa chỉ</th>
                <th class='text-center'>Giới tính</th>
            </tr>
        </thead>";
    echo "<tbody id='userTableBody'>";

    // list KH
    
    foreach ($_SESSION['users'] as $user) {
        echo "<tr class='user-row' data-id='" . htmlspecialchars($user['id']) . "'>
                <td class='text-center'>" . htmlspecialchars($user['id']) . "</td>
                <td class='text-center'>" . htmlspecialchars($user['name']) . "</td>
                <td class='text-center'>" . htmlspecialchars($user['email']) . "</td>
                <td class='text-center'>" . htmlspecialchars($user['mobile']) . "</td>
                <td class='text-center'>" . htmlspecialchars($user['address']) . "</td>
                <td class='text-center'>" . htmlspecialchars($user['gender']) . "</td>
            </tr>";
    }

    echo "</tbody></table>";
    echo "</div>"; 
    echo "</div>";  
    echo "</div>"; 

    // Form bên phải
    echo "<div class='col-md-4'>";
    echo "<h3 class='text-primary mb-3'>Thông tin</h3>";

    echo "<form id='userForm' method='POST' action='../controller/UsersController.php'>
        <div class='mb-3'>
            <label for='id' class='form-label'>ID Khách hàng</label>
            <input type='text' class='form-control' id='id' name='id' placeholder='ID khách hàng' readonly 
                style='background-color: #343a40; color: #fff; border: 1px solid #6c757d;'>
        </div>

        <div class='mb-3'>
            <label for='name' class='form-label'>Họ tên</label>
            <input type='text' class='form-control' id='name' name='name' placeholder='Nhập họ tên'>
        </div>
        <div class='mb-3'>
            <label for='email' class='form-label'>Email</label>
            <input type='email' class='form-control' id='email' name='email' placeholder='Nhập email'>
        </div>
        <div class='mb-3'>
            <label for='phone' class='form-label'>Số điện thoại</label>
            <input type='text' class='form-control' id='phone' name='phone' placeholder='Nhập số điện thoại'>
        </div>
        <div class='mb-3'>
            <label for='address' class='form-label'>Địa chỉ</label>
            <input type='text' class='form-control' id='address' name='address' placeholder='Nhập địa chỉ'>
        </div>
        <div class='mb-3'>
            <label for='gender' class='form-label'>Giới tính</label>
            <input type='text' class='form-control' id='gender' name='gender' placeholder='Chọn giới tính'>
        </div>
        </div>";

    echo "<div class='d-flex justify-content-between'>
            <button type='submit' class='btn btn-success' id='addButton'>Thêm khách hàng</button>
            <button type='button' id='editButton' class='btn btn-warning' disabled>Sửa thông tin</button>
            <button type='button' id='deleteButton' class='btn btn-danger' disabled>Xóa khách hàng</button>
          </div>";
          
    echo "<input type='hidden' id='action' name='action' value=''>";

    echo "</form>";
    echo "</div>";

    echo "</div>";  
    echo "</div>";
} else {
    echo "<div class='container mt-4'>";
    echo "<p class='alert alert-warning text-center'>Không có người dùng nào trong hệ thống.</p>";
    echo "</div>";
}
?>
