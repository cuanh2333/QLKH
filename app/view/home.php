<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}


if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
    unset($_SESSION['message']); 
}

require_once __DIR__ . '/../controller/UsersController.php';

$userController = new UserController();
$userController->showUsers();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bao gồm Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/search.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="../../public/js/app.js"></script>

    <link rel="stylesheet" href="../../public/css/home.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../../public/imgae/logo1.png" alt="P-Cinema Logo">
                    <span class="logo-text ms-3">PTIT_CRM </span>
                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../app/view/home.php">Khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#logoutModal">Đăng xuất</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Main-->
    <main class="container text-center welcome-message">
        
        <?php include('../view/customers/customerView.php'); ?>
    </main>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Xác nhận đăng xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn đăng xuất không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a href="../../logout.php" class="btn btn-danger">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <<footer class="bg-dark text-light text-center py-3 mt-5">
    <p>&copy; 2024 PTIT_CRM. All rights reserved.</p>
    </footer>

</body>
</html>
