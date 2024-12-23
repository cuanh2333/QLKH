<!-- layout/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web của Bạn</title>

    <!-- Thêm Bootstrap CSS từ CDN -->
    <link href="public\bootstrap\bootstrap-5.3.3-dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0I2F3bNHT3vqfzt5g5zwQlm8mQs5hft4Pp3M8g18lmJ5z0w7" crossorigin="anonymous">
    <link rel="stylesheet" href="public\css\style.css"> <!-- Thêm CSS tùy chỉnh nếu cần -->

    <style>
        /* Thay đổi màu nền của header thành màu đen */
        .header_logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #000;  /* Màu nền đen */
            color: white;  /* Màu chữ sáng cho header */
        }

        /* Logo */
        .navbar_logo img {
            max-width: 150px;
        }

        /* Nút Đăng nhập */
        .open-modal-btn {
            padding: 8px 20px;
            background-color: #007bff;  /* Màu nền nút */
            color: white;  /* Màu chữ nút */
            border-radius: 5px;
            cursor: pointer;
        }

        /* Modal */
        .modal-content {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        /* Close button for modal */
        .close {
            font-size: 24px;
            color: #aaa;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header_logo container-fluid">
            <!-- Logo -->
            <div class="navbar_logo">
                <a class="navbar-brand" href="#">
                    <img src="./bootstrap-BTL-Web-PTIT/assets/images/cong-thong-tin-dao-tao.png" alt="PTIT" />
                </a>
            </div>

            <!-- Nút Đăng Nhập -->
            <div class="open-modal-btn" onclick="openModal()">Đăng Nhập</div>

            <!-- Modal -->
            <div class="modal" id="loginModal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h5>Học viện Công nghệ Bưu chính Viễn thông</h5>
                    <form id="login_form" action="member.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                        <input type="submit" name="submit" value="Đăng nhập" class="btn"><br>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Thêm các thư viện JS từ CDN của Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy6vQ5pS/xXvoRntg5n7ggg4vVEKuw0Wb7ay4lkf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0I2F3bNHT3vqfzt5g5zwQlm8mQs5hft4Pp3M8g18lmJ5z0w7" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0I2F3bNHT3vqfzt5g5zwQlm8mQs5hft4Pp3M8g18lmJ5z0w7" crossorigin="anonymous"></script>

    <script>
        // Hàm mở modal
        function openModal() {
            document.getElementById("loginModal").style.display = "block";
        }

        // Hàm đóng modal
        function closeModal() {
            document.getElementById("loginModal").style.display = "none";
        }
    </script>

</body>
</html>
